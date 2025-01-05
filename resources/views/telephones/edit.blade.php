@extends('telephones.layout')

@section('content')

@if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Data</h1>
    <form action="{{ route('persones.update', $person->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="name" name="name" value="{{ $person->name }}" required>
        </div>

        <div class="mb-4">
            <label for="nisn" class="block text-sm font-medium text-gray-700">Nisn</label>
            <input type="text" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="nisn" name="nisn" value="{{ $person->nisn }}" required>
        </div>

        <div class="flex space-x-4 mt-6">
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 w-full sm:w-auto">Update</button>
            <a href="{{ route('persones.index') }}" class="bg-gray-400 text-white py-2 px-4 rounded hover:bg-gray-500 w-full sm:w-auto">Batal</a>
        </div>
    </form>
</div>

@endsection
