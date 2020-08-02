<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use Auth;

class LinkController extends Controller
{

    public function index()
    {
        $links = Auth::user()->links()
            ->with('visits')
            ->withCount('visits')
            ->get();

        return view('links.index', [
            'links' => $links
        ]);
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {

    }

    public function edit(Link $link)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(404);
        }

        return view('links.edit', [
            'link' => $link
        ]);
    }

    public function update(Link $link, Request $request)
    {

    }

    public function destroy(Link $link, Request $request)
    {

    }

}
