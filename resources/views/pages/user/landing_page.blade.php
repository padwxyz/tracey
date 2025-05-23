@extends('components.layouts.main_user')

@section('container')
    <section id="Home" class="mx-auto mb-[50px]">
        <div class="relative h-screen bg-fixed bg-center bg-cover">
            <div class="absolute inset-0"></div>
            <div class="relative flex flex-col items-center justify-center h-full text-center px-10 lg:px-40 md:px-10">
                <img src="{{ asset('img/logo.png') }}" class="h-10 md:h-12 mb-4" alt="">
                <h1 class="text-[36px] sm:text-[36px] md:text-[48px] font-bold leading-tight">
                    Track, report, archive & boost team efficiency
                </h1>
                <p class="text-[14px] sm:text-[18px] md:text-[24px] mb-8">
                    Tracey is your all-in-one platform to track employee activities, generate insightful reports,
                    and securely archive work data—empowering your team to stay productive and organized.
                </p>
                <button
                    class="px-24 py-4 text-white text-lg font-semibold rounded-2xl bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:from-[#5FC4B2] hover:to-[#4ABA68] focus:outline-none focus:ring-4 focus:ring-[#0045A4]/50 transition-all duration-500 ease-in-out">
                    Get Started
                </button>
            </div>
        </div>
    </section>

    <section id="About" class="container mx-auto mb-[50px] px-4 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center">
            <div class="bg-white rounded-2xl p-8 shadow-xl w-full max-w-sm">
                <h2 class="text-[24px] md:text-[28px] font-bold text-gray-900 mb-3">
                    Struggling to Track Daily Operations?
                </h2>
                <p class="text-[15px] md:text-[16px] text-gray-600 mb-5">
                    Many teams face difficulties monitoring day-to-day activities. Manual logs are easy to misplace, hard to
                    review, and waste valuable time.
                </p>
                <img src="/img/Heart_rate.png" alt="Log Issue" class="rounded-lg shadow w-full object-contain" />
            </div>
            <div
                class="bg-gradient-to-br from-[#00453A] to-[#5FC4B2] text-white rounded-2xl p-8 shadow-2xl w-full max-w-sm">
                <h2 class="text-[24px] md:text-[28px] font-bold mb-3">
                    Tracey Is the Answer
                </h2>
                <p class="text-[15px] md:text-[16px] mb-5">
                    With Tracey, every work activity is automatically logged, monitored, and analyzed. It's efficient,
                    transparent, and user-friendly for every team.
                </p>
                <img src="/img/Light_bulb.png" alt="Tracey Solution" class="rounded-lg shadow w-full object-contain" />
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-xl w-full max-w-sm flex flex-col justify-between">
                <div>
                    <h2 class="text-[24px] md:text-[28px] font-bold text-gray-900 mb-3">
                        Ready to Boost Team Efficiency?
                    </h2>
                    <p class="text-[15px] md:text-[16px] text-gray-600 mb-6">
                        Start now with Tracey. Monitor daily work, manage logs, and improve productivity—all in one powerful
                        platform.
                    </p>
                </div>
                <button
                    class="w-1/2 px-6 py-3 text-white text-base font-semibold rounded-lg bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:from-[#5FC4B2] hover:to-[#4ABA68] focus:outline-none focus:ring-4 focus:ring-[#0045A4]/50 transition-all duration-300 ease-in-out">
                    Get Started
                </button>
                <img src="/img/rocket.png" alt="Boost" class="rounded-lg shadow w-full object-contain" />
            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 md:px-8 py-24 mb-[50px]">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-3">Tools that streamline your daily
                operations</h2>
            <p class="text-lg text-gray-600">Tracey helps teams log, organize, and access their work activities without the
                hassle.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-12 mb-24">
            <div>
                <img src="/your-image-path/log-visual.png" alt="Logging made simple" class="rounded-xl shadow-lg">
            </div>
            <div>
                <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">Capture what matters, effortlessly</h3>
                <p class="text-gray-600 text-base md:text-lg mb-6">
                    From task updates to meeting summaries, Tracey lets your team record daily work in one place—fast and
                    friction-free. No more scattered docs or forgotten details.
                </p>
                <div class="flex gap-4">
                    <button
                        class="px-5 py-3 text-white font-semibold rounded-lg bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:opacity-90">
                        Start logging
                    </button>
                    <button
                        class="px-5 py-3 text-gray-900 font-semibold rounded-lg border border-gray-300 hover:bg-gray-100">
                        Learn more
                    </button>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-12">
            <div class="order-2 md:order-1">
                <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">All your work logs in one place</h3>
                <p class="text-gray-600 text-base md:text-lg mb-6">
                    Easily find and review your team’s activity history—whether it's yesterday’s update or last month’s
                    progress. Tracey keeps your operations organized and searchable.
                </p>
                <button
                    class="px-5 py-3 text-white font-semibold rounded-lg bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:opacity-90 w-1/2">
                    Explore Logs
                </button>
            </div>
            <div class="order-1 md:order-2">
                <img src="/your-image-path/search-visual.png" alt="Centralized work logs" class="rounded-xl shadow-lg">
            </div>
        </div>
    </section>

    <section id="Service" class="mb-[100px]">
        <div class="container mx-auto px-4 md:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-3">Our Service for You</h2>
                <p class="text-lg text-gray-600">We offer a range of services designed to simplify your daily tasks
                    efficiently. With integrated
                    solutions, every job is well documented.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <div
                    class="relative group bg-white border-2 border-gradient-to-r from-green-400 via-blue-500 to-purple-600 rounded-2xl p-6 shadow-lg cursor-pointer flex flex-col">
                    <div class="text-4xl mb-4 text-green-500">📋</div>
                    <h3 class="font-bold text-lg mb-1">Activity Logs</h3>
                    <p class="text-gray-600 flex-grow text-sm mb-6">
                        Easily track every task and activity to ensure all work is properly documented.
                    </p>
                    <div
                        class="absolute bottom-4 right-4 text-[#005051] text-2xl transition-transform duration-300 group-hover:translate-y-[-4px]">
                        ↗
                    </div>
                </div>
                <div
                    class="relative group bg-gradient-to-r from-[#00453A] to-[#5FC4B2] rounded-2xl p-6 shadow-lg cursor-pointer flex flex-col text-white">
                    <div class="text-4xl mb-4">✅</div>
                    <h3 class="font-bold text-lg mb-1">Task Status</h3>
                    <p class="flex-grow text-sm mb-6">
                        Mark tasks as "In Progress", "Pending", or "Completed" for easy management and prioritization.
                    </p>
                    <div
                        class="absolute bottom-4 right-4 text-white text-2xl transition-transform duration-300 group-hover:translate-y-[-4px]">
                        ↗
                    </div>
                </div>
                <div
                    class="relative group bg-white border-2 border-gradient-to-r from-[#00453A] to-[#5FC4B2] rounded-2xl p-6 shadow-lg cursor-pointer flex flex-col">
                    <div class="text-4xl mb-4 text-purple-500">🌍</div>
                    <h3 class="font-bold text-lg mb-1">Flexible Access</h3>
                    <p class="text-gray-600 flex-grow text-sm mb-6">
                        Manage your notes anytime and anywhere via a digital platform accessible on multiple devices.
                    </p>
                    <div
                        class="absolute bottom-4 right-4 text-[#005051] text-2xl transition-transform duration-300 group-hover:translate-y-[-4px]">
                        ↗
                    </div>
                </div>
                <div
                    class="relative group bg-gradient-to-r from-[#00453A] to-[#5FC4B2] rounded-2xl p-6 shadow-lg cursor-pointer flex flex-col text-white">
                    <div class="text-4xl mb-4">🗂️</div>
                    <h3 class="font-bold text-lg mb-1">Auto Archiving</h3>
                    <p class="flex-grow text-sm mb-6">
                        All notes are saved automatically, making it easy to search and review completed tasks.
                    </p>
                    <div
                        class="absolute bottom-4 right-4 text-white text-2xl transition-transform duration-300 group-hover:translate-y-[-4px]">
                        ↗
                    </div>
                </div>
                <div
                    class="relative group bg-white border-2 border-gradient-to-r from-[#00453A] to-[#5FC4B2] rounded-2xl p-6 shadow-lg cursor-pointer flex flex-col">
                    <div class="text-4xl mb-4 text-pink-500">🛠️</div>
                    <h3 class="font-bold text-lg mb-1">Custom Tools</h3>
                    <p class="text-gray-600 flex-grow text-sm mb-6">
                        Use personalized tools tailored to enhance your productivity and workflow.
                    </p>
                    <div
                        class="absolute bottom-4 right-4 text-[#005051] text-2xl transition-transform duration-300 group-hover:translate-y-[-4px]">
                        ↗
                    </div>
                </div>
                <div
                    class="relative group bg-gradient-to-r from-[#00453A] to-[#5FC4B2] rounded-2xl p-6 shadow-lg cursor-pointer flex flex-col text-white">
                    <div class="text-4xl mb-4">🔒</div>
                    <h3 class="font-bold text-lg mb-1">Secure Data</h3>
                    <p class="flex-grow text-sm mb-6">
                        Keep your data safe with our advanced encryption and security protocols.
                    </p>
                    <div
                        class="absolute bottom-4 right-4 text-white text-2xl transition-transform duration-300 group-hover:translate-y-[-4px]">
                        ↗
                    </div>
                </div>
                <div
                    class="relative group bg-white border-2 border-gradient-to-r from-[#00453A] to-[#5FC4B2] rounded-2xl p-6 shadow-lg cursor-pointer flex flex-col">
                    <div class="text-4xl mb-4 text-yellow-500">📈</div>
                    <h3 class="font-bold text-lg mb-1">Analytics</h3>
                    <p class="text-gray-600 flex-grow text-sm mb-6">
                        Analyze your task data to make better decisions and improve efficiency.
                    </p>
                    <div
                        class="absolute bottom-4 right-4 text-[#005051] text-2xl transition-transform duration-300 group-hover:translate-y-[-4px]">
                        ↗
                    </div>
                </div>
                <div
                    class="relative group bg-gradient-to-r from-[#00453A] to-[#5FC4B2] rounded-2xl p-6 shadow-lg cursor-pointer flex flex-col text-white">
                    <div class="text-4xl mb-4">⚙️</div>
                    <h3 class="font-bold text-lg mb-1">Automation</h3>
                    <p class="flex-grow text-sm mb-6">
                        Automate repetitive tasks to save time and reduce manual effort.
                    </p>
                    <div
                        class="absolute bottom-4 right-4 text-white text-2xl transition-transform duration-300 group-hover:translate-y-[-4px]">
                        ↗
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="FAQ" class="container mx-auto mb-[100px] px-4 md:px-8">
        <div>
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-3">Frequently Asked Questions</h2>
                <p class="text-lg text-gray-600">
                    We provide a suite of features designed to streamline your workflow. With integrated solutions, every
                    task is recorded clearly and efficiently.
                </p>
            </div>
            <div>
                @include('components.partials.faq')
            </div>
        </div>
    </section>
@endsection
