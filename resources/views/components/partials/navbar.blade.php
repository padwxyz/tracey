<nav class="fixed top-4 w-full z-50 flex justify-center">
    <div class="relative w-[90%] max-w-7xl">
        <div class="relative bg-[#F8F8FC] rounded-full flex items-center justify-between px-12 py-5 shadow-lg">
            <div class="flex-shrink-0 w-[110px] h-[40px]">
                <img class="h-10 w-auto" src="{{ asset('img/tracey-logo.png') }}" alt="Tracey">
            </div>
            <div class="hidden sm:flex space-x-6 items-center">
                <a href="#Home"
                    class="text-[#005051] text-[18px] font-semibold hover:text-[#5FC4B2] transition">Home</a>
                <a href="#About"
                    class="text-[#005051] text-[18px] font-semibold hover:text-[#5FC4B2] transition">About</a>
                <a href="#Service"
                    class="text-[#005051] text-[18px] font-semibold hover:text-[#5FC4B2] transition">Service</a>
                <a href="#FAQ"
                    class="text-[#005051] text-[18px] font-semibold hover:text-[#5FC4B2] transition">FAQ</a>
            </div>
            <div class="hidden sm:flex items-center">
                <a href="{{ url('login') }}"
                    class="text-white text-[18px] font-semibold rounded-full px-10 py-2 bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:from-[#5FC4B2] hover:to-[#4ABA68] focus:outline-none focus:ring-4 focus:ring-[#0045A4]/50 transition-all duration-500 ease-in-out">Login</a>
            </div>
            <div class="sm:hidden flex items-center">
                <button id="mobile-menu-button" class="text-[#005051] focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div id="mobile-menu"
        class="sm:hidden absolute top-[90px] w-[90%] max-w-7xl bg-white rounded-xl mt-2 shadow-lg hidden p-4 z-50">
        <a href="#Home"
            class="block my-5 text-[#005051] text-[18px] font-semibold hover:text-[#5FC4B2] transition">Home</a>
        <a href="#About"
            class="block my-5 text-[#005051] text-[18px] font-semibold hover:text-[#5FC4B2] transition">About</a>
        <a href="#Service"
            class="block my-5 text-[#005051] text-[18px] font-semibold hover:text-[#5FC4B2] transition">Service</a>
        <a href="#FAQ"
            class="block my-5 text-[#005051] text-[18px] font-semibold hover:text-[#5FC4B2] transition">FAQ</a>
        <a href="{{ url('login') }}"
            class="block rounded-full text-center text-white text-[18px] font-semibold py-2 mt-2 bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:from-[#5FC4B2] hover:to-[#4ABA68] focus:outline-none focus:ring-4 focus:ring-[#0045A4]/50 transition-all duration-500 ease-in-out">Login</a>
    </div>
</nav>

<script>
    const menuBtn = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
