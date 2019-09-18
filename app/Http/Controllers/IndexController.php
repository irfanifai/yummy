<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categorie;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class IndexController extends Controller
{
    public function index()
    {
        $client = new Client();

        $endpoint = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1627387810.3ae9b31.4c459b0d51644c2281adcc0cfb53a851&count=12');

        $result = json_decode($endpoint->getBody()->getContents(), true);

        $photos = [];
        foreach ($result['data'] as $photo) {
            $photos[] = $photo['images']['thumbnail']['url'];
        }


        $postcategorie = Categorie::paginate(3);
        $mainpost = Post::where('categorie_id', 11);
        $fourpost = Post::where('status', 'PUBLISH')->orderBy('id', 'DESC')->limit(4)->get();
        $posts = Post::where('status', 'PUBLISH')->inRandomOrder()->limit(4)->get();
        $newpost = Post::where('status', 'PUBLISH')->orderBy('id', 'ASC')->limit(8)->get();
        return view('index', compact('posts', 'mainpost', 'fourpost', 'postcategorie', 'newpost', 'photos'));
    }
}
