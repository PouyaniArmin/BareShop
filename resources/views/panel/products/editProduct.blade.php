@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Product</h2>

  <div class="bg-white p-6 rounded-lg shadow-md max-w-3xl">
    <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <!-- Product Name -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Product Name</label>
        <input name="name" type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name', $product->name) }}" required>
      </div>

      <!-- Description -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Description</label>
        <textarea name="description" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4">{{ old('description', $product->description) }}</textarea>
      </div>

      <!-- Price -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Price ($)</label>
        <input name="price" type="number" step="0.01" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('price', $product->price) }}" placeholder="e.g., 29.99">
      </div>

      <!-- Category -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Category</label>
        <select name="category_id" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- Stock -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Stock Quantity</label>
        <input name="stock" type="number" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('stock', $product->stock) }}" placeholder="e.g., 100">
      </div>

      <!-- Discount -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Discount (%)</label>
        <input name="discount" type="number" step="0.01" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('discount', $product->discount) }}" placeholder="e.g., 10">
      </div>

      <!-- Status -->
      <div class="mb-4">
        <label class="inline-flex items-center">
          <input name="is_active" type="checkbox" class="form-checkbox text-blue-600" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
          <span class="ml-2 text-sm text-gray-700">Active</span>
        </label>
      </div>

      <!-- Existing Images -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Existing Product Images</label>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
          @foreach($product->images as $image)
            <div class="flex items-center mb-4">
              <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" class="w-32 h-32 object-cover mr-4 border rounded">
              <div class="flex flex-col gap-2">
                <label class="inline-flex items-center">
                  <input type="radio" name="primary_image" value="{{ $image->id }}" {{ $image->is_primary ? 'checked' : '' }}>
                  <span class="ml-2 text-sm text-gray-700">Set as Primary</span>
                </label>
                <label class="inline-flex items-center">
                  <input type="checkbox" name="delete_images[]" value="{{ $image->id }}" class="form-checkbox text-red-600">
                  <span class="ml-2 text-sm text-red-600">Delete</span>
                </label>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- New Images Upload -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Add More Images</label>
        <input type="file" name="new_images[]" multiple class="w-full" id="imageInput">
      </div>

      <!-- Preview of New Images -->
      <div class="mb-4" id="imagePreview" class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        <!-- Preview images will be inserted here -->
      </div>

      <!-- Buttons -->
      <div class="flex justify-end">
        <a href="#" class="mr-4 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</a>
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Product</button>
      </div>
    </form>
  </div>
</main>

<script>
  const imageInput = document.getElementById('imageInput');
  const previewContainer = document.getElementById('imagePreview');
  let selectedFiles = [];

  imageInput.addEventListener('change', function() {
    selectedFiles = Array.from(this.files);
    updatePreview();
  });

  function updatePreview() {
    previewContainer.innerHTML = ''; // Clear previous previews

    selectedFiles.forEach((file, index) => {
      const reader = new FileReader();
      reader.onload = function(e) {
        const wrapper = document.createElement('div');
        wrapper.classList.add('relative', 'w-20', 'h-20');

        const img = document.createElement('img');
        img.src = e.target.result;
        img.classList.add('w-full', 'h-full', 'object-cover', 'rounded-md', 'border');

        const radio = document.createElement('input');
        radio.type = 'radio';
        radio.name = 'primary_image';
        radio.value = file.name;
        radio.classList.add('absolute', 'top-0', 'right-0', 'm-1');

        const removeBtn = document.createElement('span');
        removeBtn.textContent = '×';
        removeBtn.classList.add('absolute', 'top-0', 'left-0', 'bg-red-500', 'text-white', 'rounded-full', 'w-5', 'h-5', 'text-center', 'cursor-pointer', 'text-xs', 'leading-5');
        removeBtn.title = 'Remove image';
        removeBtn.onclick = function() {
          selectedFiles.splice(index, 1);
          imageInput.value = ''; // Reset input field
          updatePreview(); // Re-render the preview
        };

        wrapper.appendChild(img);
        wrapper.appendChild(radio);
        wrapper.appendChild(removeBtn);
        previewContainer.appendChild(wrapper);
      };
      reader.readAsDataURL(file);
    });
  }
</script>
@endsection
