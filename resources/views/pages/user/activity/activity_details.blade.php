@extends('components.layouts.main')

@include('components.partials.sidebar_user')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div>
            <div class="bg-white mt-2 p-5 rounded-xl shadow-md flex flex-col space-y-6">
                <div class="flex items-center mb-4">
                    <a href="{{ route('all-activity') }}" class="p-2 rounded-full hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <h1 class="text-[42px] font-bold ml-4">Activity Details✍️</h1>
                </div>

                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-2xl font-semibold">{{ $note->problem }}</h3>
                        <div
                            class="mt-8 w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center
                    @if ($note->status == 'todo') bg-gray-500 text-white
                    @elseif ($note->status == 'pending') bg-yellow-500 text-white
                    @elseif ($note->status == 'inprogress') bg-blue-500 text-white
                    @elseif ($note->status == 'done') bg-green-500 text-white
                    @elseif ($note->status == 'cancel') bg-red-500 text-white @endif">
                            {{ ucfirst($note->status) }}
                        </div>
                        <p class="mt-4 text-gray-600"><span class="font-bold">Date:</span>
                            {{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}</p>
                        <p class="mt-2 text-gray-600"><span class="font-bold">Time:</span>
                            {{ \Carbon\Carbon::parse($note->time)->format('h:i A') }}</p>
                        <p class="mt-2 text-gray-600"><span class="font-bold">Name:</span> {{ $note->name }}</p>
                        </p>
                    </div>
                    <div class="flex-1 ml-10">
                        <p class="mt-12 text-gray-600"><span class="font-bold">Location:</span>
                            {{ $note->location->location_name }}</p>
                        <p class="mt-2 text-gray-600"><span class="font-bold">Category:</span>
                            {{ $note->category->category_name }}</p>
                        <p class="mt-2 text-gray-600"><span class="font-bold">Item:</span> {{ $note->item->item_name }}</p>
                    </div>
                    <div class="flex-1 ml-10">
                        <p class="mt-12 text-gray-600"><span class="font-bold">Image:</span></p>
                        @if ($note->image)
                            <img src="{{ asset('storage/' . $note->image) }}" alt="Reported Issue"
                                class="mt-2 w-[400px] h-[200px] object-cover rounded-lg shadow-md">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>
                </div>

                <div class="border-t pt-5">
                    <form action="{{ route('activity.update', $note->id) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                        </div>
                        <div class="mb-2">
                            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                            <input type="date" id="date" name="date"
                                value="{{ \Carbon\Carbon::parse($note->date)->format('Y-m-d') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-2">
                            <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Time:</label>
                            <input type="time" id="time" name="time"
                                value="{{ \Carbon\Carbon::parse($note->time)->format('H:i') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                                required>
                        </div>
                </div>
                <div class="mb-2">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select id="status" name="status"
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        required>
                        <option value="todo" {{ $note->status == 'todo' ? 'selected' : '' }}>To Do</option>
                        <option value="inprogress" {{ $note->status == 'inprogress' ? 'selected' : '' }}>In
                            Progress</option>
                        <option value="pending" {{ $note->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="done" {{ $note->status == 'done' ? 'selected' : '' }}>Done</option>
                        <option value="cancel" {{ $note->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea id="message" name="message"
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        rows="3" required>{{ $note->activity }}</textarea>
                </div>
                <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update
                    Activity</button>
                </form>
            </div>
        </div>
        </div>
    </section>
@endsection
