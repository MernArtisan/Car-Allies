<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomebannerController extends Controller
{
    public function index()
    {
        $homeBanners = HomeBanner::orderBy('id', 'desc')->get();
        return view('admin.homebanner.index', [
            'homeBanners' => $homeBanners
        ]);
    }

    public function create()
    {
        return view('admin.homebanner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'status' => 'required',
        ]);

        try {
            $homeBanner = new HomeBanner();
            $homeBanner->title = $request->title;
            $homeBanner->description = $request->description;
            $homeBanner->status = $request->status;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/homebanners'), $imageName);

                $homeBanner->image = $imageName;
            }

            $homeBanner->save();

            return redirect()->route('admin.homebanners.index')->with('success', 'HomeBanner created successfully!');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect()->back()->withErrors(['error' => 'Something went wrong while creating the HomeBanner.']);
        }
    }

    public function show($id) {}
    // Edit Method
    public function edit($id)
    {
        $homeBanner = HomeBanner::findOrFail($id); // Fetch the banner by ID
        return view('admin.homebanner.edit', compact('homeBanner')); // Return edit view with banner data
    }

    // Update Method
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
            'status' => 'required',
        ]);

        try {
            $homeBanner = HomeBanner::findOrFail($id);

            $homeBanner->title = $request->title;
            $homeBanner->description = $request->description;
            $homeBanner->status = $request->status;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/homebanners'), $imageName);

                if ($homeBanner->image) {
                    unlink(public_path('uploads/homebanners/' . $homeBanner->image));
                }

                $homeBanner->image = $imageName;
            }

            $homeBanner->save();

            return redirect()->route('admin.homebanners.index')->with('success', 'HomeBanner updated successfully!');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect()->back()->withErrors(['error' => 'Something went wrong while updating the HomeBanner.']);
        }
    }


    public function destroy($id)
    {
        try {
            $homeBanner = HomeBanner::findOrFail($id);

            if ($homeBanner->image) {
                unlink(public_path('uploads/homebanners/' . $homeBanner->image));
            }

            $homeBanner->delete();

            return redirect()->route('admin.homebanners.index')->with('success', 'HomeBanner deleted successfully!');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect()->back()->withErrors(['error' => 'Something went wrong while deleting the HomeBanner.']);
        }
    }
}
