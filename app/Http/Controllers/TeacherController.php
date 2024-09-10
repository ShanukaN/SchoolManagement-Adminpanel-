<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacherData = [
            'first_name' => $request->FName,
            'last_name' => $request->LName,
            'DOB' => $request->DOB,
            'age' => $request->age,
            'gender' => $request->gender,
            'grade' => $request->grade,
            'subject' => $request->subject,
            'address' => $request->address,
        ];

        Teacher::create($teacherData);

        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $teachers = Teacher::all();

        $response = '';

        if ($teachers->count() > 0) {
            $response .= "<table id='myTable'' class='display'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>DOB</th>
                        <th>Grade</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";

            foreach ($teachers as $teacher) {
                $response .=
                    "<tr>
                        <td>" . $teacher->id . "</td>
                        <td>" . $teacher->first_name . "</td>
                        <td>" . $teacher->last_name . "</td>
                        <td>" . $teacher->DOB . "</td>
                        <td>" . $teacher->grade . "</td>
                        <td>" . $teacher->subject . "</td>
                        <td><a href='#' id='" . $teacher->id . "' class='editTeacherBtn' data-toggle='modal' data-target='#editTeacherModal'> Edit </a> | Delete</td>
                    </tr>";
            }

            $response .=
                "</tbody>
            </table>";

            echo $response;
        } else {
            echo "No Record";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $teacherId = $request->id;

        $teacher = Teacher::find($teacherId);
        return response()->json($teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
    
        $teacher = Teacher::find($request->teacher_id);
        // return response()->json($teacher);

        $teacherData = [
            'first_name' => $request->FName,
            'last_name' => $request->LName,
            'DOB' => $request->DOB,
            'age' => $request->age,
            'gender' => $request->gender,
            'grade' => $request->grade,
            'subject' => $request->subject,
            'address' => $request->address,
        ];

        $teacher->update($teacherData);
        
        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
