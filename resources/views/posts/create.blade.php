@extends('welcome')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md max-w-lg">
    <h2 class="text-xl font-semibold mb-4 text-gray-700">Crea un nuovo post</h2>
    
    <form method="POST" action="{{url('create-post')}}">
    @csrf
        <div class="space-y-4">
            <div>
                <label for="titolo" class="block text-sm font-medium text-gray-700">Titolo</label>
                <input 
                    id="title"
                    name="title"
                    type="text" 
                    placeholder="Inserisci il titolo"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
            </div>

            <div>
                <label for="desc" class="block text-sm font-medium text-gray-700">Descrizione Breve</label>
                <input 
                    id="description"
                    name="description"
                    type="text" 
                    placeholder="Inserisci una descrizione breve"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
            </div>

            <div>
                <label for="long_description" class="block text-sm font-medium text-gray-700">Descrizione Completa</label>
                <textarea id="long_description" name="long_description" placeholder="Scrivi qui la descrizione completa"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 h-32 resize-none"
                ></textarea>
            </div>

            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                Pubblica Post
            </button>
        </div>
    </form>
</div>
@endsection
