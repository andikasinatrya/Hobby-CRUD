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
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Data Siswa</h1>
    <form action="{{ route('siswas.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" 
                class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                id="name" 
                name="name" 
                value="{{ old('name', $siswa->nama) }}" 
                required>
        </div>

        <div class="mb-4">
            <label for="hobby" class="block text-sm font-medium text-gray-700">Hobi</label>
            <select 
                id="hobby" 
                name="hobby[]" 
                class="form-select mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                multiple 
                required>
                @foreach ($hobi as $hobby)
                    <option value="{{ $hobby->id }}" {{ $siswa->hobby->contains($hobby->id) ? 'selected' : '' }}>
                        {{ $hobby->hobby }}
                    </option>
                @endforeach
            </select>
            <p class="text-sm text-gray-500 mt-1">* Tekan Ctrl atau Command untuk memilih lebih dari satu hobi.</p>
        </div>

        <div class="flex space-x-4 mt-6">
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 w-full sm:w-auto">Update</button>
            <a href="{{ route('siswas.index') }}" class="bg-gray-400 text-white py-2 px-4 rounded hover:bg-gray-500 w-full sm:w-auto">Batal</a>
        </div>
    </form>
</div>

@endsection
