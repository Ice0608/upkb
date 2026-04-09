<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Manage Users</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="bg-white rounded-3xl shadow-lg p-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Manage Users</h1>
                <a href="{{ route('admin.adduser') }}" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition font-semibold">
                    <i class="fas fa-plus mr-2"></i>Add User
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($users->isEmpty())
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No users found</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="border-b bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 font-semibold text-gray-700">No.</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Name</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Username</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Level</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Created</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $user)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3">{{ $key + 1 }}</td>
                                    <td class="px-4 py-3">{{ $user->name }}</td>
                                    <td class="px-4 py-3">{{ $user->username }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-3 py-1 rounded-full text-sm font-semibold 
                                            {{ $user->level === 'admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }}">
                                            {{ ucfirst($user->level) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.edituser', $user->id) }}" class="text-blue-500 hover:text-blue-700">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.deleteuser', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Confirm delete?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer-admin')
    
</body>
</html>
