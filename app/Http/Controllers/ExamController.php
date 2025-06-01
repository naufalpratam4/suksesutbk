<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Exams;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function addKategori(Request $request)
    {
        $subject = new Subject([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        $subject->save();
        return redirect('/soal');
    }

    public function showUjian()
    {
        $kategori = Subject::all();
        $exams = Exams::all();
        return view('dashboard.ujian.ujian', compact('kategori', 'exams'));
    }

    public function addUjian(Request $request)
    {
        $ujian = new Exams();
        $ujian->subject_id = $request->subject_id;
        $ujian->teacher_id = Auth::id(); // Asumsi yang login adalah guru
        $ujian->title = $request->title;
        $ujian->description = $request->description;
        $ujian->duration = $request->duration;
        $ujian->save();
        return redirect()->back();
    }

    public function showSoal($id)
    {
        // Ambil ujian berdasarkan ID
        $exam = Exams::findOrFail($id);
        $questions = Question::where('exam_id', $exam->id)->get();
        $soal = Question::where('exam_id', $exam->id)->first();

        return view('dashboard.ujian.soal', compact('exam', 'questions', 'soal'));
    }
    public function showEditSoal($id){
         // Ambil ujian berdasarkan ID
        $exam = Exams::findOrFail($id);
        $questions = Question::where('exam_id', $exam->id)->get();
        $soal = Question::where('exam_id', $exam->id)->first();

        return view('dashboard.ujian.addSoal', compact('exam', 'questions', 'soal'));
    }
    
    public function editSoal(Request $request, $id)
    {
        // Ambil ujian berdasarkan ID
        $exam = Exams::findOrFail($id);

        // Buat soal baru
        $question = new Question();
        $question->exam_id = $exam->id;
        $question->question_text = $request->question_text;
        $question->teacher_id = Auth::id();
        // Ambil semua pilihan jawaban dari request
        $choices = $request->input('choices', []);

        $question->option_a = $choices[0] ?? null;
        $question->option_b = $choices[1] ?? null;
        $question->option_c = $choices[2] ?? null;
        $question->option_d = $choices[3] ?? null;
        $question->option_e = $choices[4] ?? null;

        // Ambil jawaban benar
        $index = $request->input('correct_choice');
        $correctAnswers = ['A', 'B', 'C', 'D', 'E'];
        $question->correct_answer = $correctAnswers[$index] ?? null;

        // Simpan ke database
        $question->save();

        return redirect()->back()->with('success', 'Soal berhasil ditambahkan!');
    }

}
