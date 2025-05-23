@extends('components.layouts.main')

@section('container')
    <section>
        <div class="container flex flex-col mx-auto bg-white rounded-lg px-4 md:px-8">
            @if (session('success'))
                <div class="relative bg-green-100 border-t-4 border-green-500 text-teal-900 px-4 py-3 shadow-md w-full sm:w-[400px] md:w-[500px] mx-auto rounded-2xl mb-6 mt-5"
                    role="alert">
                    <div class="flex justify-between items-center">
                        <div class="flex">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                </svg>
                            </div>
                            <div>
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                        <button type="button"
                            class="absolute top-0 right-0 mt-2 mr-2 text-teal-500 hover:text-teal-700 focus:outline-none"
                            onclick="this.parentElement.parentElement.style.display='none';">
                            <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M10 9l5-5 1 1-5 5 5 5-1 1-5-5-5-5 1-1 5 5z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('failed'))
                <div class="relative bg-red-100 border-t-4 border-red-500 text-white-900 px-4 py-3 shadow-md w-full sm:w-[400px] md:w-[500px] mx-auto rounded-2xl mb-6 mt-5"
                    role="alert">
                    <div class="flex justify-between items-center">
                        <div class="flex">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                </svg>
                            </div>
                            <div>
                                <p>{{ session('failed') }}</p>
                            </div>
                        </div>
                        <button type="button"
                            class="absolute top-0 right-0 mt-2 mr-2 text-teal-500 hover:text-teal-700 focus:outline-none"
                            onclick="this.parentElement.parentElement.style.display='none';">
                            <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M10 9l5-5 1 1-5 5 5 5-1 1-5-5-5-5 1-1 5 5z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5">
                <div class="flex items-center justify-center w-full lg:p-12">
                    <div class="flex items-center xl:p-10">
                        <form action="{{ route('register') }}" method="POST"
                            class="flex flex-col w-full sm:w-[400px] md:w-[500px] h-full pb-6 pt-6 text-center bg-white rounded-3xl">
                            @csrf
                            <h3 class="mb-3 text-3xl sm:text-4xl font-extrabold text-[#4ABA68]">Register</h3>
                            <p class="mb-4 text-grey-700">Create your account</p>

                            <div class="flex items-center mb-3">
                                <hr class="h-0 border-b border-solid border-grey-500 grow">
                            </div>
                            <label for="email" class="mb-2 text-sm sm:text-base text-start text-grey-900">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                placeholder="mail@mail.com"
                                class="flex items-center px-5 py-4 mb-3 text-sm sm:text-base font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('email') border-red-500 @else border-slate-300 @enderror">
                            @error('email')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror
                            <label for="name" class="mb-2 text-sm sm:text-base text-start text-grey-900">Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}"
                                placeholder="Input your name"
                                class="flex items-center px-5 py-4 mb-3 text-sm sm:text-base font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('name') border-red-500 @else border-slate-300 @enderror">
                            @error('name')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror
                            <label for="password"
                                class="mb-2 text-sm sm:text-base text-start text-grey-900">Password</label>
                            <input id="password" name="password" type="password" placeholder="Enter your password"
                                class="flex items-center px-5 py-4 mb-3 text-sm sm:text-base font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('password') border-red-500 @else border-slate-300 @enderror">
                            @error('password')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror
                            <label for="password_confirmation"
                                class="mb-2 text-sm sm:text-base text-start text-grey-900">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                placeholder="Confirm your password"
                                class="flex items-center px-5 py-4 mb-3 text-sm sm:text-base font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('password_confirmation') border-red-500 @else border-slate-300 @enderror">
                            @error('password_confirmation')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror

                            <div class="flex flex-row justify-between mb-5 mt-5">
                                <label class="relative inline-flex items-center cursor-pointer select-none">
                                    <input type="checkbox" name="terms" value="1" class="sr-only peer">
                                    <div
                                        class="w-5 h-5 bg-white border-2 rounded-sm border-grey-500 peer peer-checked:border-0 peer-checked:bg-[#66B82D]">
                                        <img src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/icons/check.png"
                                            alt="tick">
                                    </div>
                                    <span class="ml-3 text-sm sm:text-base font-normal text-grey-900">I agree to the terms
                                        and conditions</span>
                                </label>
                            </div>
                            <button type="submit"
                                class="px-6 py-5 mb-5 text-sm sm:text-base font-bold leading-none text-white transition-all duration-1000 ease-in-out rounded-2xl bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:from-[#5FC4B2] hover:to-[#4ABA68] focus:ring-4 focus:ring-[#0045A4]/50">
                                Register
                            </button>
                            <p class="text-sm sm:text-base leading-relaxed text-grey-900">Already have an account? <a
                                    href="{{ route('login') }}" class="font-extrabold text-[#005051]">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 my-5">
            <div class="w-full max-w-full sm:w-3/4 mx-auto text-center">
                <a href="{{ url('/') }}">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('img/tracey-logo.png') }}" class="h-10 mb-1" alt="">
                    </div>
                    <p class="text-sm sm:text-base text-slate-500 py-1">Tracey 2025 | All rights reserved</p>
                </a>
            </div>
        </div>
    </section>
@endsection
