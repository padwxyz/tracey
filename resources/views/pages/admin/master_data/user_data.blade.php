@extends('components.layouts.main_admin')

@section('container')
    <section class="px-5 md:pl-20 md:pr-20 my-10 md:ml-56 flex-grow">
        <div class="md:flex md:justify-between md:items-center">
            <h1 class="text-3xl font-bold">User Management Data</h1>
            <button
                class="bg-gradient-to-r from-[#4ABA68] to-[#5FC4B2] hover:from-[#5FC4B2] hover:to-[#4ABA68] text-white px-4 py-2 my-3 md:my-5 rounded-md hover:bg-blue-600 transition duration-200"
                onclick="toggleModal('addUserModal')">
                <i class="fas fa-plus mr-2"></i>Add User Data
            </button>
        </div>

        <form method="GET" action="{{ route('user.index') }}">
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
                <thead class="bg-gray-200 text-md md:text-md">
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Gender</th>
                        <th class="px-4 py-2 border">Phone Number</th>
                        <th class="px-4 py-2 border">Role</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-4 py-2 border">{{ $user->id }}</td>
                            <td class="px-4 py-2 border">{{ $user->name }}</td>
                            <td class="px-4 py-2 border">{{ $user->email }}</td>
                            <td class="px-4 py-2 border">{{ $user->gender }}</td>
                            <td class="px-4 py-2 border">{{ $user->phone_number }}</td>
                            <td class="px-4 py-2 border">{{ $user->role }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600"
                                        onclick="toggleModal('editUserModal{{ $user->id }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600"
                                        onclick="toggleModal('viewUserModal{{ $user->id }}')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <form action="{{ route('user.delete', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div id="editUserModal{{ $user->id }}"
                            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                                <h2 class="text-2xl mb-6 font-semibold">Edit User Data</h2>
                                <form action="{{ route('user.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label for="name" class="block text-gray-700">Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            class="border rounded w-full px-3 py-2 mt-1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="block text-gray-700">Email</label>
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="border rounded w-full px-3 py-2 mt-1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="gender" class="block text-gray-700">Gender</label>
                                        <select name="gender" class="border rounded w-full px-3 py-2 mt-1">
                                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="phone_number" class="block text-gray-700">Phone Number</label>
                                        <input type="number" name="phone_number" value="{{ $user->phone_number }}"
                                            class="border rounded w-full px-3 py-2 mt-1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="role" class="block text-gray-700">Role</label>
                                        <select name="role" class="border rounded w-full px-3 py-2 mt-1" required>
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="block text-gray-700">Password (leave blank to keep
                                            current
                                            password)</label>
                                        <input type="password" name="password"
                                            class="border rounded w-full px-3 py-2 mt-1">
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Save</button>
                                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded"
                                            onclick="toggleModal('editUserModal{{ $user->id }}')">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="viewUserModal{{ $user->id }}"
                            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                                <h2 class="text-2xl mb-6 font-semibold">Details User Data</h2>
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700">Name</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">{{ $user->name }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700">Email</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">{{ $user->email }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="gender" class="block text-gray-700">Gender</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">{{ $user->gender }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="phone_number" class="block text-gray-700">Phone Number</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">{{ $user->phone_number }}</p>
                                </div>
                                <div class="mb-4">
                                    <label for="created_at" class="block text-gray-700">Created At</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        @if ($user->created_at)
                                            {{ $user->created_at->format('Y-m-d H:i:s') }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <label for="updated_at" class="block text-gray-700">Updated At</label>
                                    <p class="border rounded w-full px-3 py-2 mt-1">
                                        @if ($user->updated_at)
                                            {{ $user->updated_at->format('Y-m-d H:i:s') }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>

                                <div class="flex justify-end">
                                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded"
                                        onclick="toggleModal('viewUserModal{{ $user->id }}')">Close</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="addUserModal" class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                <h2 class="text-2xl mb-6 font-semibold">Add User</h2>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" name="name" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" name="email" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label for="gender" class="block text-gray-700">Gender</label>
                        <input type="text" name="gender" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone_number" class="block text-gray-700">Phone Number</label>
                        <input type="number" name="phone_number" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" name="password" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Save</button>
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded"
                            onclick="toggleModal('addUserModal')">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex justify-between items-center mt-6 text-md">
            <div>
                Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of {{ $users->total() ?? 0 }}
                entries
            </div>
            <div>
                {{ $users->appends(request()->all())->onEachSide(1)->links('vendor.pagination.tailwind-white') }}
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
