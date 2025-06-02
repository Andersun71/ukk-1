<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(\App\Models\Industry::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'business_field' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'website' => 'nullable|string|max:255'
        ]);
        $industries = \App\Models\Industry::create($data);

        return response()->json($industries, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $industries = \App\Models\Industry::findOrFail($id);
        return response()->json($industries);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $industries = \App\Models\Industry::findOrFail($id);
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'business_field' => 'sometimes|string|max:255',
            'contact' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|max:255',
            'address' => 'sometimes|string|max:255',
            'website' => 'sometimes|string|max:255'
        ]);
        $industries->update(($data));
        return response()->json($industries, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $industries = \App\Models\Industry::findOrFail($id);
        $industries->delete();

        return response()->json($industries, 204);
    }
}
