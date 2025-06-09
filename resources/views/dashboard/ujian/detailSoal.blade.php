@extends('template.dashboard')
@section('content')
    <fieldset class="border border-gray-300 p-6 rounded-lg">
        <legend class="text-xl font-semibold text-gray-700 px-2">Buat Soal dari Mata Pelajaran </legend>
        {{-- Kotak nomor soal --}}
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Bagian Soal -->
                <div class="space-y-8 w-full lg:w-3/4">
                    <div class="border border-dashed border-gray-400 p-6 rounded-lg bg-gray-50 shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $detail->question_text }} </h3>
                        </div>

                        <!-- Input Teks Soal -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Unggah
                                Gambar:</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="block w-full border rounded-lg text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer" />
                        </div>

                        <!-- Pilihan Jawaban -->
                        <div class="space-y-3">
                            <h4 class="text-md font-semibold text-gray-700 mb-2">Pilihan Jawaban:</h4>
                            <div class="mb-4">

                                <p class="mb-2 text-lg font-bold">{{ $detail->question_text }}</p>

                                @if ($detail->image)
                                    <label class="block text-sm font-medium text-gray-700 pt-2 mb-1">Gambar:</label>
                                    <img src="{{ asset('storage/' . $detail->image) }}" alt="Gambar soal" class="w-1/2 mb-4">
                                @endif

                                <label class="block text-sm font-medium text-gray-700 mb-1">Pilihan Jawaban:</label>
                                <ul class="list-disc pl-5 text-sm text-gray-800 space-y-1">
                                    <li>a. {{ $detail->option_a }}</li>
                                    <li>b. {{ $detail->option_b }}</li>
                                    <li>c. {{ $detail->option_c }}</li>
                                    <li>d. {{ $detail->option_d }}</li>
                                    <li>e. {{ $detail->option_e }}</li>
                                </ul>

                                <label class="block text-sm font-medium text-gray-700 mt-3 mb-1">
                                    Jawaban Benar:
                                </label>
                                <p class="text-green-700 font-semibold">{{ strtoupper($detail->correct_answer) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigasi Soal -->
                <div class="w-full lg:w-1/4">
                      <a href="{{ route('allSoal', $exam) }}">
                        <button type="button"
                            class="bg-green-50 text-green-600 hover:text-green-700 font-medium py-2 px-3 w-full mb-2 rounded-md hover:bg-green-100 transition">
                           Lihat seluruh soal
                        </button>
                    </a>
                    <h4 class="text-md font-semibold text-gray-700 mb-2">Navigasi Soal:</h4>
                    @if ($questions->isNotEmpty())
                        <div class="bg-white p-2 border rounded-lg grid grid-cols-5 md:grid-cols-6 lg:grid-cols-4 gap-3">
                            @foreach ($navigation as $index => $soal)
                                <a href="{{ route('detailSoal', $soal->id) }}">
                                    <button type="button"
                                        class="question-number w-10 h-10 flex items-center justify-center border border-gray-400 rounded-md cursor-pointer hover:bg-indigo-500 hover:text-white transition">
                                        {{ $index + 1 }}
                                    </button>
                                </a>
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
