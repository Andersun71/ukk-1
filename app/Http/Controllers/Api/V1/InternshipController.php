<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(\App\Models\Internship::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'industry_id' => 'required|exists:industries,id',
            'teacher_id' => 'required|exists:teachers,id',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);
        $internships = \App\Models\Internship::create($data);
        return response()->json($internships, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $internships = \App\Models\Internship::findOrFail($id);
        return response()->json($internships);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $internships = \App\Models\Internship::findOrFail($id);
        $data = $request->validate([
            'student_id' => 'sometimes|integer',
            'industry_id' => 'sometimes|integer',
            'teacher_id' => 'sometimes|integer',
            'start' => 'sometimes|date',
            'end' => 'sometimes|date|after_or_equal:start',
        ]);
        $internships->update($data);
        return response()->json($internships);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $internships = \App\Models\Internship::findOrFail($id);
        $internships->delete();

        return response()->json($internships, 204);
    }
}
