<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-2 px-4"
>
    <!-- Main Navigation -->
    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
        class="!bg-white/10 hover:!bg-white/20 !text-white !border-white/20 backdrop-blur-sm transition-all duration-200 hover:translate-x-1"
    >
        <x-slot name="icon">
            <div class="p-1.5 bg-white/20 rounded-lg">
                <!-- Dashboard Icon -->
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
        </x-slot>
    </x-sidebar.link>

    <!-- Buttons Section -->
    <x-sidebar.dropdown
        title="Buttons"
        :active="Str::startsWith(request()->route()->uri(), 'buttons')"
        class="!bg-white/10 hover:!bg-white/20 !text-white !border-white/20 backdrop-blur-sm transition-all duration-200"
    >
        <x-slot name="icon">
            <div class="p-1.5 bg-white/20 rounded-lg">
                <!-- Grid Icon -->
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
            </div>
        </x-slot>

        <x-sidebar.sublink
            title="Text button"
            href="{{ route('buttons.text') }}"
            :active="request()->routeIs('buttons.text')"
            class="!text-blue-100 hover:!text-white hover:!bg-white/10 transition-colors duration-200"
        />
        <x-sidebar.sublink
            title="Icon button"
            href="{{ route('buttons.icon') }}"
            :active="request()->routeIs('buttons.icon')"
            class="!text-blue-100 hover:!text-white hover:!bg-white/10 transition-colors duration-200"
        />
        <x-sidebar.sublink
            title="Text with icon"
            href="{{ route('buttons.text-icon') }}"
            :active="request()->routeIs('buttons.text-icon')"
            class="!text-blue-100 hover:!text-white hover:!bg-white/10 transition-colors duration-200"
        />
    </x-sidebar.dropdown>

    <!-- Features Section Header -->
    <div
        x-transition
        x-show="isSidebarOpen || isSidebarHovered"
        class="mt-6 mb-4"
    >
        <div class="px-3 text-xs font-semibold text-blue-200 uppercase tracking-wider">
            Features
        </div>
    </div>

    <!-- Features Links -->
    <x-sidebar.link
        title="Analytics"
        href="#"
        class="!bg-transparent hover:!bg-white/10 !text-blue-100 hover:!text-white transition-all duration-200"
    >
        <x-slot name="icon">
            <div class="p-1.5 bg-white/10 rounded-lg">
                <!-- Chart Bar Icon -->
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Reports"
        href="#"
        class="!bg-transparent hover:!bg-white/10 !text-blue-100 hover:!text-white transition-all duration-200"
    >
        <x-slot name="icon">
            <div class="p-1.5 bg-white/10 rounded-lg">
                <!-- Document Chart Bar Icon -->
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Settings"
        href="#"
        class="!bg-transparent hover:!bg-white/10 !text-blue-100 hover:!text-white transition-all duration-200"
    >
        <x-slot name="icon">
            <div class="p-1.5 bg-white/10 rounded-lg">
                <!-- Cog Icon -->
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </x-slot>
    </x-sidebar.link>

    <!-- Quick Stats -->
    <div
        x-transition
        x-show="isSidebarOpen || isSidebarHovered"
        class="mt-8 p-4 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20"
    >
        <div class="text-xs font-semibold text-white mb-2">Quick Stats</div>
        <div class="space-y-2">
            <div class="flex justify-between items-center text-blue-100 text-xs">
                <span>Today's Sales</span>
                <span class="font-semibold text-white">$2,540</span>
            </div>
            <div class="flex justify-between items-center text-blue-100 text-xs">
                <span>Visitors</span>
                <span class="font-semibold text-white">1,234</span>
            </div>
            <div class="flex justify-between items-center text-blue-100 text-xs">
                <span>Orders</span>
                <span class="font-semibold text-white">48</span>
            </div>
        </div>
    </div>

</x-perfect-scrollbar>
