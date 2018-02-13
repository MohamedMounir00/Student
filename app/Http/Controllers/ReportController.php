<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Program;
use App\Level;
use App\Shift;
use App\Time;
use App\Batche;
use App\Group;
use App\Classe;
use App\Student;
use App\Statue;
use DB;
use Charts;
use App\User;


class ReportController extends Controller
{
    
	public function getStudentLists(){

    			$program = Program::all();
    			$academic=Academic::orderBy('academic_id','DESC')->get();
    			 $shift=Shift::all();
    			// $level=Level::orderBy('level_id','DESC')->get();
    			 $time=Time::all();
    			 $batche=Batche::all();
    			 $group=Group::all();
    			return view('report.studentList',compact('program','academic','shift','group','batche','time'));

	}

	public function getstudentInfo(Request $request)
	{
		$classes = $this->info()
		->select(DB::raw('students.student_id,
   	CONCAT(students.first_name," ",students.last_name)as name,(CASE WHEN students.sex=0 THEN "Male"  ELSE "Female" END)as sex ,students.dob,
   		CONCAT(programs.program," / ",levels.level," / ",shifts.shift," / ",times.time," start- (",classes.start_date,"/",classes.end_date,")")as program'))
   ->where('classes.classe_id',$request->classe_id)
   ->get();
		return view('report.studentInfo',compact('classes'));
	}

	public function info ()
	{

		
  return   Statue::
   join('students','students.student_id','=','statues.student_id')
   ->join('classes','classes.classe_id','=','statues.classe_id')
   ->join('academics','academics.academic_id','=','classes.academic_id')
   ->join('shifts','shifts.shift_id','=','classes.shift_id')
   ->join('times','times.time_id','=','classes.time_id')
   ->join('levels','levels.level_id','=','classes.level_id')
   ->join('groups', 'groups.group_id','=','classes.group_id')
   ->join('batches','batches.batche_id','=','classes.batche_id')
   ->join('programs','programs.program_id','=','levels.program_id');
   
	}


public function getStudentListsMulitiClass(){


		$program = Program::all();
    			$academic=Academic::orderBy('academic_id','DESC')->get();
    			 $shift=Shift::all();
    			// $level=Level::orderBy('level_id','DESC')->get();
    			 $time=Time::all();
    			 $batche=Batche::all();
    			 $group=Group::all();
    			return view('report.studentListsMulitiClass',compact('program','academic','shift','group','batche','time'));
    }

    public function showStudentMultiClass(Request $request){
    	if ($request->ajax()) {
    if (!empty($request['chk'])) {

           $classes = $this->info()
		->select(DB::raw('students.student_id,
   	         CONCAT(students.first_name," ",students.last_name)as name,(CASE WHEN students.sex=0 THEN "Male"  ELSE "Female" END)as sex ,
   	                students.dob,
   	                programs.program,
   	                levels.level,
   	                shifts.shift,
   	                times.time,
   	                batches.batche,
   	                groups.group
   	                '))->whereIn('classes.classe_id',$request['chk'])
   ->get();
    		return view('report.studentInfoMulitClass',compact('classes'));
    		//response($request->all());
    	}
    }}



public function NewStudentRegister(){

  $student = Student::where(DB::raw("(DATE_FORMAT(dateregistred,'%Y'))"),date('Y'))->select('dateregistred AS created_at')->get();

        $chart = Charts::database($student, 'bar', 'highcharts')

            ->title("Monthly new Register Student")

            ->elementLabel("Total Student")

            ->dimensions(1000, 500)

            ->responsive(false)

            ->groupByMonth(date('Y'), true);
  return view('report.newStudentRegister',compact('chart'));

}
}
