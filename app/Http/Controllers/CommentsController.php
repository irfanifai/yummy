<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::paginate(10);

        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $comments = Comment::where("name", "LIKE", "%$filterKeyword%")->paginate(10);
        }

        return view('admin.comments.index', compact('comments'));
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.comments.show', compact('comment'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('admin.komentar.index')
            ->with('status', 'Komentar Telah Dihapus!');

    }
}
