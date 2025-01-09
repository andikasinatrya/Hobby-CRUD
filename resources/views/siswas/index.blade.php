@extends('siswas.layout')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Data Siswa</h1>

    <div id="flash-messages" class="mb-4">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">No</th>
                    <th class="py-3 px-6 text-left">Nama Siswa</th>
                    <th class="py-3 px-6 text-left">Hobi</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6">{{ $item->nama }}</td>
                    <td class="py-3 px-6">
                        @foreach ($item->hobby as $hobi)
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-lg text-sm">{{ $hobi->hobby }}</span>
                        @endforeach
                    </td>
                    <td class="py-3 px-6 text-center space-x-2">
                        <a href="{{ route('siswas.show', $item->id) }}" class="text-yellow-600 hover:text-yellow-700 font-semibold">Detail</a>
                        <a href="{{ route('siswas.edit', $item->id) }}" class="text-green-600 hover:text-green-700 font-semibold">Edit</a>
                        <form action="{{ route('siswas.destroy', $item->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700 font-semibold" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-end">
        {{ $siswa->links('pagination::tailwind') }}
    </div>
</div>
@endsection
