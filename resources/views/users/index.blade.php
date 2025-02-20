@extends('welcome')
@section('content')
<div class="max-w-sm mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <div class="mb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Profilo Utente</h2>
    </div>
    <div class="space-y-2">
        <p class="text-gray-600"><span class="font-medium">ID:</span> {{$user->id}}</p>
        <p class="text-gray-600"><span class="font-medium">Nome:</span> {{$user->name}}</p>
        <p class="text-gray-600"><span class="font-medium">Email:</span> {{$user->email}}</p>
    </div>
    <div class="mt-6">
        <a href="{{ route('posts') }}" class="block w-full text-center px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:outline-none transition duration-200 ease-in-out">
            Visualizza Post
        </a>
    </div>
</div>

@if($posts)
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <table class="min-w-full divide-y divide-gray-200 shadow-lg rounded-lg">
        <thead class="bg-gray-100"> 
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Created At</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Updated At</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($posts as $post)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $post->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $post->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $post->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post->updated_at->format('d M Y') }}</td>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection