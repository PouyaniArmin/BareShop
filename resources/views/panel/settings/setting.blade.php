@extends('layouts.dashboardLayout')

@section('content')
<main class="flex-1 p-6 bg-gray-100">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Settings</h2>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- General Settings -->
        <div class="bg-white p-4 rounded shadow-md">
            <h3 class="text-lg font-medium text-gray-800 mb-4">General Settings</h3>
            <form action="{{ route('settings.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="site-name" class="block text-sm font-medium text-gray-700">Site Name</label>
                    <input type="text" id="site-name" name="site_name" value="{{ $settings['site_name'] ?? '' }}" class="mt-1 p-2 w-full border border-gray-300 rounded" placeholder="Enter site name" />
                </div>

                <div class="mb-4">
                    <label for="site-url" class="block text-sm font-medium text-gray-700">Site URL</label>
                    <input type="url" id="site-url" name="site_url" value="{{ $settings['site_url'] ?? '' }}" class="mt-1 p-2 w-full border border-gray-300 rounded" placeholder="Enter site URL" />
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
            </form>
        </div>
    </div>
</main>
@endsection
