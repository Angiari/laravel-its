@extends('welcome')

@section('content')
 <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
<form>
    <div class="flex items-center space-x-2">
    <label class="sr-only" for="email">Cerca Titolo</label>
    <input 
        name="search" 
        value="{{ Request::get('search') }}" 
        type="text" 
        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
    >
    <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        Cerca
    </button>
    <a href="{{ route('create-post') }}" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:outline-none transition duration-200 ease-in-out" role="button">
        Crea
    </a>
</div>
</form>
    <table class="min-w-full divide-y divide-gray-200 shadow-lg rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Created At</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Updated At</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Azioni</th>
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
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="{{ route('edit-post', $post->id) }}" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:outline-none transition duration-200 ease-in-out" role="button">
                            Modifica
                        </a>
                        <a href="{{ route('delete-post', $post->id) }}" class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:outline-none transition duration-200 ease-in-out" role="button">
                            Elimina
                        </a>
                         
                    </td>
                    
            @endforeach
        </tbody>
    </table>
</div>
@endsection