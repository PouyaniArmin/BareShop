@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">User Management</h2>

  <!-- User Search and Add User Button -->
  <div class="flex items-center justify-between mb-6">
    <div class="flex items-center">
      <input type="text" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search users..." />
      <button class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Search</button>
    </div>
    <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Add New User</button>
  </div>

  <!-- User List Table -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Users List</h3>
    <table class="min-w-full table-auto">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="px-4 py-2 text-sm text-gray-600">User ID</th>
          <th class="px-4 py-2 text-sm text-gray-600">Name</th>
          <th class="px-4 py-2 text-sm text-gray-600">Email</th>
          <th class="px-4 py-2 text-sm text-gray-600">Role</th>
          <th class="px-4 py-2 text-sm text-gray-600">Status</th>
          <th class="px-4 py-2 text-sm text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#1001</td>
          <td class="px-4 py-2 text-sm text-gray-700">Alice Johnson</td>
          <td class="px-4 py-2 text-sm text-gray-700">alice@example.com</td>
          <td class="px-4 py-2 text-sm text-gray-700">Admin</td>
          <td class="px-4 py-2 text-sm text-gray-700">Active</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <!-- Delete Button with Form -->
            <form method="POST" action="#" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">
                Delete
              </button>
            </form>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#1002</td>
          <td class="px-4 py-2 text-sm text-gray-700">Bob Smith</td>
          <td class="px-4 py-2 text-sm text-gray-700">bob@example.com</td>
          <td class="px-4 py-2 text-sm text-gray-700">Manager</td>
          <td class="px-4 py-2 text-sm text-gray-700">Inactive</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <!-- Delete Button with Form -->
            <form method="POST" action="#" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">
                Delete
              </button>
            </form>
          </td>
        </tr>
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">#1003</td>
          <td class="px-4 py-2 text-sm text-gray-700">Charlie Brown</td>
          <td class="px-4 py-2 text-sm text-gray-700">charlie@example.com</td>
          <td class="px-4 py-2 text-sm text-gray-700">User</td>
          <td class="px-4 py-2 text-sm text-gray-700">Active</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</button>
            <!-- Delete Button with Form -->
            <form method="POST" action="#" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">
                Delete
              </button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</main>
@endsection