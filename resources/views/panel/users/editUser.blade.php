@extends('layouts.dashboardLayout')
@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit User</h2>

  <!-- Form to edit user information -->
  <form>
    <div class="space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Name Field -->
        <div>
          <label for="name" class="block text-gray-700 font-semibold">Name</label>
          <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="John Doe">
        </div>

        <!-- Email Field -->
        <div>
          <label for="email" class="block text-gray-700 font-semibold">Email</label>
          <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="johndoe@example.com">
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Phone Field -->
        <div>
          <label for="phone" class="block text-gray-700 font-semibold">Phone Number</label>
          <input type="text" id="phone" name="phone" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="(123) 456-7890">
        </div>

        <!-- Role Selection -->
        <div>
          <label for="role" class="block text-gray-700 font-semibold">Role</label>
          <select id="role" name="role" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="admin">Admin</option>
            <option value="editor">Editor</option>
            <option value="user">User</option>
          </select>
        </div>
      </div>

      <!-- Password and Confirm Password Fields (Optional) -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label for="password" class="block text-gray-700 font-semibold">Password</label>
          <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="******">
        </div>
        <div>
          <label for="password_confirmation" class="block text-gray-700 font-semibold">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="******">
        </div>
      </div>

      <!-- Submit Button -->
      <div class="flex justify-end mt-6">
        <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Save Changes</button>
      </div>
    </div>
  </form>
</div>

@endsection