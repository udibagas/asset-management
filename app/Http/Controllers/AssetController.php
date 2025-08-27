<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $locations = Location::all();

        $assets = Asset::with(['category', 'location'])
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'ilike', "%$search%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'ilike', "%$search%");
                    })
                    ->orWhereHas('location', function ($q) use ($search) {
                        $q->where('name', 'ilike', "%$search%");
                    });
            })
            ->when($request->category_id, function ($query, $value) {
                return $query->where('category_id', $value);
            })
            ->when($request->location_id, function ($query, $value) {
                return $query->where('location_id', $value);
            })
            ->paginate(10);
        return view('asset.index', compact('assets', 'categories', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $data = compact('categories', 'locations'); // ['categories' => $categories, 'locations' => $locations]
        return view('asset.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Asset::create($request->all());
        return redirect('/asset');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $categories = Category::all();
        $locations = Location::all();
        // $asset = Asset::find($id);
        $data = compact('categories', 'locations', 'asset');
        return view('asset.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Asset::find($id)->update($request->all());
        return redirect('/asset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect('/asset');
    }
}
