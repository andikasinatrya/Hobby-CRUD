@extends('siswas.layout')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Data Siswa</h2>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('siswas.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input 
                    type="text" 
                    id="nama" 
                    name="name"
                    value="{{ old('name') }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Masukkan Nama" 
                    required>
            </div>
            <div>
                <label for="hobby" class="block text-sm font-medium text-gray-700">Hobi</label>
                <select 
                    id="hobby" 
                    name="hobby[]" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    multiple 
                    required>
                    @foreach ($hobi as $hobby)
                        <option value="{{ $hobby->id }}" {{ collect(old('hobby'))->contains($hobby->id) ? 'selected' : '' }}>
                            {{ $hobby->hobby }}
                        </option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-1">* Tekan Ctrl atau Command untuk memilih lebih dari satu hobi.</p>
            </div>
            
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection
