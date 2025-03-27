<div :class="sidebarOpen ? 'block' : 'hidden'"
    class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden" @click="sidebarOpen = false">
</div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <span class="text-white text-2xl mx-2 font-semibold">Admin Dashboard</span>
        </div>
    </div>

    <nav class="mt-10">
        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{route('dashboard')}}">
        <!-- <a class="flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25" href="/admin/dashboard"> -->
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
            href="{{route('products.index')}}">
            <i class="fas fa-box mr-3"></i>
            Products
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
            href="/admin/categories">
            <i class="fas fa-tags mr-3"></i>
            Categories
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
            href="/admin/orders">
            <i class="fas fa-shopping-cart mr-3"></i>
            Orders
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
            href="/admin/users">
            <i class="fas fa-users mr-3"></i>
            Users
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
            href="/admin/settings">
            <i class="fas fa-cog mr-3"></i>
            Settings
        </a>
    </nav>
</div>