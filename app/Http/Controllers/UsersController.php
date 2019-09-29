<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(20);

        $status = $request->get('status');
        if ($status) {
            $users = User::where('status', strtoupper($status))->paginate(20);
        } else {
            $users = User::paginate(20);
        }

        $filterKeyword = $request->get('nameuser');
        if ($filterKeyword) {
            $users = User::where('name', 'LIKE', "%$filterKeyword%")->paginate(20);
        }

        if ($filterKeyword) {
            if ($status) {
                $users = User::where('name', 'LIKE', "%$filterKeyword%")
                    ->where('status', strtoupper($status))
                    ->paginate(20);
            } else {
                $users = User::where('name', 'LIKE', "%$filterKeyword%")
                    ->paginate(20);
            }
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
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

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->status = $request->get('status');

        if ($request->file('avatar')) {
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                \Storage::delete('public/' . $user->avatar);
            }
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            Storage::putFileAs('public/user', $file, $name);

            $user->avatar = 'storage/user/' . $name;
        }

        $user->save();
        return redirect()->route('admin.user.index')
            ->with('status', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.user.index')
            ->with('status', 'User berhasil dipindahkan ke trash');
    }

    public function trash()
    {
        $users = User::onlyTrashed()->paginate(20);

        return view('admin.users.trash', compact('users'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        if ($user->trashed()) {
            $user->restore();
        } else {
            return redirect()->route('admin.user.trash')
                ->with('status', 'Tidak dapat menghapus user aktif secara permanen');
        }

        return redirect()->route('admin.user.trash')
            ->with('status', 'User berhasil di restore');
    }

    public function deletePermanent($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        if (!$user->trashed()) {
            return redirect()->route('admin.user.index')
                ->with('status', 'User tidak berada di trash');
        } else {
            $user->forceDelete();

            return redirect()->route('admin.user.index')
                ->with('status', 'User dihapus secara permanen');
        }
    }
}
