@extends('template.dashboard')
@section('content')
    <fieldset class="border border-gray-300 p-6 rounded-lg">
        <legend class="text-xl font-semibold text-gray-700 px-2">Buat Soal dari Mata Pelajaran {{ $exam->title }} </legend>
        {{-- Kotak nomor soal --}}
        <form action="{{ route('addSoal', $exam->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Bagian Soal -->
                <div class="space-y-8 w-full lg:w-3/4">
                    <div class="border border-dashed border-gray-400 p-6 rounded-lg bg-gray-50 shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Tambah Soal</h3>
                        </div>

                        <!-- Input Teks Soal -->
                        <div class="mb-4">
                            <label for="question_text" class="block text-sm font-medium text-gray-700 mb-1">
                                Teks Soal <span class="text-red-500">*</span>
                            </label>
                            <textarea name="question_text" id="question_text" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Masukkan teks soal..."></textarea>

                            <div class="flex justify-center py-2 text-sm text-gray-500 italic">atau</div>

                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Unggah
                                Gambar:</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="block w-full border rounded-lg text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer" />
                        </div>

                        <!-- Pilihan Jawaban -->
                        <div class="space-y-3">
                            <h4 class="text-md font-semibold text-gray-700 mb-2">Pilihan Jawaban:</h4>
                            @php
                                $labels = ['A', 'B', 'C', 'D', 'E'];
                            @endphp

                            @foreach ($labels as $label)
                                <div class="flex items-center space-x-3 p-3 border border-gray-200 rounded-md bg-white">
                                    <input type="radio" name="correct_answer" value="{{ $label }}"
                                        class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded cursor-pointer"
                                        title="Tandai sebagai jawaban benar">

                                    <span class="font-semibold text-gray-700">{{ $label }}.</span>

                                    <input type="text" name="option_{{ strtolower($label) }}" required
                                        class="flex-grow px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="Teks Pilihan {{ $label }}">

                                    <button type="button"
                                        class="text-red-500 hover:text-red-600 p-1 rounded-full hover:bg-red-50 transition"
                                        title="Hapus Pilihan Ini">
                                        <i class="fas fa-times-circle fa-lg"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Navigasi Soal -->
                <div class="w-full lg:w-1/4">
                    <h4 class="text-md font-semibold text-gray-700 mb-2">Navigasi Soal:</h4>
                    @if ($questions->isNotEmpty())
                        <div class="bg-white p-2 border rounded-lg grid grid-cols-5 md:grid-cols-6 lg:grid-cols-4 gap-3">
                            @foreach ($questions as $index => $question)
                                <button type="button"
                                    class="w-10 h-10 flex items-center justify-center border border-gray-400 rounded-md cursor-pointer hover:bg-indigo-500 hover:text-white transition">
                                    {{ $index + 1 }}
                                </button>
                            @endforeach
                        </div>
                    @else
                        <div class="text-gray-500 text-sm italic">Belum ada soal yang tersedia.</div>
                    @endif
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-between gap-2 mt-8">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <i class="fas fa-save mr-2"></i> Simpan Soal
                </button>

                <a href="/soal"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>
        </form>



    </fieldset>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
@endsection
