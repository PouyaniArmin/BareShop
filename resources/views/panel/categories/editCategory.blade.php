@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Category</h2>

  <!-- نمایش پیام خطا -->
  @if ($errors->any())
    <div class="mb-4">
      <ul class="bg-red-100 text-red-700 p-4 rounded-md">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PATCH')

    <div>
      <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
      <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name', $category->name) }}" required>
    </div>

    <div>
      <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
      <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $category->description) }}</textarea>
    </div>

    <div>
      <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Update Category</button>
    </div>
  </form>

</main>
@endsection
