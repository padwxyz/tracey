@extends('components.layouts.main')
@include('components.partials.sidebar_user')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="justify-between items-center">
            <h1 class="text-[42px] font-bold">{{ $title }}✍️</h1>
            @include('components.partials.activitybar')
        </div>
        <div>
            @forelse ($notes as $note)
                <div class="mt-8 mb-5">
                    <a href="{{ route('activity-details', $note->id) }}">
                        <div
                            class="flex items-center justify-between bg-white p-4 rounded-2xl shadow-md
                                           transition duration-300 ease-in-out
                                           hover:-translate-y-2 hover:scale-105 hover:shadow-xl hover:bg-gray-50">
                            <div>
                                <h3 class="text-2xl font-bold pb-2">{{ $note->problem }}</h3>
                                <p class="text-lg">{{ $note->activity }}</p>
                                <p class="text-gray-500 text-sm pb-2">
                                    Date: {{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}
                                </p>
                            </div>
                            <div
                                class="w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center
                            @if ($note->status == 'todo') bg-gray-500 text-white
                            @elseif ($note->status == 'pending') bg-yellow-500 text-white
                            @elseif ($note->status == 'inprogress') bg-blue-500 text-white
                            @elseif ($note->status == 'done') bg-green-500 text-white
                            @elseif ($note->status == 'cancel') bg-red-500 text-white
                            @else bg-gray-200 text-black @endif">
                                {{ ucfirst($note->status) }}
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="text-center mt-10">
                    <p class="text-xl text-gray-500">No activities found.</p>
                </div>
            @endforelse
        </div>

        @if ($notes instanceof \Illuminate\Pagination\LengthAwarePaginator && $notes->hasPages())
            <div class="mt-10 flex justify-center">
                {{ $notes->onEachSide(1)->links() }}
            </div>
        @endif
    </section>
@endsection
