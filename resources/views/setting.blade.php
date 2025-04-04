@extends('layouts.dashboardLayout')
@section('content')
<main class="flex-1 p-6 bg-gray-100">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Settings</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- General Settings -->
        <div class="bg-white p-4 rounded shadow-md">
            <h3 class="text-lg font-medium text-gray-800 mb-4">General Settings</h3>
            <form>
                <div class="mb-4">
                    <label for="site-name" class="block text-sm font-medium text-gray-700">Site Name</label>
                    <input type="text" id="site-name" name="site_name" class="mt-1 p-2 w-full border border-gray-300 rounded" placeholder="Enter site name" />
                </div>
                <div class="mb-4">
                    <label for="site-url" class="block text-sm font-medium text-gray-700">Site URL</label>
                    <input type="url" id="site-url" name="site_url" class="mt-1 p-2 w-full border border-gray-300 rounded" placeholder="Enter site URL" />
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
            </form>
        </div>

        <!-- Account Settings -->
        <div class="bg-white p-4 rounded shadow-md">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Account Settings</h3>
            <form>
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="mt-1 p-2 w-full border border-gray-300 rounded" placeholder="Enter username" />
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" class="mt-1 p-2 w-full border border-gray-300 rounded" placeholder="Enter email" />
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Account</button>
            </form>
        </div>

        <!-- Password Settings -->
        <div class="bg-white p-4 rounded shadow-md">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Password Settings</h3>
            <form>
                <div class="mb-4">
                    <label for="current-password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input type="password" id="current-password" name="current_password" class="mt-1 p-2 w-full border border-gray-300 rounded" placeholder="Enter current password" />
                </div>
                <div class="mb-4">
                    <label for="new-password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="new-password" name="new_password" class="mt-1 p-2 w-full border border-gray-300 rounded" placeholder="Enter new password" />
                </div>
                <div class="mb-4">
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                    <input type="password" id="confirm-password" name="confirm_password" class="mt-1 p-2 w-full border border-gray-300 rounded" placeholder="Confirm new password" />
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Change Password</button>
            </form>
        </div>
    </div>
</main>

@endsection
