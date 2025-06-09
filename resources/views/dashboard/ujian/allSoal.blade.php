@extends('template.dashboard')
@section('content')
    <fieldset class="border border-gray-300 p-6 rounded-lg">
        <legend class="text-xl font-semibold text-gray-700 px-2">Buat Soal dari Mata Pelajaran {{ $exam->title }} </legend>
        {{-- Kotak nomor soal --}}
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Bagian Soal -->
            <div id="questionsContainer" class="space-y-8 w-full lg:w-3/4">
                @foreach ($navigation as $soal)
                    <div class="question-item border border-dashed border-gray-400 p-6 rounded-lg bg-gray-50 shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $exam->title }} - Soal {{ $loop->iteration }}
                            </h3>
                            <div>

                                <button type="submit"
                                    class="text-red-600 hover:text-red-700 font-medium py-2 px-3 rounded-md hover:bg-red-100 transition">
                                    <i class="fas fa-trash-alt mr-1"></i> Hapus Soal
                                </button>

                                <a href="{{ route('detailSoal', $soal->id) }}">
                                    <button type="button"
                                        class="text-yellow-600 hover:text-yellow-700 font-medium py-2 px-3 rounded-md hover:bg-yellow-100 transition">
                                        <i class="fas fa-pencil-alt mr-1"></i> Edit Soal
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="mb-4">

                            <p class="mb-2 text-lg font-bold">{{ $soal->question_text }}</p>

                            @if ($soal->image)
                                <label class="block text-sm font-medium text-gray-700 pt-2 mb-1">Gambar:</label>
                                <img src="{{ asset('storage/' . $soal->image) }}" alt="Gambar soal" class="w-1/2 mb-4">
                            @endif

                            <label class="block text-sm font-medium text-gray-700 mb-1">Pilihan Jawaban:</label>
                            <ul class="list-disc pl-5 text-sm text-gray-800 space-y-1">
                                <li>a. {{ $soal->option_a }}</li>
                                <li>b. {{ $soal->option_b }}</li>
                                <li>c. {{ $soal->option_c }}</li>
                                <li>d. {{ $soal->option_d }}</li>
                                <li>e. {{ $soal->option_e }}</li>
                            </ul>

                            <label class="block text-sm font-medium text-gray-700 mt-3 mb-1">
                                Jawaban Benar:
                            </label>
                            <p class="text-green-700 font-semibold">{{ strtoupper($soal->correct_answer) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Nomor Soal -->

            <div class="w-full lg:w-1/4">
                <h4 class="text-md font-semibold text-gray-700 mb-2">Navigasi Soal:</h4>

                @if ($navigation->isNotEmpty())
                    <div id="questionNumbers"
                        class="bg-white p-2 border border-1 rounded-lg grid grid-cols-5 md:grid-cols-6 lg:grid-cols-4 gap-3">
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



        <div class="flex justify-between gap-2">
            <button type="button" id="addQuestionBtn"
                class="mt-8 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <i class="fas fa-plus mr-2"></i> Tambah Soal Pilihan Berganda
            </button>
            <button type="button" id="addQuestionBtn"
                class="mt-8 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                <i class="fas fa-plus mr-2"></i> Submit Soal
            </button>
        </div>
    </fieldset>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
@endsection
