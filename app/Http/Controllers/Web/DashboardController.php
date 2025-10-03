<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Statistics
        $stats = [
            'today_income' => Transaction::whereDate('transaction_date', $today)
                ->where('type', 'income')
                ->sum('total_amount') ?? 0,

            'today_expense' => Transaction::whereDate('transaction_date', $today)
                ->where('type', 'expense')
                ->sum('total_amount') ?? 0,

            'monthly_income' => Transaction::whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
                ->where('type', 'income')
                ->sum('total_amount') ?? 0,

            'total_products' => Product::count(),

            'low_stock_products' => Product::whereColumn('stock', '<=', 'min_stock')->count(),

            'total_transactions_today' => Transaction::whereDate('transaction_date', $today)->count(),

            'total_users' => User::count(),
        ];

        // Recent Transactions (Last 5 today)
        $recentTransactions = Transaction::with(['user'])
            ->whereDate('transaction_date', $today)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Low Stock Products
        $lowStockProducts = Product::whereColumn('stock', '<=', 'min_stock')
            ->orderBy('stock', 'asc')
            ->limit(5)
            ->get();

        // Top Selling Products (This month)
        $topProducts = TransactionDetail::select(
                'products.name as product_name',
                DB::raw('SUM(transaction_details.quantity) as total_sold'),
                DB::raw('SUM(transaction_details.subtotal) as total_revenue')
            )
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->whereBetween('transactions.transaction_date', [$startOfMonth, $endOfMonth])
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_sold', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentTransactions',
            'lowStockProducts',
            'topProducts'
        ));
    }

    public function reports(Request $request)
    {
        // Default date range
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));
        $endDate = Carbon::parse($endDate)->endOfDay()->format('Y-m-d H:i:s');
        // $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m- --- IGNORE ---d'));
        // $endDate = Carbon::parse($endDate)->endOfDay()->format('Y-m-d H:i:s'); --- IGNORE ---
        // Transactions within date range
        $transactions = Transaction::with(['user'])
            ->whereBetween('transaction_date', [$startDate, $endDate])
            ->orderBy('transaction_date', 'desc')
            ->get();
        // Summary
        $summary = [
            'total_income' => Transaction::whereBetween('transaction_date', [$startDate, $endDate])
                ->where('type', 'income')
                ->sum('total_amount') ?? 0, // Default to 0 if null
            'total_expense' => Transaction::whereBetween('transaction_date', [$startDate, $endDate])
                ->where('type', 'expense')
                ->sum('total_amount') ?? 0, // Default to 0 if null
        ];
        return view('admin.reports', compact('transactions', 'summary', 'startDate', 'endDate'));
    }
}
