<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $customers = $tag->customers()->where('user_id', Auth::id())->get();
        return view('tag.index', compact('tag', 'customers'));
    }
}
