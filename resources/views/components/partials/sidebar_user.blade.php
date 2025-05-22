<div id="sidebar"
    class="bg-white h-screen md:block shadow-xl px-5 w-40 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out flex flex-col fixed"
    x-show="sidenav" @click.away="sidenav = false">
    <div class="space-y-6 md:space-y-5 mt-10 flex flex-col">
        <div class="flex items-center justify-center">
            <a href=""><img src="{{ asset('img/tracey-logo.png') }}" class="h-12" alt=""></a>
            {{-- {{ route('dashboard') }} --}}
        </div>
        <h1 class="hidden md:block font-bold text-sm md:text-2xl text-center text-[#005051]">Tracey</h1>

        <div></div>

        <div id="menu" class="flex flex-col space-y-3 mt-10 flex-grow">
            <a href="" {{-- {{ route('dashboard') }} --}}
                class="text-sm font-medium py-2 px-3 hover:bg-[#005051] text-[#005051] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                <span class="">Dashboard</span>
            </a>
            <a href="" {{-- {{ route('note.index') }} --}}
                class="text-sm font-medium py-2 px-3 hover:bg-[#005051] text-[#005051] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd"
                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="">Note</span>
            </a>
            <a href="" {{-- {{ route('all-activity') }} --}}
                class="text-sm font-medium py-2 px-3 hover:bg-[#005051] text-[#005051] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M2 11a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 11-2 0v-5H3v5a1 1 0 11-2 0v-6zm5-5a1 1 0 011-1h2a1 1 0 011 1v11a1 1 0 11-2 0V7H8v9a1 1 0 11-2 0V6zm5-3a1 1 0 011-1h2a1 1 0 011 1v14a1 1 0 11-2 0V4h-1v13a1 1 0 11-2 0V3z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="">All Activity</span>
            </a>
            <a href="" {{-- {{ '/history' }} --}}
                class="text-sm font-medium py-2 px-3 hover:bg-[#005051] text-[#005051] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 4a1 1 0 112 0v5h3a1 1 0 110 2H9a1 1 0 01-1-1V4z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="">History</span>
            </a>
            <a href="" {{-- {{ route('log-status') }} --}}
                class="text-sm font-medium py-2 px-3 hover:bg-[#005051] text-[#005051] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 100 2h2a1 1 0 100-2H9zM4 5a2 2 0 012-2h8a2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 6a1 1 0 011-1h6a1 1 0 110 2H8a1 1 0 01-1-1zm0 4a1 1 0 011-1h6a1 1 0 110 2H8a1 1 0 01-1-1zM7 7a1 1 0 100 2h6a1 1 0 100-2H7z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="">Log Status</span>
            </a>
        </div>
    </div>
    <div id="logout" class="mt-6">
        <form action="" method="POST">
            {{-- {{ route('logout') }} --}}
            @csrf
            <button type="submit"
                class="text-sm font-medium py-2 px-3 hover:bg-red-600 hotext-[#005051] hover:text-white over:scale-105 rounded-md transition duration-150 ease-in-out">
                <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 4a1 1 0 011-1h10a1 1 0 011 1v2a1 1 0 11-2 0V5H4v10h8v-1a1 1 0 112 0v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"
                        clip-rule="evenodd"></path>
                    <path fill-rule="evenodd"
                        d="M14.293 7.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L15.586 12H9a1 1 0 110-2h6.586l-1.293-1.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="">Log Out</span>
            </button>
        </form>
    </div>
</div>
