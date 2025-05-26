<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('web.about.index');
    }

    public function privacy()
    {
        $content = Content::where('name', 'Privacy Policy Users')->first();
        return view('web.terms.privacy', compact('content'));
    }


    public function terms()
    {
        $content = Content::where('name', 'Terms & Condition Users')->first();
        return view('web.terms.terms', compact('content'));
    }
}
