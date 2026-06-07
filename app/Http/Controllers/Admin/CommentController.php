<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Tampilkan list komentar di admin panel.
     */
    public function index()
    {
        $comments = Comment::latest()->paginate(10);
        return view('admin.comment.index', compact('comments'));
    }

    /**
     * Hapus komentar tertentu dari database.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.comment.index')->with('success', 'Komentar berhasil dihapus.');
    }
}
