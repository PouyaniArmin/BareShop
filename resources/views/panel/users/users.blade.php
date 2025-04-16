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
    <button
      class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 
        @if(Auth::user()->role->name === 'seller') bg-gray-400 cursor-not-allowed @endif"
      @if(Auth::user()->role->name === 'seller') disabled @endif>
      Add New User
    </button>

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
        @foreach($users as $user)
        <tr class="border-b">
          <td class="px-4 py-2 text-sm text-gray-700">{{$user->id}}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{$user->name}}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{$user->email}}</td>
          <td class="px-4 py-2 text-sm text-gray-700">{{$user->role->name}}</td>
          <td class="px-4 py-2 text-sm text-gray-700">@if($user->email_verified_at)
            Active
            @else
            Inactive
            @endif</td>
          <td class="px-4 py-2 text-sm text-gray-700">
            @if(Auth::user()->role->name === 'admin')
            <a href="{{ route('users.edit', $user->id) }}"
              class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">
              Edit
            </a>
            <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">
                Delete
              </button>
            </form>
            @elseif(Auth::user()->role->name === 'seller')
            <button class="px-3 py-1 bg-yellow-600 text-white rounded-md cursor-not-allowed opacity-50" disabled>Edit</button>
            <button class="ml-2 px-3 py-1 bg-red-600 text-white rounded-md cursor-not-allowed opacity-50" disabled>Delete</button>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection