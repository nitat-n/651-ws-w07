<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('student')
        ->join('program','student.std_pid', '=', 'program.id')
        ->join('faculty','program.prg_fct_id','=','faculty.id')
        ->select('student.*','program.program_th','faculty.faculty_th')
        ->get();
        return $students;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Student::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = DB::table('student')
        ->join('program','student.std_pid', '=', 'program.id')
        ->join('faculty','program.prg_fct_id','=','faculty.id')
        ->select('student.*','program.program_th','faculty.faculty_th')
        ->where('student.id','=',$id)
        ->get();
        return $student;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Student::destroy($id);
    }
    public function search($name)
    {
        return Student::where('name','like','%'.$name.'%')->get();
    }
}
