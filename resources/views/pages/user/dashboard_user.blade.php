@extends('components.layouts.main')

@include('components.partials.sidebar_user')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="grid grid-cols-2 justify-items-start">
            <div>
                <h1 class="text-[42px] font-bold text-left">Welcome 👋</h1>
                {{-- {{{ Auth::user()->name }}} --}}
            </div>
            <div
                class="bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:from-[#5FC4B2] hover:to-[#4ABA68] w-[180px] h-[50px] relative rounded-md flex items-center justify-center font-medium text-[18px] text-white my-auto ml-auto">
                <a href="" class="flex items-center justify-center">
                    {{-- {{ route('note.index') }} --}}
                    <svg class="w-6 h-6 fill-current mr-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z">
                        </path>
                    </svg>
                    <button>New Notes</button>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-5 gap-6 mt-5">
            <div class="bg-white p-6 rounded-lg shadow-md border-2 border-gray-500">
                <h3 class="text-gray-500 text-lg font-semibold">To Do Activity</h3>
                <p class="text-2xl font-bold"></p>
                {{-- {{ $todos }} --}}
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-2 border-yellow-500">
                <h3 class="text-yellow-500 text-lg font-semibold">Pending Activity</h3>
                <p class="text-2xl font-bold"></p>
                {{-- {{ $pendings }} --}}
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-2 border-blue-500">
                <h3 class="text-blue-500 text-lg font-semibold">In Progress Activity</h3>
                <p class="text-2xl font-bold"></p>
                {{-- {{ $inProgress }} --}}
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-2 border-green-500">
                <h3 class="text-green-500 text-lg font-semibold">Done Activity</h3>
                <p class="text-2xl font-bold"></p>
                {{-- {{ $dones }} --}}
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-2 border-red-500">
                <h3 class="text-red-500 text-lg font-semibold">Cancel Activity</h3>
                <p class="text-2xl font-bold"></p>
                {{-- {{ $cancels }} --}}
            </div>
        </div>

        <div class="mt-10">
            <h2 class="text-3xl font-semibold mb-6">Recent Activities</h2>
            <div class="bg-white p-6 rounded-lg shadow-md">
                {{-- @if ($recentActivities->isEmpty())
                <p class="text-gray-500">No recent activities available.</p>
            @else
                <ul>
                    @foreach ($recentActivities as $activity)
                        <li class="mb-5">
                            <a href="{{ route('activity-details', ['id' => $activity->id]) }}"
                                class="flex items-center justify-between bg-white p-4 rounded-lg shadow-md">
                                <div>
                                    <h3 class="text-2xl font-bold pb-2">{{ $activity->problem }}</h3>
                                    <p class="text-lg">{{ $activity->activity }}</p>
                                    <p class="text-gray-500 text-sm pb-2">Date:
                                        {{ \Carbon\Carbon::parse($activity->date)->format('d/m/Y') }}</p>
                                </div>
                                <div
                                    class="w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center text-white
                                    @if ($activity->status == 'todo') bg-gray-500
                                    @elseif($activity->status == 'pending') bg-yellow-500
                                    @elseif($activity->status == 'inprogress') bg-blue-500
                                    @elseif($activity->status == 'done') bg-green-500
                                    @elseif($activity->status == 'cancel') bg-red-500 @endif">
                                    {{ ucfirst($activity->status) }}
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif --}}
            </div>
        </div>

    </section>
@endsection
