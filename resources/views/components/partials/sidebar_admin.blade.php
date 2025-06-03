<div id="sidebar"
    class="bg-white h-screen w-60 fixed shadow-xl px-5 flex flex-col justify-between overflow-y-auto transition duration-300"
    x-data="{ sidenav: true, dropdownOpen: false }" x-show="sidenav">
    <div>
        <div class="flex flex-col items-center mt-6">
            <img src="{{ asset('img/tracey-logo.png') }}" class="h-12" alt="">
            <h1 class="font-bold text-lg mt-2 text-[#005051]">Tracey</h1>
        </div>
        <nav class="mt-10 space-y-2">
            <a href="{{ route('dashboard-admin') }}"
                class="flex items-center text-sm font-medium px-3 py-2 rounded-md text-[#005051] hover:bg-[#005051] hover:text-white transition">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                Dashboard
            </a>
            <div x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full text-sm font-medium px-3 py-2 rounded-md text-[#005051] hover:bg-[#005051] hover:text-white transition">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd" />
                        </svg>
                        Master Data
                    </span>
                    <svg class="w-4 h-4 transform transition-transform duration-200" :class="{ 'rotate-180': open }"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" x-collapse class="ml-6 mt-2 space-y-2 text-sm text-[#005051]">
                    <a href="{{ route('admin.index') }}"
                        class="block px-3 py-2 hover:bg-[#005051] hover:text-white rounded">Admin Data</a>
                    <a href="{{ route('user.index') }}"
                        class="block px-3 py-2 hover:bg-[#005051] hover:text-white rounded">User Data</a>
                    <a href="{{ route('note_data.index') }}"
                        class="block px-3 py-2 hover:bg-[#005051] hover:text-white rounded">Note Data</a>
                    <a href="{{ route('location.index') }}"
                        class="block px-3 py-2 hover:bg-[#005051] hover:text-white rounded">Location Data</a>
                    <a href="{{ route('category.index') }}"
                        class="block px-3 py-2 hover:bg-[#005051] hover:text-white rounded">Category Data</a>
                    <a href="{{ route('item.index') }}"
                        class="block px-3 py-2 hover:bg-[#005051] hover:text-white rounded">Item Data</a>
                </div>
            </div>
            <div class="py-2">
                <a href="{{ route('logout') }}"
                    class="flex items-center text-sm font-medium px-3 py-2 rounded-md text-red-600 hover:bg-red-600 hover:text-white transition">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3 4a1 1 0 011-1h10a1 1 0 011 1v2a1 1 0 11-2 0V5H4v10h8v-1a1 1 0 112 0v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M14.293 7.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L15.586 12H9a1 1 0 110-2h6.586l-1.293-1.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Log Out
                </a>
            </div>
        </nav>
    </div>
</div>
