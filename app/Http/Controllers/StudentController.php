<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentsResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudentsResource::collection(Student::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Student();
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->phone = $request->phone;

        $data->save();

        return new StudentsResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        // Very Basic method (Not recommended)
        // return $student;

        // Recommended Step 00
        // return response()->json([
        //     'status' => 200,
        //     'data' => $student
        // ]);

        // Another Recommended Step 01
        // return response()->json([
        //     'status' => 200,
        //     'data' => [
        //         'id' => $student->id,
        //         'type' => 'Student',
        //         'attributes' => [
        //             'name' => $student->name,
        //             'created_at' => $student->created_at,
        //             'updated_at' => $student->updated_at
        //         ]
        //     ]
        // ]);

        return new StudentsResource($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = Student::find($student->id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->phone = $request->phone;

        $data->update();

        return new StudentsResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            'status' => '204',
            'message' => 'Student has been deleted'
        ]);
    }
}
