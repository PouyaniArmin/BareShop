@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Category Management</h2>

  <!-- Category Search and Add Button -->
  <div class="flex items-center justify-between mb-6">
    <div class="flex items-center">
      <input type="text" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search categories..." />
      <button class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Search</button>
    </div>
    <a href="{{route('category.create')}}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Add New Category</a>
  </div>

  <!-- Category List Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Categories List</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">Category ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Name</th>
          <th class="px-4 py-2 text-sm text-gray-600">Description</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $category)
          <tr class="border-b">
            <td class="px-4 py-2 text-sm text-gray-700">#{{ $category->id }}</td>
            <td class="px-4 py-2 text-sm text-gray-700">{{ $category->name }}</td>
            <td class="px-4 py-2 text-sm text-gray-700">{{ $category->description ?? '—' }}</td>
            <td class="px-4 py-2 text-sm text-gray-700">
              <a href="{{route('category.edit',$category->id)}}" class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</a>
              <form method="POST" action="{{route('categories.destroy',$category->id)}}" class="inline-block ml-2" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="px-4 py-2 text-sm text-gray-500 text-center">No categories found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="flex justify-end mt-6">
      <nav class="inline-flex rounded-md shadow-sm">
        <a href="#" class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-gray-100">Previous</a>
        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-gray-100">1</a>
        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-gray-100">2</a>
        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-gray-100">3</a>
        <a href="#" class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-gray-100">Next</a>
      </nav>
    </div>
  </div>
</main>
@endsection
