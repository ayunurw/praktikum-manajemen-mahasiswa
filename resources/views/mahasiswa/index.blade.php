<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div class="mb-4 text-green-600 font-bold">
                        {{ session('success') }}
                    </div>
                @endif

                @if (auth()->user()->role === 'admin')
                    <div class="mb-6">
                        <a href="{{ route('mahasiswa.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                            + Tambah Mahasiswa
                        </a>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prodi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Angkatan</th>
                                @if (auth()->user()->role === 'admin')
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($mahasiswa as $mhs)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $mhs->nim }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $mhs->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $mhs->program_studi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $mhs->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $mhs->angkatan }}</td>
                                    @if (auth()->user()->role === 'admin')
                                        <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                Edit
                                            </a>
                                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>