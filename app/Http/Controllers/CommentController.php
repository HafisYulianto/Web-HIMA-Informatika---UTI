<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Menyimpan komentar baru dari pengunjung website.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'bintang' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:1000',
        ]);

        Comment::create([
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'bintang' => $request->bintang,
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar/testimoni Anda berhasil dikirim!');
    }
}
