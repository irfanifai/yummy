<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\Setting;
use GuzzleHttp\Client;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

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
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {

        $client = new Client();

        $endpoint = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1627387810.3ae9b31.4c459b0d51644c2281adcc0cfb53a851&count=12');

        $result = json_decode($endpoint->getBody()->getContents(), true);

        $photos = [];
        foreach ($result['data'] as $photo) {
            $photos[] = $photo['images']['thumbnail']['url'];
        }

        $setting = $this->setting();

        return view('auth.passwords.email', compact('setting', 'photos'));
    }
}
