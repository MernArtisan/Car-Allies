<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $vendors = Vendor::orderBy('id', 'desc')->get();
        return view('web.store.index', compact('vendors'));
    }

    // public function show(Vendor $vendor)
    // {
    //     return view('web.store.show', compact('vendor'));
    // }
}
