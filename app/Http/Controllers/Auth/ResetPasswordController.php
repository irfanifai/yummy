<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use App\Setting;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function setting()
    {
        return Setting::first();
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        $client = new Client();

        $endpoint = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1627387810.3ae9b31.4c459b0d51644c2281adcc0cfb53a851&count=12');

        $result = json_decode($endpoint->getBody()->getContents(), true);

        $photos = [];
        foreach ($result['data'] as $photo) {
            $photos[] = $photo['images']['thumbnail']['url'];
        }

        $setting = $this->setting();

        return view('auth.passwords.reset', compact('setting', 'photos'))->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
