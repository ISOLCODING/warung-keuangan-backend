<x-sidebar.overlay />

<aside
    class="fixed inset-y-0 z-20 flex flex-col bg-gradient-to-b from-blue-600 to-blue-700 dark:from-gray-800 dark:to-gray-900 shadow-xl"
    :class="{
        'translate-x-0 w-64': isSidebarOpen || isSidebarHovered,
        '-translate-x-full w-64 md:w-20 md:translate-x-0': !isSidebarOpen && !isSidebarHovered,
    }"
    style="transition-property: width, transform; transition-duration: 300ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);"
    x-on:mouseenter="handleSidebarHover(true)"
    x-on:mouseleave="handleSidebarHover(false)"
>
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Cpath d=\"M0 0h20L0 20z\"/%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <div class="relative z-10 flex flex-col flex-1 py-6">
        <x-sidebar.header />
        <x-sidebar.content />
        <x-sidebar.footer />
    </div>
</aside>
