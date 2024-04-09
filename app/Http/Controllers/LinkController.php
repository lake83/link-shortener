<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('index');
    }

    public function shorten(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $link = Link::create([
            'original_url' => $request->input('original_url'),
            'shortened_url' => Str::random(10),
        ]);

        return response()->json(['shortened_url' => $link->shortened_url]);
    }

    public function redirect($code): \Illuminate\Http\RedirectResponse
    {
        $link = Link::where('shortened_url', $code)->firstOrFail();
        return redirect($link->original_url);
    }
}
