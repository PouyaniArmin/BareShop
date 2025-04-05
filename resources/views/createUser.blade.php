@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add New User</h2>

  <form action="" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <!-- Full Name -->
      <div class="form-group">
        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" id="name" name="name" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
        <input type="email" id="email" name="email" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Confirm Password -->
      <div class="form-group">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Role -->
      <div class="form-group">
        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
        <select id="role" name="role" class="mt-2 p-3 border border-gray-300 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <!-- Submit Button -->
      <div class="form-group col-span-2 text-center">
        <button type="submit" class="mt-6 bg-blue-600 text-white p-3 rounded-lg w-full shadow-md hover:bg-blue-700 transition-all duration-200">Add User</button>
      </div>

    </div>
  </form>
</main>

@endsection
