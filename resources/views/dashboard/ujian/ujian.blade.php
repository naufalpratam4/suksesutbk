@extends('template.dashboard')
@section('content')

    <body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="bg-white p-6 sm:p-8 rounded-xl shadow-2xl w-full max-w-4xl">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Buat Ujian Baru</h1>
            <form id="examForm" class="space-y-8" action="{{ route('addUjian') }}" method="POST">
                @csrf
                <fieldset class="border border-gray-300 p-6 rounded-lg">
                    <legend class="text-xl font-semibold text-gray-700 px-2">Informasi Ujian</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="examTitle" class="block text-sm font-medium text-gray-700 mb-1">
                                Judul Ujian <span class="text-red-500">*</span>
                            </label>

                            <select name="subject_id" id="examSubject" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" disabled selected>Pilih mata pelajaran...</option>

                                {{-- Check if the $subjects variable exists and is not empty --}}
                                @if (isset($kategori) && $kategori->count() > 0)
                                    @foreach ($kategori as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                @else
                                    <option value="" disabled>Tidak ada mata pelajaran tersedia</option>
                                @endif
                            </select>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="title" id="subject" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Contoh: Matematika Dasar">
                        </div>
                        <div class="md:col-span-2">
                            <label for="examDescription" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                                Ujian</label>
                            <textarea name="description" id="examDescription" rows="3"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Deskripsi singkat mengenai ujian..."></textarea>
                        </div>
                        <div>
                            <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Durasi (menit) <span
                                    class="text-red-500">*</span></label>
                            <input type="number" name="duration" id="duration" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Contoh: 90">
                        </div>
                    </div>
                    <div class="flex justify-end pt-6">
                        <button type="button"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-md mr-3">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-save mr-2"></i> Simpan Ujian
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>

        {{-- table --}}
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6 mt-10">
            <div class="px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-700">Ujian</h2>
            </div>
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Kategori Ujian
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Judul
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            guru
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            durasi
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $exam->kategori->name ?? 'Unknown Title' }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $exam->title }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $exam->teacher->name }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $exam->duration }} menit
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex space-x-2">
                                    <!-- Tombol Lihat -->
                                        <a href="/soal/{{ $exam->id }}"
                                            class="inline-flex items-center px-3 py-1 text-xs font-medium text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                                            Lihat
                                        </a>
                                    <!-- Tombol Edit -->
                                    <a href="/edit-soal/{{$exam->id}}"
                                        class="inline-flex items-center px-3 py-1 text-xs font-medium text-yellow-600 bg-yellow-100 rounded hover:bg-yellow-200">
                                        Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1 text-xs font-medium text-red-600 bg-red-100 rounded hover:bg-red-200">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </body>
@endsection
