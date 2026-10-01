<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Mahasiswa Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">NIM</label>
                        <input type="text" name="nim" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nama</label>
                        <input type="text" name="nama" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Program Studi</label>
                        <input type="text" name="program_studi" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Angkatan</label>
                        <input type="number" name="angkatan" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="flex items-center justify-end space-x-2">
                        <a href="{{ route('mahasiswa.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>