@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create New Product</h2>

  <div class="bg-white p-6 rounded-lg shadow-md max-w-3xl">
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
      @csrf
      <!-- Product Name -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Product Name</label>
        <input name="name" type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., Classic T-Shirt" required>
      </div>

      <!-- Description -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Description</label>
        <textarea name="description" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Product details..."></textarea>
      </div>

      <!-- Price -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Price ($)</label>
        <input name="price" type="number" step="0.01" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 29.99">
      </div>

      <!-- Category -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Category</label>
        <select name="category_id" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="">Select a category</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- Stock -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Stock Quantity</label>
        <input name="stock" type="number" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 100">
      </div>

      <!-- Discount -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Discount (%)</label>
        <input name="discount" type="number" step="0.01" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 10">
      </div>

      <!-- Status -->
      <div class="mb-4">
        <label class="inline-flex items-center">
          <input
            name="is_active"
            type="checkbox"
            class="form-checkbox text-blue-600"
            value="1"
            {{ old('is_active', true) ? 'checked' : '' }}>
          <span class="ml-2 text-sm text-gray-700">Active</span>
        </label>
      </div>

      <!-- Images Upload -->
      <div class="mb-4">
        <label class="block text-gray-700 mb-2 text-sm font-medium">Product Images</label>
        <input type="file" id="imageInput" name="images[]" multiple class="w-full">
      </div>

      <!-- Image Previews + Primary Selection -->
      <div id="imagePreview" class="flex gap-2 mb-4 flex-wrap"></div>
      <div id="primaryImageSelect" class="hidden mb-4">
        <label class="block font-medium text-gray-700 mb-1">Select Primary Image</label>
      </div>

      <!-- Hidden input to store the primary image file name -->
      <input type="hidden" name="primary_image" id="primaryImageHidden">

      <!-- Buttons -->
      <div class="flex justify-end">
        <button type="button" class="mr-4 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Create Product</button>
      </div>
    </form>
  </div>
</main>

<script>
  const imageInput = document.getElementById('imageInput');
  const previewContainer = document.getElementById('imagePreview');
  const primarySelectContainer = document.getElementById('primaryImageSelect');
  let selectedFiles = [];

  imageInput.addEventListener('change', function() {
    selectedFiles = Array.from(this.files);
    updatePreview();
  });

  function updatePreview() {
    previewContainer.innerHTML = '';
    primarySelectContainer.innerHTML = '<label class="block font-medium text-gray-700 mb-1">Select Primary Image</label>';

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
        radio.onclick = function() {
          document.getElementById('primaryImageHidden').value = file.name; // Set the selected primary image value
        };

        const removeBtn = document.createElement('span');
        removeBtn.textContent = '×';
        removeBtn.classList.add('absolute', 'top-0', 'left-0', 'bg-red-500', 'text-white', 'rounded-full', 'w-5', 'h-5', 'text-center', 'cursor-pointer', 'text-xs', 'leading-5');
        removeBtn.title = 'Remove image';
        removeBtn.onclick = function() {
          selectedFiles.splice(index, 1);
          imageInput.value = '';
          updatePreview();
        };

        wrapper.appendChild(img);
        wrapper.appendChild(radio);
        wrapper.appendChild(removeBtn);
        previewContainer.appendChild(wrapper);
      };
      reader.readAsDataURL(file);
    });

    primarySelectContainer.classList.toggle('hidden', selectedFiles.length === 0);
  }
</script>
@endsection