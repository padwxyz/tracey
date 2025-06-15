@extends('components.layouts.main_admin')

@section('container')
    <section class="px-5 md:pl-20 md:pr-20 my-10 md:ml-56 flex-grow">
        <div class="flex justify-between items-center mb-6">
            @if (Auth::check() && Auth::user()->role === 'admin')
                <h1 class="text-2xl md:text-5xl font-bold">
                    Welcome Admin {{ Auth::user()->name }} 👋
                </h1>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mt-10">
            <div class="bg-white p-6 rounded-3xl shadow-md border-2 border-gray-500">
                <h3 class="text-gray-500 text-lg font-semibold">To Do Activity</h3>
                <p class="text-2xl font-bold">{{ $todos }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-md border-2 border-yellow-500">
                <h3 class="text-yellow-500 text-lg font-semibold">Pending Activity</h3>
                <p class="text-2xl font-bold">{{ $pendings }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-md border-2 border-blue-500">
                <h3 class="text-blue-500 text-lg font-semibold">In Progress Activity</h3>
                <p class="text-2xl font-bold">{{ $inProgress }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-md border-2 border-green-500">
                <h3 class="text-green-500 text-lg font-semibold">Done Activity</h3>
                <p class="text-2xl font-bold">{{ $dones }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-md border-2 border-red-500">
                <h3 class="text-red-500 text-lg font-semibold">Cancel Activity</h3>
                <p class="text-2xl font-bold">{{ $cancels }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-5">
            <div class="bg-white p-6 rounded-3xl shadow-md border-2 border-gray-500">
                <h3 class="text-gray-500 text-lg font-semibold">Notes Today</h3>
                <p class="text-2xl font-bold">{{ $notesToday }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-md border-2 border-gray-500">
                <h3 class="text-gray-500 text-lg font-semibold">Notes This Month</h3>
                <p class="text-2xl font-bold">{{ $notesThisMonth }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-md border-2 border-gray-500">
                <h3 class="text-gray-500 text-lg font-semibold">Notes This Year</h3>
                <p class="text-2xl font-bold">{{ $notesThisYear }}</p>
            </div>
        </div>
    </section>
@endsection
