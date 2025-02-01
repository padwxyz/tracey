<nav class="fixed top-0 z-50 w-full border-b border-blue-200 bg-[#213555] shadow-lg">
    <div class="px-3 py-5 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="/dashboard-admin" class="flex ms-2 md:me-24">
                    {{-- <img src="{{ asset('img/logo.png') }}" class="h-8 me-3" alt="Tracey Logo" /> --}}
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">Tracey</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-60 h-screen pt-20 transition-transform -translate-x-full bg-white shadow-2xl sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 mt-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-3 font-medium">
            <li>
                <a href="/dashboard-admin"
                    class="flex items-center p-3 text-gray-900 rounded-lg dark:text-[#213555] font-semibold hover:bg-[#213555] hover:text-white group">

                    <svg class="flex-shrink-0 w-5 h-5 text-[#213555] transition duration-75 dark:text-[#213555] group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/master-data"
                    class="flex items-center p-3 text-gray-900 rounded-lg dark:text-[#213555] font-semibold hover:bg-[#213555] hover:text-white group">
                    <svg class="w-5 h-5 text-[#213555] transition duration-75 dark:text-[#213555] group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Master Data</span>
                </a>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.index') }}"
                            class="flex items-center p-3 pl-10 text-gray-900 rounded-lg dark:text-[#213555] font-semibold hover:bg-[#213555] hover:text-white group">
                            Admin Data
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="flex items-center p-3 pl-10 text-gray-900 rounded-lg dark:text-[#213555] font-semibold hover:bg-[#213555] hover:text-white group">
                            User Data
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('location.index') }}"
                            class="flex items-center p-3 pl-10 text-gray-900 rounded-lg dark:text-[#213555] font-semibold hover:bg-[#213555] hover:text-white group">
                            Location Data
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}"
                            class="flex items-center p-3 pl-10 text-gray-900 rounded-lg dark:text-[#213555] font-semibold hover:bg-[#213555] hover:text-white group">
                            Category Data
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('item.index') }}"
                            class="flex items-center p-3 pl-10 text-gray-900 rounded-lg dark:text-[#213555] font-semibold hover:bg-[#213555] hover:text-white group">
                            Item Data
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="flex items-center p-3 pl-10 text-gray-900 rounded-lg dark:text-[#213555] font-semibold hover:bg-[#213555] hover:text-white group">
                            Note Data
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex w-full items-start justify-start p-3 text-gray-900 rounded-lg dark:text-[#213555] font-semibold hover:bg-red-500 group hover:text-white">
                        <svg class="flex w-5 h-5 text-[#213555] transition duration-75 dark:text-[#213555] group-hover:text-gray-900 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4m10 9h-6m0 0 3-3m-3 3 3 3" />
                        </svg>
                        <span class="ms-3 whitespace-nowrap">Log Out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('[data-drawer-toggle="logo-sidebar"]');
        const sidebar = document.getElementById('logo-sidebar');

        mobileMenuButton.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
        });
    });
</script>
