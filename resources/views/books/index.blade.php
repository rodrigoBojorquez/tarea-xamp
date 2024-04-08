@extends('books.layout')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold">CRUD de Libros con Mongo</h2>
        <a class="py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600" href="{{ route('books.create') }}">Nuevo libro</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
            <strong class="font-bold">Éxito!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    <table class="min-w-full border-collapse border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-6 py-3 border-b border-gray-300 text-left text-sm font-semibold text-gray-700">No</th>
                <th class="px-6 py-3 border-b border-gray-300 text-left text-sm font-semibold text-gray-700">Título</th>
                <th class="px-6 py-3 border-b border-gray-300 text-left text-sm font-semibold text-gray-700">Editorial</th>
                <th class="px-6 py-3 border-b border-gray-300 text-left text-sm font-semibold text-gray-700">Detalle</th>
                <th class="px-6 py-3 border-b border-gray-300">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">{{ ++$i }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">{{ $book->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">{{ $book->editorial }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">{{ $book->detalle }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300">
                        <div class="flex justify-center gap-3">
                            <a class="text-blue-500 hover:text-blue-700 mr-2" href="{{ route('books.show', $book->id) }}">Ver</a>
                            <a class="text-yellow-500 hover:text-yellow-700 mr-2" href="{{ route('books.edit', $book->id) }}">Editar</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
