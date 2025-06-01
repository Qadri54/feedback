<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    /**
     * Tampilkan semua data feedback
     */
    public function index()
        {
            $feedbacks = Feedback::all(); // Ambil semua data feedback
            return view('feedback', compact('feedbacks')); // Kirim ke view
        }

    /**
     * Tampilkan form untuk membuat feedback baru
     */
    public function create()
    {
        return view('create_feedback');
    }

    /**
     * Simpan data feedback baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Feedback::create($request->all());

        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil ditambahkan!');
    }

    /**
     * Tampilkan satu data feedback (opsional)
     */
    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('show_feedback', compact('feedback'));
    }

    /**
     * Tampilkan form edit feedback
     */
    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('edit_feedback', compact('feedback'));
    }

    /**
     * Update data feedback di database
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->update($request->all());

        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil diperbarui!');
    }

    /**
     * Hapus data feedback
     */
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil dihapus!');
    }
}
