<?php

namespace App\Http\Controllers;

use App\Post;
use App\About;
use Newsletter;
use App\Setting;
use App\Message;
use App\Comment;
use App\Categorie;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class IndexController extends Controller
{
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

    public function setting()
    {
        return Setting::first();
    }

    public function index()
    {
        $setting = $this->setting();
        $postcategorie = Categorie::inRandomOrder()->limit(3)->get();
        $mainpost = Post::where('categorie_id', 11);
        $fourpost = Post::where('status', 'PUBLISH')->orderBy('id', 'DESC')->limit(4)->get();
        $posts = Post::where('status', 'PUBLISH')->inRandomOrder()->limit(5)->get();
        $newpost = Post::where('status', 'PUBLISH')->orderBy('id', 'DESC')->limit(8)->get();

        return view('index', get_defined_vars());
    }

    public function blog()
    {
        $setting = $this->setting();
        $posts = Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(12);
        return view('blog', get_defined_vars());
    }

    public function getPostByCategorySlug($categorie)
    {
        $setting = $this->setting();
        $categorie = Categorie::where('slug', $categorie)->first();
        $posts = $categorie->posts()->where('status', 'PUBLISH')->get();
        $fourpost = $categorie->posts()->orderBy('id', 'DESC')->limit(4)->get();
        $newpost = Post::where('status', 'PUBLISH')->orderBy('id', 'DESC')->limit(8)->get();
        return view('allPost', get_defined_vars());
    }

    public function single($category , $slug)
    {
        $setting = $this->setting();
        $newpost = Post::where('status', 'PUBLISH')->orderBy('id', 'DESC')->limit(8)->get();
        $post = Post::where('slug', $slug)->first();
        $relatedpost = Post::where('status', 'PUBLISH')->inRandomOrder()->limit(9)->get();
        $comments = $post->comments()->paginate(5);
        return view('single', get_defined_vars());
    }

    public function categories()
    {
        $setting = $this->setting();
        $postcategorie = Categorie::paginate(9);
        return view('categories', get_defined_vars());
    }

    public function blogSearch(Request $request)
    {
        $setting = $this->setting();
        $posts = Post::search($request->get('q'))->where('status', 1)->orderBy('created_at', 'DESC')->paginate(12);
        return view('blog', get_defined_vars());
    }

    public function comment(Request $request, $categorie, $slug)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'body' => 'required|min:5|max:100'
        ]);


        $post = Post::where('slug', $slug)->first();

        $request['post_id'] = $post->id;
        $request['user_id'] = \Auth::user()->id;
        Comment::create($request->all());

        return redirect()->back()->with('status', 'Terima Kasih, Anda telah berkomentar');
    }

    public function about()
    {
        $setting = $this->setting();
        $abouts = About::paginate(1);
        return view('about', get_defined_vars());
    }

    public function contact(Request $request)
    {
        $setting = $this->setting();
        return view('contact', get_defined_vars());
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ]);

        Message::create($request->all());
        return redirect()->route('kontak-kami.index')
            ->with('status', 'Terima Kasih, Pesan berhasil dikirim');
    }

    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        if(!Newsletter::subscribe($request->email))
        {
            Newsletter::subscribePending($request->email);
            return redirect()->back()
                ->with('status', 'Mohon Maaf Gagal');
        }

        return redirect()->back()
            ->with('status', 'Terima Kasih, Telah Subscribe Website kami');
    }

}
