@extends('components.layouts.main_admin')

@section('container')
    <section class="px-5 md:pl-20 md:pr-20 my-10 md:ml-56 flex-grow">
        <div class="md:flex md:justify-between md:items-center">
            <h1 class="text-3xl font-bold">Category Management Data</h1>
            <button
                class="bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:from-[#5FC4B2] hover:to-[#4ABA68] text-white px-4 py-2 my-3 md:my-5 rounded-md hover:bg-blue-600 transition duration-200"
                onclick="toggleModal('addCategoryModal')">
                <i class="fas fa-plus mr-2"></i>Add Category Data
            </button>
        </div>

        <form method="GET" action="{{ route('category.index') }}">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <label for="entries" class="mr-2 text-md">Show</label>
                    <select name="entries" id="entries" onchange="this.form.submit()"
                        class="border border-gray-300 rounded py-1 px-3 text-md bg-white text-gray-700">
                        <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('entries') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="ml-2 text-md">entries</span>
                </div>
                <div>
                    <label for="search" class="mr-2 text-md">Search:</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        class="border border-gray-300 rounded py-1 px-3 text-md bg-white text-gray-700"
                        placeholder="Search...">
                    <button type="submit"
                        class="ml-2 bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:from-[#5FC4B2] hover:to-[#4ABA68] text-white py-1 px-3 rounded text-md">Go</button>
                </div>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full rounded-lg border-collapse border border-gray-300 text-sm text-left">
                <thead class="bg-gray-100 text-md md:text-md">
                    <tr>
                        <th class="px-4 py-2 border">Code</th>
                        <th class="px-4 py-2 border">Category Name</th>
                        <th class="px-4 py-2 border">Location</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="px-4 py-2 border">{{ $category->id }}</td>
                            <td class="px-4 py-2 border">{{ $category->category_name }}</td>
                            <td class="px-4 py-2 border">{{ $category->location->location_name }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600"
                                        onclick="toggleModal('editCategoryModal{{ $category->id }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600"
                                        onclick="toggleModal('viewCategoryModal{{ $category->id }}')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <form action="{{ route('category.delete', $category->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white text-white px-3 py-2 rounded hover:bg-red-600">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div id="editCategoryModal{{ $category->id }}"
                            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                                <h2 class="text-2xl mb-6 font-semibold">Edit Category Data</h2>
                                <form action="{{ route('category.update', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label for="category_name" class="block text-gray-700">Category Name</label>
                                        <input type="text" name="category_name" value="{{ $category->category_name }}"
                                            class="border rounded w-full px-3 py-2 mt-1">
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Save</button>
                                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded"
                                            onclick="toggleModal('editCategoryModal{{ $category->id }}')">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="viewCategoryModal{{ $category->id }}"
                            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                                <h2 class="text-2xl mb-6 font-semibold">Details Data Category</h2>
                                <div class="mb-4">
                                    <label for="category_name" class="block text-gray-700">Category Name</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">{{ $category->category_name }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="location_name" class="block text-gray-700">Lokasi Fasilitas</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        {{ $category->location->location_name }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="created_at" class="block text-gray-700">Created At</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        @if ($category->created_at)
                                            {{ $category->created_at->format('Y-m-d H:i:s') }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <label for="updated_at" class="block text-gray-700">Updated At</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        @if ($category->updated_at)
                                            {{ $category->updated_at->format('Y-m-d H:i:s') }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>

                                <div class="flex justify-end">
                                    <button type="button" class="bg-red-500 px-4 py-2 rounded"
                                        onclick="toggleModal('viewCategoryModal{{ $category->id }}')">Close</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="addCategoryModal"
            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                <h2 class="text-2xl mb-6 font-semibold">Tambah Kategori</h2>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="category_name" class="block text-gray-700">Nama Kategori</label>
                        <input type="text" name="category_name" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Save</button>
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded"
                            onclick="toggleModal('addCategoryModal')">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex justify-between items-center mt-6 text-md">
            <div>
                Showing {{ $categories->firstItem() ?? 0 }} to {{ $categories->lastItem() ?? 0 }} of
                {{ $categories->total() ?? 0 }}
                entries
            </div>
            <div>
                {{ $categories->appends(request()->all())->onEachSide(1)->links('vendor.pagination.tailwind-white') }}
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
