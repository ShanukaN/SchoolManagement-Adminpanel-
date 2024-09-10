<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }


    public function index()
    {
        $response['show_data'] = $this->student->all();
        return view('student.index')->with($response);
    }


    public function register()
    {
        return view('student.register');
    }


    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->student->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function view($user_id)
    {
        $response['show_view_data'] = $this->student->find($user_id);
        return view('student.view')->with($response);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        // $response['show_edit_data'] = Student::find($user_id);
        $response['show_edit_data'] = $this->student->find($user_id);
        return view('student.edit')->with($response);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {

        $student = $this->student->find($user_id);

        $student->update(array_merge($student->toArray(), $request->toArray()));
        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {

        $student = $this->student->find($user_id);
        $student->delete();
        return redirect()->back();
    }
}
