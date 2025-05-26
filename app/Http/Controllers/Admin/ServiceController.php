<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Service;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('vendor')) {
            $services = Service::with('vendor')
                ->whereHas('vendor', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->orderBy('created_at', 'desc')->get();
            // return $services;
        } else {
            $services = Service::with('vendor')->orderBy('created_at', 'desc')->get();
        }


        return view('admin.service.index', compact('services'));
    }


    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.service.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $vendor = Vendor::where('user_id', Auth::user()->id)->first();
            if (!$vendor) {
                return redirect()->back()->with('error', 'Vendor not found');
            }

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string',
                'status' => 'required',
                'price' => 'required|integer|min:1',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'description' => 'required|string',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('serviceImage'), $imageName);
                $imagePath = $imageName;
            }

            $service = Service::create([
                'name' => $validated['name'],
                'type' => $validated['type'],
                'status' => $validated['status'],
                'price' => $validated['price'],
                'vendor_id' => $vendor->id,
                'image' => $imagePath,
                'description' => $validated['description'],
            ]);

            return redirect()->route('admin.services.index')->with('success', 'Service Created Successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $exception->getMessage());
        }
    }


    public function show(string $id)
    {
        $service = Service::with('vendor')->find($id);
        if ($service->id != $id) {
            return redirect()->back()->with('error', 'Service not found');
        }
        return view('admin.service.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::with('vendor')->find($id);
        if ($service->id != $id) {
            return redirect()->back()->with('error', 'Product not found');
        }
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::where('user_id', Auth::user()->id)->first();
        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }

        $service = Service::find($id);
        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'status' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'required|string',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('serviceImage'), $imageName);
            $imagePath =  $imageName;
        }
        $service->update([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'status' => $validated['status'],
            'price' => $validated['price'],
            'image' => $imagePath,
            'description' => $validated['description'],
        ]);

        return redirect()->route('admin.services.index')->with('success', 'services Updated Successfully');
    }

    public function destroy($id)
    {
        $servuiice = Service::find($id);

        if ($servuiice) {
            $servuiice->delete();
            return redirect()->back()->with('success', 'service deleted successfully');
        }
        return redirect()->back()->with('error', 'Product not found');
    }
}
