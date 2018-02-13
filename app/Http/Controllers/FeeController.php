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
use App\Fee;
use App\Receipt;
use App\Studentfee;
use App\Transaction;
use App\Receiptdetail;
use App\Feetype;
use DB;
class FeeController extends Controller
{


  public function getFeePayment()
  {
   return view('fee.searchPymeant');
 }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 public function student_status($studentId)
 {
   return  
   Statue::latest('statues.statue_id')
   ->join('students','students.student_id','=','statues.student_id')
   ->join('classes','classes.classe_id','=','statues.classe_id')
   ->join('academics','academics.academic_id','=','classes.academic_id')
   ->join('shifts','shifts.shift_id','=','classes.shift_id')
   ->join('times','times.time_id','=','classes.time_id')
   ->join('levels','levels.level_id','=','classes.level_id')
   ->join('groups', 'groups.group_id','=','classes.group_id')
   ->join('batches','batches.batche_id','=','classes.batche_id')
   ->join('programs','programs.program_id','=','levels.program_id')
   ->where('students.student_id',$studentId);

 }
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 public function show_school_fee($level_id)
 {
  return	Fee::join('academics','academics.academic_id','=','fees.academic_id')  	
  ->join('levels','levels.level_id','=','fees.level_id')	
  ->join('programs','programs.program_id','=','levels.program_id')	
  ->join('feetypes','feetypes.fee_type_id','=','fees.fee_type_id')
  ->where('levels.level_id',$level_id)
  ->orderBy('fees.amount','DESC');
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function read_Student_Fee($student_id)
{
  return Studentfee::join('fees','fees.fee_id','=','studentfees.fee_id')
  ->join('students','students.student_id','=','studentfees.student_id')
  ->join('levels','levels.level_id','=','studentfees.level_id')
  ->join('programs','programs.program_id','=','levels.program_id')
  ->select('levels.level_id',
    'levels.level',
    'programs.program',

    'fees.amount as school_fee',
    'students.student_id',
    'studentfees.s_fee_id',
    'studentfees.amount as student_amount',
    'studentfees.discount')  
  ->where('students.student_id',$student_id)
    ->orderBy('studentfees.s_fee_id','ASC');



}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function read_Student_Transactation($student_id){
  return Receiptdetail::join('receipts','receipts.receipt_id','=','receiptdetails.receipt_id')
  ->join('transactions','transactions.transact_id','=','receiptdetails.transact_id')
  ->join('students','students.student_id','=','receiptdetails.student_id')
  ->join('fees','fees.fee_id','=','transactions.fee_id')
  ->join('users','users.id','=','transactions.user_id')
  ->where('students.student_id',$student_id);

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function payment($viewNmae,$student_id)
{  	       

  $feetype = Feetype::all(); 
  $status = $this->student_status($student_id)->first();

  $program = Program::where('program_id',$status->program_id)->get();
  	    		//dd($program);
  $level=Level::where('program_id',$status->program_id)->get();
  $studentfee = $this->show_school_fee($status->level_id)->first();
  $receipt_id= Receiptdetail::where('student_id',$student_id)->max('receipt_id');
  $readstudentFee= $this->read_Student_Fee($student_id)->get();
  $readstudentTrans= $this->read_Student_Transactation($student_id)->get();
//dd($readstudentFee);

  return view($viewNmae,
   compact('status','program','level',
    'studentfee','receipt_id',
    'readstudentFee','readstudentTrans','feetype'))
  ->with('student_id',$student_id);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function showStudentPayment(Request $request)
{
 $student_id =$request->student_id;
 // 	dd($this->payment('fee.payment',$student_id));
 return $this->payment('fee.payment',$student_id);


}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function goPayment($student_id)
{

 return $this->payment('fee.payment',$student_id);


}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function savePayment(Request $request)
{
  $studentfee =Studentfee::create($request->all());

  $transact =Transaction::create([
    'transact_date'=>$request->transact_date,
    'fee_id'=>$request->fee_id,
    'user_id'=>$request->user_id,
    'remark'=>$request->remark,
    'description'=>$request->description,
    's_fee_id'=>$studentfee->s_fee_id,
    'paid'=>$request->paid,
    'student_id'=>$request->student_id,
  ]);



  $receipt_id =Receipt::autoNumber();

  Receiptdetail::create([
   'receipt_id'=>$receipt_id,
   'student_id'=>$request->student_id,
   'transact_id'=>$transact->transact_id

 ]);
  return back();

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function createFee(Request $request){

  if ($request->ajax()) {

    return response(Fee::create($request->all()));
  }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function pay(Request $request){

  if ($request->ajax()) {
  # code...


   $studentPay=Studentfee::join('levels','levels.level_id','=','studentfees.level_id')
   ->join('students','students.student_id','=','studentfees.student_id')
   ->join('fees','fees.fee_id','=','studentfees.fee_id')
   ->join('programs','programs.program_id','=','levels.program_id')
   ->select('levels.level_id',
    'levels.level',
    'fees.fee_id',
    'programs.program_id',
    'programs.program',
    'students.student_id',
    'studentfees.s_fee_id',
    'fees.amount as school_fee',
    'studentfees.amount as student_amount',
    'studentfees.discount')  
   ->where('studentfees.s_fee_id',$request->s_fee_id)->first();
 }
 return response($studentPay);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function exstraPay(Request $request){
  $transact = Transaction::create($request->all());
  if (count($transact)!=0) {
    $transact_id = $transact->transact_id;
    $student_id =  $transact->student_id;
    $receipt_id =Receipt::autoNumber();

    Receiptdetail::create([
     'receipt_id'=>$receipt_id,
     'student_id'=>$student_id,
     'transact_id'=>$transact_id

   ]);
  }
  return back();

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  public function printInvoice ($receipt_id)
  {

  $Invoice = Receiptdetail::join('receipts','receipts.receipt_id','=','receiptdetails.receipt_id')
  ->join('transactions','transactions.transact_id','=','receiptdetails.transact_id')
  ->join('students','students.student_id','=','receiptdetails.student_id')
  ->join('fees','fees.fee_id','=','transactions.fee_id')
  ->join('levels','levels.level_id','=','fees.level_id')
  ->join('programs','programs.program_id','=','levels.program_id')
  ->join('users','users.id','=','transactions.user_id')
  // ->join('statues','statues.student_id','=','students.student_id')

  ->select(
    'students.student_id',
    'students.first_name',
    'students.last_name',
    'students.sex',
    'fees.amount as school_fee',
    'fees.fee_id',
    'transactions.transact_date',
    'transactions.paid',
    'users.name',
    'receipts.receipt_id',
    'levels.level_id',
    'transactions.s_fee_id'
  )
 ->where('receipts.receipt_id',$receipt_id)->first();


 ////

 $status = Classe::join('levels','levels.level_id','=','classes.level_id')
   ->join('programs','programs.program_id','=','levels.program_id')
   ->join('academics','academics.academic_id','=','classes.academic_id')
   ->join('shifts','shifts.shift_id','=','classes.shift_id')
   ->join('times','times.time_id','=','classes.time_id')
        ->join('statues','statues.classe_id','=','classes.classe_id')

   ->join('groups', 'groups.group_id','=','classes.group_id')
   ->join('batches','batches.batche_id','=','classes.batche_id')
   ->where('levels.level_id',$Invoice->level_id)
      ->where('statues.student_id',$Invoice->student_id)

   ->select(DB::raw('CONCAT(programs.program,
    " / Level-",levels.level,
    " / Shift-",shifts.shift,
    " / Time-",times.time,
    " / Group-",groups.group,
    " / Batch-",batches.batche,
    " / Academic-",academics.academic,
    " / Start Date-",classes.start_date,
    " / End Date-",classes.end_date
   ) As detail'))->first();


$studentFee= Studentfee::where('s_fee_id',$Invoice->s_fee_id)->first();


   $totalPaid = Transaction::where('s_fee_id',$Invoice->s_fee_id)->sum('paid');
return view('invoice.invoice',compact('Invoice','status','totalPaid','studentFee'));
  }



public function showLevelStudent(Request $request)
{




$status = Classe::join('levels','levels.level_id','=','classes.level_id')
   ->join('programs','programs.program_id','=','levels.program_id')
   ->join('academics','academics.academic_id','=','classes.academic_id')
   ->join('shifts','shifts.shift_id','=','classes.shift_id')
   ->join('times','times.time_id','=','classes.time_id')
        ->join('statues','statues.classe_id','=','classes.classe_id')

   ->join('groups', 'groups.group_id','=','classes.group_id')
   ->join('batches','batches.batche_id','=','classes.batche_id')
   ->where('levels.level_id',$request->level_id)
      ->where('statues.student_id',$request->student_id)

   ->select(DB::raw('CONCAT(programs.program,
    " / Level-",levels.level,
    " / Shift-",shifts.shift,
    " / Time-",times.time,
    " / Group-",groups.group,
    " / Batch-",batches.batche
   ) As detail'))->first();



return response($status);

}
  public function deleteTransaction($transact_id){

    Transaction::destroy($transact_id);
    return back();
  }




  public function getFeeReport()
  {
    return view('fee.feeReport');
  }
  public function showFeeReport (Request $request)
  {
    $fees=$this->feeInfo()  ->select(
             'students.student_id',
             'students.first_name',
            'students.last_name',
            'fees.amount as school_fee',
            'transactions.paid',
            'transactions.transact_date',
            'studentfees.discount',
            'studentfees.s_fee_id'

          )
    ->whereDate('transactions.transact_date','>=',$request->from)
    ->whereDate('transactions.transact_date','<=',$request->to)
    ->orderBy('students.student_id')
    ->get();

    return view('fee.feeList',compact('fees'));
  }
  public function feeInfo(){
  return  Transaction::join('fees','fees.fee_id','=','transactions.fee_id')
                ->join('students','students.student_id','=','transactions.student_id')
                ->join('users','users.id','=','transactions.user_id')
                ->join('studentfees','studentfees.s_fee_id','=','transactions.s_fee_id');

  }
}

