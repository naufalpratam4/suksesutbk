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

        return view('dashboard.ujian.soal', compact('exam', 'questions', 'soal', ));
    }
    public function allSoal($id){
        $exam = Exams::findOrFail($id);
        $navigation = Question::where('exam_id', $exam->id)->get();
        $soal = Question::where('exam_id', $exam->id)->first();
        $seluruhSoal = Question::all();
        return view('dashboard.ujian.allSoal', compact('exam', 'navigation', 'soal', 'seluruhSoal' ));
    }
    public function detailSoal($id)
    {
        // Ambil satu soal berdasarkan ID
        $detail = Question::findOrFail($id);

        // Ambil data ujian dari soal tersebut
        $exam = Exams::findOrFail($detail->exam_id);

        // Ambil semua soal dari ujian yang sama
        $questions = Question::where('exam_id', $exam->id)->get();
        $navigation = Question::where('exam_id', $exam->id)->get();
        return view('dashboard.ujian.detailSoal', compact('detail', 'questions', 'exam', 'navigation'));
    }

    public function showEditSoal($id){
         // Ambil ujian berdasarkan ID
        $exam = Exams::findOrFail($id);
        $questions = Question::where('exam_id', $exam->id)->get();
        $soal = Question::where('exam_id', $exam->id)->first();
$navigation = Question::where('exam_id', $exam->id)->get();
        return view('dashboard.ujian.addSoal', compact('exam', 'questions', 'soal', 'navigation'));
    }
    
    public function addSoal(Request $request, $id)
    {
        // Ambil ujian
        $exam = Exams::findOrFail($id);

        // Buat objek soal baru
        $question = new Question();
        $question->exam_id = $exam->id;
        $question->teacher_id = Auth::id();
        $question->question_text = $request->question_text;

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('soal_images', 'public');
            $question->image = $imagePath;
        }

        // Set pilihan jawaban dan jawaban benar
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
        $question->option_e = $request->option_e;
        $question->correct_answer = $request->correct_answer;

        // Simpan ke DB
        $question->save();

        return redirect()->back()->with('success', 'Soal berhasil ditambahkan!');
    }

}
