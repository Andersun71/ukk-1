<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = \App\Models\Student::all();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'photo' => 'required|string|max:255',
            'nis' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'internship_status' => 'in:0,1,2',
        ]);
        $students = \App\Models\Student::create($data);
        return response()->json($students);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = \App\Models\Student::findOrFail($id);
        return response()->json($students);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $students = \App\Models\Student::findOrFail($id);
        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'photo' => 'sometimes|string|max:255',
            'nis' => 'sometimes|string|max:255',
            'gender' => 'sometimes|in:male,female',
            'address' => 'sometimes|string|max:255',
            'contact' => 'sometimes|string|max:255',
            'internship_status' => 'sometimes|in:0,1,2',
        ]);

        $students->update($data);

        return response()->json($students);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = \App\Models\Student::findOrFail($id);
        $students->delete();

        return response()->json($students, 204);
    }
}
