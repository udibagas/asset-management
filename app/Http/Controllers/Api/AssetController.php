<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Asset::with(['category', 'location'])
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
            ->orderBy('name')
            ->withTrashed()
            ->paginate(10);

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssetRequest $request)
    {
        return Asset::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        return $asset;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssetRequest $request, Asset $asset)
    {
        $asset->update($request->validated());
        return $asset;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();
        return response()->json(['message' => 'Asset deleted']);
    }
}
