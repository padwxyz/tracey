@extends('components.layouts.main_admin')

@section('container')
    <section class="px-5 md:pl-20 md:pr-20 my-10 md:ml-56 flex-grow mt-[100px]">
        <div class="md:flex md:justify-between md:items-center">
            <h1 class="text-2xl font-bold">Location Management Data</h1>
            <button
                class="bg-blue-500 text-white px-4 py-2 my-3 md:my-5 rounded-md hover:bg-blue-600 transition duration-200"
                onclick="toggleModal('addLocationModal')">
                <i class="fas fa-plus mr-2"></i>Add Location Data
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full rounded-lg border-collapse border border-gray-300 text-sm text-left">
                <thead class="bg-gray-200 text-md md:text-xl">
                    <tr>
                        <th class="px-4 py-2 border">Code</th>
                        <th class="px-4 py-2 border">Location Name</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($location as $location)
                        <tr>
                            <td class="px-4 py-2 border">{{ $location->id }}</td>
                            <td class="px-4 py-2 border">{{ $location->location_name }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600"
                                        onclick="toggleModal('editLocationModal{{ $location->id }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600"
                                        onclick="toggleModal('viewLocationModal{{ $location->id }}')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <form action="{{ route('location.delete', $location->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div id="editLocationModal{{ $location->id }}"
                            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                                <h2 class="text-2xl mb-6 font-semibold">Edit Location Data</h2>
                                <form action="{{ route('location.update', $location->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label for="location_name" class="block text-gray-700">Location Name</label>
                                        <input type="text" name="location_name" value="{{ $location->location_name }}"
                                            class="border rounded w-full px-3 py-2 mt-1">
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Save</button>
                                        <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                            onclick="toggleModal('editLocationModal{{ $location->id }}')">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="viewLocationModal{{ $location->id }}"
                            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                                <h2 class="text-2xl mb-6 font-semibold">Details Location Data</h2>
                                <div class="mb-4">
                                    <label for="location_name" class="block text-gray-700">Location Name</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">{{ $location->location_name }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="created_at" class="block text-gray-700">Created At</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        @if ($location->created_at)
                                            {{ $location->created_at->format('Y-m-d H:i:s') }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <label for="updated_at" class="block text-gray-700">Updated At</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        @if ($location->updated_at)
                                            {{ $location->updated_at->format('Y-m-d H:i:s') }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>

                                <div class="flex justify-end">
                                    <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                        onclick="toggleModal('viewLocationModal{{ $location->id }}')">Close</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="addLocationModal"
            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                <h2 class="text-2xl mb-6 font-semibold">Add Location Data</h2>
                <form action="{{ route('location.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="location_name" class="block text-gray-700">Location Name</label>
                        <input type="text" name="location_name" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Add</button>
                        <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                            onclick="toggleModal('addLocationModal')">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
@endsection
