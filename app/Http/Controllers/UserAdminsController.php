<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserAdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = Admin::paginate(10);

        $status = $request->get('status');
        if ($status) {
            $users = Admin::where('status', strtoupper($status))->paginate(10);
        } else {
            $users = Admin::paginate(10);
        }

        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $users = Admin::where('name', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        if ($filterKeyword) {
            if ($status) {
                $users = Admin::where('name', 'LIKE', "%$filterKeyword%")
                    ->where('status', strtoupper($status))
                    ->paginate(10);
            } else {
                $users = Admin::where('name', 'LIKE', "%$filterKeyword%")
                    ->paginate(10);
            }
        }

        return view('admin.userAdmin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.userAdmin.create');
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
            "name" => "required|max:30",
            "email" => "required|email|unique:users",
            "password" => "required",
            "password_confirmation" => "required|same:password"
        ]);

        $new_user = new \App\Admin;
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->status = $request->get('status');

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            Storage::putFileAs('public/userAdmin', $file, $name);

            $new_user->avatar = 'storage/userAdmin/' . $name;
        }

        $new_user->save();
        return redirect()->route('useradmin.index')
            ->with('status', 'User Admin berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Admin::findOrFail($id);

        return view('admin.userAdmin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::findOrFail($id);

        return view('admin.userAdmin.edit', compact('user'));
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
            "name" => "required|max:30",
            "email" => "required|email",
            "status" => "required"
        ]);

        $user = Admin::findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->status = $request->get('status');

        if ($request->file('avatar')) {
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                \Storage::delete('public/' . $user->avatar);
            }
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            Storage::putFileAs('public/userAdmin', $file, $name);

            $user->avatar = 'storage/userAdmin/' . $name;
        }

        $user->save();
        return redirect()->route('useradmin.index')
            ->with('status', 'User Admin berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Admin::findOrFail($id);

        $user->delete();

        return redirect()->route('useradmin.index')
            ->with('status', 'User Admin berhasil dipindahkan ke trash');
    }

    public function trash()
    {
        $users = Admin::onlyTrashed()->paginate(10);

        return view('admin.userAdmin.trash', compact('users'));
    }

    public function restore($id)
    {
        $user = Admin::withTrashed()->findOrFail($id);

        if ($user->trashed()) {
            $user->restore();
        } else {
            return redirect()->route('useradmin.trash')
                ->with('status', 'Tidak dapat menghapus User Admin aktif secara permanen');
        }

        return redirect()->route('useradmin.trash')
            ->with('status', 'User Admin berhasil di restore');
    }

    public function deletePermanent($id)
    {
        $user = Admin::withTrashed()->findOrFail($id);

        if (!$user->trashed()) {
            return redirect()->route('useradmin.index')
                ->with('status', 'User Admin tidak berada di trash');
        } else {
            $user->forceDelete();

            return redirect()->route('useradmin.index')
                ->with('status', 'User Admin dihapus secara permanen');
        }
    }
}
