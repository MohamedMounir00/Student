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

class CoursesController extends Controller
{
    //
 public function __construct()
    {
        $this->middleware('web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMangeCouress()
    {


    			$program = Program::all();
    			$academic=Academic::orderBy('academic_id','DESC')->get();
    			 $shift=Shift::all();
    			// $level=Level::all();
    			 $time=Time::all();
    			 $batche=Batche::all();
    			 $group=Group::all();



            return view('courses.mangecourses',compact('program','academic','shift','group','batche','time'));

            }


public function postInsertAcadmic(Request $request)
    {
       if ($request->ajax()) {
           return response(Academic::create($request->all()));
       }
    }



public function postInsertProgram(Request $request)
    {
       if ($request->ajax()) {
           return response(Program::create($request->all()));
       }
    }

    public function postInsertLevel(Request $request)
    {
       if ($request->ajax()) {
           return response(Level::create($request->all()));
       }
    }

    public function showLevel(Request $request)
    {
    	  if ($request->ajax()) {
           return response(Level::where('program_id',$request->program_id)->get());
       }
    }
public function postInsertshift(Request $request)
    {
       if ($request->ajax()) {
           return response(Shift::create($request->all()));
       }
    }



    public function postInserttime(Request $request)
    {
    	if($request->ajax())
    	{
    		return response(Time::create($request->all()));
    	}
    }

     public function postInsertbatche(Request $request)
    {
    	if($request->ajax())
    	{
    		return response(Batche::create($request->all()));
    	}
    }

     public function postInsertgroup(Request $request)
    {
    	if($request->ajax())
    	{
    		return response(Group::create($request->all()));
    	}
    }

      public function createclasses(Request $request)
    {
    	if($request->ajax())
    	{
    		return response(Classe::create($request->all()));
    	}
    }

    public function showClassInformation(Request $request){
   //$filter = $request->academic_id=="" && $request->program_id=="";
     //  $filter =  ['programs.program_id'=>$request->program_id];
//dd($filter);
     if ($request->academic_id!="" && $request->program_id=="") 
     {
            $filter = ['academics.academic_id'=>$request->academic_id];
  }
//dd($filter);
      if (
          $request->academic_id!="" &&
           $request->program_id!="" &&
       $request->level_id!="" &&
          $request->shift_id!="" &&
           $request->time_id!="" &&
         $request->batche_id!="" &&
           $request->group_id!="" 
         ) 
       {
         $filter = [
         'academics.academic_id'=>$request->academic_id,
          'programs.program_id'=>$request->program_id,
           'shifts.shift_id'=>$request->shift_id,
           'levels.level_id'=>$request->level_id,
          'times.time_id'=>$request->time_id,
            'groups.group_id'=>$request->group_id,
           'batches.batche_id'=>$request->batche_id

        ];        }

    	$classes = $this->classInformation($filter)->get();
      //dd($filter);
    	return view('classes.classeInfo',compact('classes'));

    }
    public function  classInformation($filter)
    {
    	return Classe::
    	join('academics','academics.academic_id','=','classes.academic_id')
    	    	->join('levels','levels.level_id','=','classes.level_id')

    	->join('programs','programs.program_id','=','levels.program_id')
    	->join('shifts','shifts.shift_id','=','classes.shift_id')
    	->join('times','times.time_id','=','classes.time_id')
    	->join('batches','batches.batche_id','=','classes.batche_id')
    	->join('groups','groups.group_id','=','classes.group_id')
         ->where($filter)
    	->orderBy('classes.classe_id','DESC');

    }

    public function deletClass(Request $request)
    {

    	if ($request->ajax()) {
    		Classe::destroy($request->classe_id);
    	}
    }

    public function editeClass(Request $request){

    	if ($request->ajax()) {
    			
    			return response(Classe::find($request->classe_id));
    			    	}
    }


    public function updateClass(Request $request){

    	if ($request->ajax()) {
    			
    			return response(Classe::updateOrCreate(['classe_id'=>$request->classe_id],$request->all()));
    			    	}
    }
}

