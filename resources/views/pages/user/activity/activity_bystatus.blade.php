@extends('components.layouts.main')

@include('components.partials.sidebar_user')

@section('container')
    <section class="pl-4 pr-4 md:pl-24 md:pr-20 my-10 ml-0 md:ml-56 flex-grow">
        <div class="justify-between items-center">
            <h1 class="text-[32px] md:text-[42px] font-bold mb-6">View Activity by Status✍️</h1>
            @include('components.partials.activitybar')
        </div>

        <div class="mt-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                <!-- Status Column -->
                @php
                    $statuses = [
                        ['label' => 'To Do', 'color' => 'gray', 'bg' => 'blue-100', 'notes' => $todos],
                        ['label' => 'Pending', 'color' => 'yellow', 'bg' => 'yellow-100', 'notes' => $pendings],
                        ['label' => 'In Progress', 'color' => 'blue', 'bg' => 'blue-100', 'notes' => $inProgress],
                        ['label' => 'Done', 'color' => 'green', 'bg' => 'green-100', 'notes' => $dones],
                        ['label' => 'Cancel', 'color' => 'red', 'bg' => 'red-100', 'notes' => $cancels],
                    ];
                @endphp

                @foreach ($statuses as $status)
                    <div
                        class="bg-{{ $status['bg'] }} rounded-lg shadow-lg flex flex-col h-[calc(100vh-180px)] min-h-screen p-3">
                        <div
                            class="py-3 px-2 flex justify-center items-center bg-{{ $status['color'] }}-500 text-white text-center rounded-t-lg">
                            <h2 class="text-lg font-semibold">{{ $status['label'] }}</h2>
                        </div>
                        <div class="flex-grow overflow-y-auto space-y-4 pt-4 pb-4 px-2">
                            @foreach ($status['notes'] as $note)
                                <a href="{{ route('activity-details', ['id' => $note->id]) }}">
                                    <div
                                        class="bg-white p-4 rounded-lg shadow-sm border-l-8 border-{{ $status['color'] }}-500
                                           transition duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:bg-{{ $status['color'] }}-50">
                                        <h3 class="font-semibold text-lg text-gray-700">{{ $note->problem }}</h3>
                                        <p class="text-gray-400">Date:
                                            {{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
