@extends('components.layouts.main')

@include('components.partials.sidebar_user')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="justify-between items-center mb-5">
            <h1 class="text-[42px] font-bold">Log Status Details📂</h1>
        </div>

        <form method="GET" action="{{ route('log-status') }}">
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
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white border border-gray-300 text-">
                <thead class="bg-gray-100 text-gray-700 text-left">
                    <tr>
                        <th class="px-5 py-3 border-b">No</th>
                        <th class="px-5 py-3 border-b">Log Name</th>
                        <th class="px-5 py-3 border-b">Location</th>
                        <th class="px-5 py-3 border-b">Category</th>
                        <th class="px-5 py-3 border-b">Quantity</th>
                        <th class="px-5 py-3 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-3 border-b">{{ $items->firstItem() + $index }}</td>
                            <td class="px-5 py-3 border-b">{{ $item->item_name }}</td>
                            <td class="px-5 py-3 border-b">{{ $item->category->location->location_name }}</td>
                            <td class="px-5 py-3 border-b">{{ $item->category->category_name }}</td>
                            <td class="px-5 py-3 border-b">{{ $item->quantity }}</td>
                            <td class="px-5 py-3 border-b">{{ ucfirst($item->condition) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex justify-between items-center mt-6 text-md">
            <div>
                Showing {{ $items->firstItem() ?? 0 }} to {{ $items->lastItem() ?? 0 }} of {{ $items->total() ?? 0 }}
                entries
            </div>
            <div>
                {{ $items->appends(request()->all())->onEachSide(1)->links('vendor.pagination.tailwind-white') }}
            </div>
        </div>
    </section>
@endsection
