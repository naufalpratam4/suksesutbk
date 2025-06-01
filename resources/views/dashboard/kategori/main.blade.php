@extends('template.dashboard')
@section('content')

    <body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="bg-white p-6 sm:p-8 rounded-xl shadow-2xl w-full max-w-4xl ">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Buat Kategori Ujian</h1>
            <form action="{{ route('addKategori') }}" id="examForm" class="space-y-8 mb-35" method="POST">
                @csrf
                <fieldset class="border border-gray-300 p-6 rounded-lg">
                    <legend class="text-xl font-semibold text-gray-700 px-2">Informasi Ujian</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="examTitle" class="block text-sm font-medium text-gray-700 mb-1">Kategori Ujian <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="name" id="examTitle" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Contoh: Ujian Tengah Semester Matematika">
                        </div>
                        <div>
                            <label for="examTitle" class="block text-sm font-medium text-gray-700 mb-1">Code Ujian <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="code" id="examTitle" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Contoh: Ujian Tengah Semester Matematika">
                        </div>
                    </div>
                    <div class="flex justify-end pt-6">
                        <button type="button"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-md mr-3">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-save mr-2"></i> Simpan Kategori
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
@endsection
