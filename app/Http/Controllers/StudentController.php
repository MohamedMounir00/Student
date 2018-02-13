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
use App\FileUpload;
use File;
use Storage;
use DB;
class StudentController extends Controller
{
    
		public function getRegisterationStudent(){


    			$program = Program::all();
    			$academic=Academic::orderBy('academic_id','DESC')->get();
    			 $shift=Shift::all();
    			// $level=Level::orderBy('level_id','DESC')->get();
    			 $time=Time::all();
    			 $batche=Batche::all();
    			 $group=Group::all();
    			 $student_id =Student::max('student_id');



			return view('student.studentRegister',compact('program','academic','shift','group','batche','time','level','student_id'));
		}


		public function postRegisterationStudent(Request $request)
		{
		
				$st =new Student;
				$st->first_name=$request->first_name;
				$st->last_name=$request->last_name;
				$st->sex=$request->sex;
				$st->dob=$request->dob;
				$st->rac=$request->rec;
				$st->email=$request->email;
				$st->rac=$request->rac;
				$st->status=$request->status;
				$st->nationality=$request->nationality;
				$st->nationnal_card=$request->nationnal_card;
				$st->passport=$request->passport;
				$st->phone=$request->phone;
				$st->village=$request->village;
				$st->commune=$request->commune;
				$st->district=$request->district;
				$st->province=$request->province;
				$st->current_address=$request->current_address;
				$st->dateregistred=$request->dateregistred;
				$st->photo=FileUpload::photo($request,'photo');
				$st->user_id=$request->user_id;
				if ($st->save()) {
					$student_id = $st->student_id;
					Statue::insert(['student_id'=>$student_id,'classe_id'=>$request->classe_id]);
					return redirect()->route('goPayment',['student_id'=>$student_id]);
				}
					}


public function studentInfo(Request $request)
{
	if ($request->has('search')) {

			$students = Student::where('student_id',$request->search)
			->Orwhere('first_name',"LIKE","%".$request->search."%")
			->Orwhere('last_name',"LIKE","%".$request->search."%")
			->select(DB::raw('student_id,
				first_name,
				last_name,
				CONCAT(
				first_name," ",last_name) AS full_name,
				(CASE WHEN Sex=0 THEN "M" ELSE "F" END) AS Sex ,dob'))
			->paginate(10);

	}
	else{
		$students = Student::select(DB::raw('student_id,
			first_name,
			last_name,
			CONCAT(
				first_name," ",last_name) AS full_name,
				(CASE WHEN Sex=0 THEN "M" ELSE "F" END) AS Sex ,dob'))
		->paginate(10)->appends('search',$request->search);

	}
	return view('student.studentList',compact('students'));
}


    }


