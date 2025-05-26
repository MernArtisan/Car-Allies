<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $general = General::findOrFail(1);
        return view('admin.general.index', compact('general'));
    }
    public function update(Request $request, $id)
    { 
        $validated = $request->validate([
            'email'         => 'nullable|email',
            'office_email'  => 'nullable|email',
            'phone'         => 'nullable|string|max:20',
            'office_phone'  => 'nullable|string|max:20',
            'address'       => 'nullable|string|max:255',
            'location'      => 'nullable|string|max:255',
            'lat'           => 'nullable|numeric',
            'long'          => 'nullable|numeric',
            'facebook'      => 'nullable|url',
            'instagram'     => 'nullable|url',
            'linkedin'      => 'nullable|url',
            'twitter'       => 'nullable|url',
            'copyright'     => 'nullable|string|max:255',
        ]);
 
        $general = General::findOrFail($id);
 
        $general->update($validated);
 
        return redirect()->back()->with('success', 'General settings updated successfully!');
    }
}
