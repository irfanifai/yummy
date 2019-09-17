<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Categorie::paginate(10);

        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $categories = Categorie::where("name", "LIKE", "%$filterKeyword%")->paginate(10);
        }

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|unique:categories'
        ]);

        $name = $request->get('name');

        $categorie = new Categorie;
        $categorie->name = $name;
        $categorie->slug = str_slug($name, '-');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            Storage::putFileAs('public/categories', $file, $name);

            $categorie->image = 'storage/categories/' . $name;
        }

        $categorie->save();
        return redirect()->route('kategori.index')
            ->with('status', 'Kategori berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorie::findOrFail($id);

        return view('admin.categories.edit', compact('categories'));
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
        $request->validate([
            'name' => 'required|string|min:3|unique:categories,name,' . $id
        ]);

        $categorie = Categorie::findOrFail($id);

        $name = $request->get('name');
        $categorie->name = $name;
        $categorie->slug = str_slug($name, '-');

        if ($request->file('image')) {
            if ($categorie->image && file_exists(storage_path('app/public/' . $categorie->image))) {
                \Storage::delete('public/' . $categorie->image);
            }
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            Storage::putFileAs('public/categories', $file, $name);

            $categorie->image = 'storage/categories/' . $name;
        }

        $categorie->save();
        return redirect()->route('kategori.index')
            ->with('status', 'Kategori berhasil berhasil diupdate');

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
        $categorie = Categorie::findOrFail($id);

        $categorie->delete();

        return redirect()->route('kategori.index')
            ->with('status', 'Kategori berhasil dipindahkan ke trash');
    }

    public function trash()
    {
        $categories = Categorie::onlyTrashed()->paginate(10);

        return view('admin.categories.trash', compact('categories'));
    }

    public function restore($id)
    {
        $categorie = Categorie::withTrashed()->findOrFail($id);

        if ($categorie->trashed()) {
            $categorie->restore();
        } else {
            return redirect()->route('kategori.trash')
                ->with('status', 'Tidak dapat menghapus kategori aktif secara permanen');
        }

        return redirect()->route('kategori.index')
            ->with('status', 'Kategori berhasil di restore');
    }

    public function deletePermanent($id)
    {
        $categorie = Categorie::withTrashed()->findOrFail($id);

        if (!$categorie->trashed()) {
            return redirect()->route('kategori.index')
                ->with('status', 'Kategori tidak berada di trash');
        } else {
            $categorie->forceDelete();

            return redirect()->route('kategori.index')
                ->with('status', 'Kategori dihapus secara permanen');
        }
    }
}
