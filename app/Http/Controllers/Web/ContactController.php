<?php

namespace App\Http\Controllers\Web;

use App\Events\NewContactCreated;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\General;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $generals = General::find(1);
        return view('web.contact.index', compact('generals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        $contact = Contact::create($request->all());
        event(new NewContactCreated($contact));
        return back()->with('success', 'Thank you! Your message has been sent.');
    }
}
