<?php

namespace App\Http\Controllers;

use App\Models\UrlInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class MainController extends Controller
{
    //
    public function index()
    {
        return view('main_page');
    }

    public function urlRetrieve($key)
    {
        $result = UrlInfo::where("short-key", $key)->pluck('url')->first();

        if (!$result)
            return redirect()->to('/');
        else
            return redirect()->away($result);

    }

    public function getShortUrl(Request $request)
    {
        $url = $request->input('url');

        $url_hash = hash("md5", $url);
        $result = UrlInfo::where('hash', $url_hash)->first();

        if($result)
            return response()->json($result);

        do
        {
            $key = Str::random(5);
        }while (UrlInfo::where('short-key', $key)->first() != null);

        $result = UrlInfo::create([
            'url' => $url,
            'hash' => $url_hash,
            'short-key' => $key,
        ]);

        return response()->json($result);
    }
}
