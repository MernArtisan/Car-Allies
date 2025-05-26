<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::orderBy('id', 'ASC')->get();
        // return $contents;
        return view('admin.contents.index', [
            'contents' => $contents
        ]);
    }
    public function edit(string $id)
    {
        $content = Content::where('id', $id)->firstOrFail();
        // return $content;
        return view('admin.contents.edit', [
            'content' => $content
        ]);
    }
    public function update(Request $request, string $id)
    {
        $content = Content::where('id', $id)->firstOrFail();
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/contents');
                $image->move($destinationPath, $name);
                $imageNames[] = $name;
            }
            $content->images = json_encode($imageNames);
        }
        $content->update($request->except('images'));
        return redirect()->route('admin.contents.index')->with('success', 'Content Updated Successfully');
    }
}
