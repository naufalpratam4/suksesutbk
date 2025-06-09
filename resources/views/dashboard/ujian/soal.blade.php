@extends('template.dashboard')
@section('content')
    <fieldset class="border border-gray-300 p-6 rounded-lg">
        <legend class="text-xl font-semibold text-gray-700 px-2">Buat Soal dari Mata Pelajaran {{ $exam->title }} </legend>
        {{-- Kotak nomor soal --}}
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Bagian Soal -->
            <div id="questionsContainer" class="space-y-8 w-full lg:w-3/4">
                <div class="question-item border border-dashed border-gray-400 p-6 rounded-lg bg-gray-50 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{$exam->title}}
                        </h3>
                        <div>
                            <button type="button"
                                class="text-red-600 hover:text-red-700 font-medium py-2 px-3 rounded-md hover:bg-red-100 transition">
                                <i class="fas fa-trash-alt mr-1"></i> Hapus Soal
                            </button>
                            <a href="{{ route('showAddSoal', $exam) }}">
                                <button type="button"
                                    class="text-green-600 hover:text-green-700 font-medium py-2 px-3 rounded-md hover:bg-green-100 transition">
                                    <i class="fas fa-pencil-alt mr-1"></i> Tambah Soal
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="questionText1" class="block text-sm font-medium text-gray-700 mb-1">
                            Teks Soal <span class="text-red-500">*</span>
                        </label>
                        <input name="questions_text" id="questionText1" rows="3"
                            value="{{ $soal->question_text ?? '' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Masukkan teks soal di sini..."></input>
                     
                        <label for="imageUpload" class="block text-sm font-medium text-gray-700 pt-2 mb-1">Ini Gambar
                            :</label>
                        <img src="https://img.freepik.com/free-vector/blue-curve-background_53876-113112.jpg?semt=ais_items_boosted&w=740"
                            alt="">
                        <label for="questionText1" class="block text-sm font-medium text-gray-700 mb-1">
                            deskripsi <span class="text-red-500">*</span>
                        </label>
                        <div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima tenetur cum eum. Quibusdam
                            dolores quam dolor id. Veritatis et mollitia eligendi soluta, asperiores molestiae suscipit
                            ratione repudiandae, harum eius illo!
                        </div>

                           <label for="questionText1" class="block text-sm font-medium text-gray-700 mb-1">
                            Durasi : <span>{{$exam->duration}} menit</span>
                        </label>
                    </div>

                    
                </div>
            </div>

            <!-- Nomor Soal -->

            <div class="w-full lg:w-1/4">
                <h4 class="text-md font-semibold text-gray-700 mb-2">Navigasi Soal:</h4>

                @if ($questions->isNotEmpty())
                    <div id="questionNumbers"
                        class="bg-white p-2 border border-1 rounded-lg grid grid-cols-5 md:grid-cols-6 lg:grid-cols-4 gap-3">
                        @foreach ($questions as $index => $question)
                            <button type="button"
                                class="question-number w-10 h-10 flex items-center justify-center border border-gray-400 rounded-md cursor-pointer hover:bg-indigo-500 hover:text-white transition"
                                data-question-index="{{ $index }}">
                                {{ $index + 1 }}
                            </button>
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
