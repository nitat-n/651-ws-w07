<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VaccineRecord;
use App\Models\Faculty;
use App\Models\Program;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = DB::table('vaccine_record')
        ->join('vaccine','vaccine_record.vac_id','=','vaccine.id')
        ->join('student','vaccine_record.std_id','=','student.id')
        ->join('program','student.std_pid', '=', 'program.id')
        ->rightJoin('faculty','program.prg_fct_id','=','faculty.id')
        ->select('faculty.faculty_th',DB::raw('count(distinct vaccine_record.std_id ) as vaccined_count'))
        ->groupBy('faculty.faculty_th')
        ->get();
        return $faculties;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programs = Program::where('prg_fct_id','=',$id)
           ->get();
        $faculty = DB::table('vaccine_record')
        ->join('vaccine','vaccine_record.vac_id','=','vaccine.id')
        ->join('student','vaccine_record.std_id','=','student.id')
        ->join('program','student.std_pid', '=', 'program.id')
        ->rightJoin('faculty','program.prg_fct_id','=','faculty.id')
        ->select('faculty.faculty_th',DB::raw('count(distinct vaccine_record.std_id ) as vaccined_count'))
        ->groupBy('faculty.faculty_th')
        ->where('program.prg_fct_id','=',$id)
        ->get();
        return $faculty;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function graphFaculty(){
        $faculties = DB::table('vaccine_record')
        ->join('vaccine','vaccine_record.vac_id','=','vaccine.id')
        ->join('student','vaccine_record.std_id','=','student.id')
        ->join('program','student.std_pid', '=', 'program.id')
        ->rightJoin('faculty','program.prg_fct_id','=','faculty.id')
        ->select('faculty.faculty_th',DB::raw('count(distinct vaccine_record.std_id ) as vaccined_count'))
        ->groupBy('faculty.faculty_th')
        ->get();
        return $faculties;
    }
}
