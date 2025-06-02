<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = \App\Models\Teacher::all();

        return response()->json($teachers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nip' => 'required|string',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'contact' => 'required|string',

        ]);
        $teachers = \App\Models\Teacher::create($data);
        return response()->json($teachers, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teachers = \App\Models\Teacher::findOrFail($id);

        return response()->json($teachers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teachers = \App\Models\Teacher::findOrFail($id);
        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'nip' => 'sometimes|string',
            'gender' => 'sometimes|in:male,female',
            'address' => 'sometimes|string',
            'contact' => 'sometimes|string',

        ]);
        $teachers->update($data);
        return response()->json($teachers);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teachers = \App\Models\Teacher::findOrFail($id);

        $teachers->delete();

        return response()->json($teachers, 204);
    }
}
