<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Setting;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function setting()
    {
        return Setting::first();
    }

    protected function apiInstagram()
    {
        // $client = new Client();

        // $endpoint = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1627387810.3ae9b31.4c459b0d51644c2281adcc0cfb53a851&count=12');

        // $result = json_decode($endpoint->getBody()->getContents(), true);

        // $photos = [];
        // foreach ($result['data'] as $photo) {
        //     $photos[] = $photo['images']['thumbnail']['url'];
        // }

        // $this->apiInstagram();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $setting = $this->setting();
        $user = Auth::user();
        return view('user.home', compact('setting', 'user'));
    }

    public function editprofile($id)
    {
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // return $request->all();
        $user = \Auth::user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password = $request->get('password');
        $user->password = \Hash::make($password);
        // $user->name = \Request::input('name');
        // $user->email = \Request::input('email');

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

        return redirect()->route('home')
            ->with('status', 'Data berhasil diperbarui');
    }
}
