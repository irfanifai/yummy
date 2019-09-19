<?php

namespace App\Http\Controllers;

use App\Post;
use App\About;
use App\Setting;
use App\Message;
use App\Categorie;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class IndexController extends Controller
{
    public function setting()
    {
        return Setting::first();
    }

    public function index()
    {
        $client = new Client();

        $endpoint = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1627387810.3ae9b31.4c459b0d51644c2281adcc0cfb53a851&count=12');

        $result = json_decode($endpoint->getBody()->getContents(), true);

        $photos = [];
        foreach ($result['data'] as $photo) {
            $photos[] = $photo['images']['thumbnail']['url'];
        }

        $setting = $this->setting();
        $postcategorie = Categorie::paginate(3);
        $mainpost = Post::where('categorie_id', 11);
        $fourpost = Post::where('status', 'PUBLISH')->orderBy('id', 'DESC')->limit(4)->get();
        $posts = Post::where('status', 'PUBLISH')->inRandomOrder()->limit(5)->get();
        $newpost = Post::where('status', 'PUBLISH')->orderBy('id', 'ASC')->limit(8)->get();
        return view('index', compact('posts', 'mainpost', 'fourpost', 'postcategorie', 'newpost', 'photos', 'setting'));
    }

    public function blog()
    {
        $client = new Client();

        $endpoint = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1627387810.3ae9b31.4c459b0d51644c2281adcc0cfb53a851&count=12');

        $result = json_decode($endpoint->getBody()->getContents(), true);

        $photos = [];
        foreach ($result['data'] as $photo) {
            $photos[] = $photo['images']['thumbnail']['url'];
        }

        $setting = $this->setting();
        $posts = Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(9);
        return view('blog', compact('setting', 'posts', 'photos', 'posts'));
    }

    public function single($slug)
    {
        $client = new Client();

        $endpoint = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1627387810.3ae9b31.4c459b0d51644c2281adcc0cfb53a851&count=12');

        $result = json_decode($endpoint->getBody()->getContents(), true);

        $photos = [];
        foreach ($result['data'] as $photo) {
            $photos[] = $photo['images']['thumbnail']['url'];
        }

        $setting = $this->setting();
        $newpost = Post::where('status', 'PUBLISH')->orderBy('id', 'ASC')->limit(8)->get();
        $post = Post::where('slug', $slug)->first();
        $relatedpost = Post::where('status', 'PUBLISH')->inRandomOrder()->limit(9)->get();
        return view('single', compact('setting',  'newpost', 'post', 'relatedpost', 'photos'));
    }

    public function categories()
    {
        $client = new Client();

        $endpoint = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1627387810.3ae9b31.4c459b0d51644c2281adcc0cfb53a851&count=12');

        $result = json_decode($endpoint->getBody()->getContents(), true);

        $photos = [];
        foreach ($result['data'] as $photo) {
            $photos[] = $photo['images']['thumbnail']['url'];
        }

        $setting = $this->setting();
        $postcategorie = Categorie::paginate(9);
        return view('categories', compact('postcategorie', 'setting', 'photos'));
    }

    public function about()
    {
        $client = new Client();

        $endpoint = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1627387810.3ae9b31.4c459b0d51644c2281adcc0cfb53a851&count=12');

        $result = json_decode($endpoint->getBody()->getContents(), true);

        $photos = [];
        foreach ($result['data'] as $photo) {
            $photos[] = $photo['images']['thumbnail']['url'];
        }

        $setting = $this->setting();
        $abouts = About::paginate(1);
        return view('about', compact('photos', 'setting', 'abouts'));
    }

    public function contact(Request $request)
    {

        $client = new Client();

        $endpoint = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1627387810.3ae9b31.4c459b0d51644c2281adcc0cfb53a851&count=12');

        $result = json_decode($endpoint->getBody()->getContents(), true);

        $photos = [];
        foreach ($result['data'] as $photo) {
            $photos[] = $photo['images']['thumbnail']['url'];
        }

        $setting = $this->setting();
        return view('contact', compact('photos', 'setting'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ]);

        Message::create($request->all());
        return redirect()->route('kontakkami.index')
            ->with('status', 'Terima Kasih, Pesan berhasil dikirim');
    }
}
