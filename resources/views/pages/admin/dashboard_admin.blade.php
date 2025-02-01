@extends('components.layouts.main_admin')

@section('container')
    <section class="px-5 md:pl-20 md:pr-20 my-10 md:ml-56 flex-grow mt-[100px]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl md:text-5xl font-bold">Hello! Welcome👋 </h1>
            {{-- {{ Auth::guard('admin')->user()->name }} --}}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mt-5">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-gray-500 text-lg font-semibold">To Do Activity</h3>
                <p class="text-2xl font-bold"></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-yellow-500 text-lg font-semibold">Pending Activity</h3>
                <p class="text-2xl font-bold"></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-blue-500 text-lg font-semibold">In Progress Activity</h3>
                <p class="text-2xl font-bold"></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-green-500 text-lg font-semibold">Done Activity</h3>
                <p class="text-2xl font-bold"></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-red-500 text-lg font-semibold">Cancel Activity</h3>
                <p class="text-2xl font-bold"></p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-5">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-gray-500 text-lg font-semibold">Notes Today</h3>
                <p class="text-2xl font-bold"></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-gray-500 text-lg font-semibold">Notes This Month</h3>
                <p class="text-2xl font-bold"></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-gray-500 text-lg font-semibold">Notes This Year</h3>
                <p class="text-2xl font-bold"></p>
            </div>
        </div>
    </section>
@endsection
