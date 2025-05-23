@extends('components.layouts.main_admin')

@section('container')
    <section class="px-5 md:pl-20 md:pr-20 my-10 md:ml-56 flex-grow mt-[100px]">
        <div class="md:flex md:justify-between md:items-center">
            <h1 class="text-2xl font-bold">Item Management Data</h1>
            <button
                class="bg-blue-500 text-white px-4 py-2 my-3 md:my-5 rounded-md hover:bg-blue-600 transition duration-200"
                onclick="toggleModal('addItemModal')">
                <i class="fas fa-plus mr-2"></i>Add Item Data
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full rounded-lg border-collapse border border-gray-300 text-sm text-left">
                <thead class="bg-gray-100 text-md md:text-xl">
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Item Name</th>
                        <th class="px-4 py-2 border">Category</th>
                        <th class="px-4 py-2 border">Facility</th>
                        <th class="px-4 py-2 border">Location</th>
                        <th class="px-4 py-2 border">Quantity</th>
                        <th class="px-4 py-2 border">Condition</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item as $item)
                        <tr>
                            <td class="px-4 py-2 border">{{ $item->id }}</td>
                            <td class="px-4 py-2 border">{{ $item->item_name }}</td>
                            <td class="px-4 py-2 border">{{ $item->category->category_name }}</td>
                            <td class="px-4 py-2 border">{{ $item->category->facility->facility_name }}</td>
                            <td class="px-4 py-2 border">{{ $item->category->facility->location->location_name }}</td>
                            <td class="px-4 py-2 border">{{ $item->quantity }}</td>
                            <td class="px-4 py-2 border">{{ $item->condition }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600"
                                        onclick="toggleModal('editItemModal{{ $item->id }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600"
                                        onclick="toggleModal('viewItemModal{{ $item->id }}')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <form action="{{ route('item.delete', $item->id) }}" method="POST"
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

                        <div id="editItemModal{{ $item->id }}"
                            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                                <h2 class="text-2xl mb-6 font-semibold">Edit Barang</h2>
                                <form action="{{ route('item.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label for="item_name" class="block text-gray-700">Nama Barang</label>
                                        <input type="text" name="item_name" value="{{ $item->item_name }}"
                                            class="border rounded w-full px-3 py-2 mt-1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="quantity" class="block text-gray-700">Jumlah</label>
                                        <input type="number" name="quantity" value="{{ $item->quantity }}"
                                            class="border rounded w-full px-3 py-2 mt-1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="condition" class="block text-gray-700">Kondisi</label>
                                        <select name="condition" class="border rounded w-full px-3 py-2 mt-1">
                                            <option value="Normal" @if ($item->condition == 'Normal') selected @endif>Normal
                                            </option>
                                            <option value="Tidak Normal" @if ($item->condition == 'Tidak Normal') selected @endif>
                                                Tidak
                                                Normal</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="category_id" class="block text-gray-700">Kategori</label>
                                        <select name="category_id" class="border rounded w-full px-3 py-2 mt-1">
                                            {{-- @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id == $item->category_id) selected @endif>
                                                    {{ $category->category_name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Simpan</button>
                                        <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                            onclick="toggleModal('editItemModal{{ $item->id }}')">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="viewItemModal{{ $item->id }}"
                            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                                <h2 class="text-2xl mb-6 font-semibold">Details Data Item</h2>
                                <div class="mb-4">
                                    <label for="item_name" class="block text-gray-700">item Name</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">{{ $item->item_name }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="category_name" class="block text-gray-700">Category Name</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">{{ $item->category->category_name }}
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <label for="facility_name" class="block text-gray-700">Facility Name</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        {{ $item->category->facility->facility_name }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="location_name" class="block text-gray-700">Location Name</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        {{ $item->category->facility->location->location_name }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="quantity" class="block text-gray-700">Quantity</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">{{ $item->quantity }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="condition" class="block text-gray-700">Condition</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">{{ $item->condition }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="created_at" class="block text-gray-700">Created At</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        @if ($item->created_at)
                                            {{ $item->created_at->format('Y-m-d H:i:s') }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <label for="updated_at" class="block text-gray-700">Updated At</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        @if ($item->updated_at)
                                            {{ $item->updated_at->format('Y-m-d H:i:s') }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>

                                <div class="flex justify-end">
                                    <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                        onclick="toggleModal('viewitemModal{{ $item->id }}')">Close</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="addItemModal" class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                <h2 class="text-2xl mb-6 font-semibold">Tambah Barang</h2>
                <form action="{{ route('item.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="item_name" class="block text-gray-700">Nama Barang</label>
                        <input type="text" name="item_name" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700">Jumlah</label>
                        <input type="number" name="quantity" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="condition" class="block text-gray-700">Kondisi</label>
                        <select name="condition" class="border rounded w-full px-3 py-2 mt-1">
                            <option value="Normal">Normal</option>
                            <option value="Tidak Normal">Tidak Normal</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-700">Kategori</label>
                        <select name="category_id" class="border rounded w-full px-3 py-2 mt-1">
                            {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Tambah</button>
                        <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                            onclick="toggleModal('addItemModal')">Batal</button>
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
