<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->get('status');
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';

        if ($status) {
            $posts = Post::with(['user', 'categorie'])
                ->where('status')
                ->paginate(20);
        } else {
            $posts = Post::with(['user', 'categorie'])
                ->paginate(20);
        }

        $filterKeyword = $request->get('keyword');

        if ($status) {
            $posts = Post::with(['user', 'categorie'])
                ->where('title', "LIKE", "%$keyword%")
                ->where('status', strtoupper($status))
                ->paginate(20);
        } else {
            $posts = Post::with(['user', 'categorie'])
                ->where("title", "LIKE", "%$keyword%")
                ->paginate(20);
        }

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:5|unique:posts',
            'categorie_id' => 'required',
            'body' => 'required|min:20',
            'status' => 'required'
        ]);

        $post = new Post;

        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->categorie_id = $request->get('categorie_id');
        $post->status = $request->get('status');
        $post->slug = \Str::slug($request->get('title'));
        $post->user_id = \Auth::guard('admin')->user()->id;

        if ($request->hasFile('featured')) {
            $file = $request->file('featured');
            $name = $file->getClientOriginalName();
            Storage::putFileAs('public/post', $file, $name);

            $post->featured = 'storage/post/' . $name;
        }

        $post->save();

        if ($request->get('status') == 'PUBLISH') {
            return redirect()
                ->route('admin.artikel.index')
                ->with('status', 'Artikel berhasil disimpan dan dipublish');
        } else {
            return redirect()
                ->route('admin.artikel.index')
                ->with('status', 'Artikel disimpan sebagai draft');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::findOrFail($id);

        return view('admin.posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|min:5|unique:posts,title,' . $id,
            'categorie_id' => 'required',
            'body' => 'required|min:20',
            'status' => 'required'
        ]);

        $post = Post::findOrFail($id);

        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->categorie_id = $request->get('categorie_id');
        $post->status = $request->get('status');
        $post->slug = \Str::slug($request->get('title'));
        $post->user_id = \Auth::guard('admin')->user()->id;

        if ($request->hasFile('featured')) {
            if ($post->featured && file_exists(storage_path('app/public/' . $post->featured))) {
                \Storage::delete('public/' . $post->featured);
            }
            $file = $request->file('featured');
            $name = $file->getClientOriginalName();
            Storage::putFileAs('public/post', $file, $name);

            $post->featured = 'storage/post/' . $name;
        }

        $post->save();
        return redirect()->route('admin.artikel.index')
            ->with('status', 'Artikel berhasil diupdate');

        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('admin.artikel.index')
            ->with('status', 'Artikel berhasil dipindahkan ke trash');
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->paginate(10);

        return view('admin.posts.trash', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        if ($post->trashed()) {
            $post->restore();
        } else {
            return redirect()->route('admin.artikel.trash')
                ->with('status', 'Tidak dapat menghapus artikel aktif secara permanen');
        }

        return redirect()->route('admin.artikel.trash')
            ->with('status', 'Artikel berhasil di restore');
    }

    public function deletePermanent($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        if (!$post->trashed()) {
            return redirect()->route('admin.kategori.index')
                ->with('status', 'Artikel tidak berada di trash');
        } else {
            $post->forceDelete();

            return redirect()->route('admin.kategori.index')
                ->with('status', 'Artikel dihapus secara permanen');
        }
    }

}
