<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','LoginController@getLogin');
Route::post('/login','LoginController@postLogin');

Route::get('/noPermission',function(){
	return view('noPermission');
});

Route::group(['middleware'=>['authen']],function(){

Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);
Route::get('/logout','LoginController@getLogout');

});

Route::group(['middleware'=>['authen','roles'],'roles'=>['Admin']],function(){
Route::get('/mange/courese','CoursesController@getMangeCouress');
Route::post('/mange/courese/Insert-Acadmic',['as'=>'postInsertAcadmic','uses'=>'CoursesController@postInsertAcadmic']);
Route::post('/mange/courese/Insert-Program',['as'=>'postInsertProgram','uses'=>'CoursesController@postInsertProgram']);
Route::post('/mange/courese/Insert-Level',['as'=>'postInsertLevel','uses'=>'CoursesController@postInsertLevel']);
Route::get('/mange/courese/showLevel',['as'=>'showLevel','uses'=>'CoursesController@showLevel']);
Route::post('/mange/courese/Insert-shift',['as'=>'postInsertshift','uses'=>'CoursesController@postInsertshift']);
Route::post('/mange/courese/Insert-time',['as'=>'postInserttime','uses'=>'CoursesController@postInserttime']);
Route::post('/mange/courese/Insert-batche',['as'=>'postInsertbatche','uses'=>'CoursesController@postInsertbatche']);
Route::post('/mange/courese/Insert-group',['as'=>'postInsertgroup','uses'=>'CoursesController@postInsertgroup']);
Route::post('/mange/courese/Insert-classe',['as'=>'createclasses','uses'=>'CoursesController@createclasses']);
Route::get('/mange/courese/classe-Info',['as'=>'showClassInformation','uses'=>'CoursesController@showClassInformation']);
Route::post('/mange/courese/delet-Class',['as'=>'deletClass','uses'=>'CoursesController@deletClass']);
Route::get('/mange/courese/classe-edite',['as'=>'editeClass','uses'=>'CoursesController@editeClass']);
Route::post('/mange/courese/update-Class',['as'=>'updateClass','uses'=>'CoursesController@updateClass']);
///////////////////////student//////////////////////////////

Route::get('/student/getRigister',['as'=>'getRigister','uses'=>'StudentController@getRegisterationStudent']);
Route::post('/student/postRigister',['as'=>'postRigister','uses'=>'StudentController@postRegisterationStudent']);
Route::get('/student/search',['as'=>'studentInfo','uses'=>'StudentController@studentInfo']);




////////////////////////////////////////////Fee////////////////

Route::get('student/show/payment',['as'=>'getFeePayment','uses'=>'FeeController@getFeePayment']);
Route::get('student/payment',['as'=>'showStudentPayment','uses'=>'FeeController@showStudentPayment']);
Route::get('student/go/to/payment/{student_id}',['as'=>'goPayment','uses'=>'FeeController@goPayment']);
Route::post('student/go/to/payment/save',['as'=>'savePayment','uses'=>'FeeController@savePayment']);
Route::post('fee/create',['as'=>'createFee','uses'=>'FeeController@createFee']);
Route::get('fee/student/pay',['as'=>'pay','uses'=>'FeeController@pay']);
Route::post('fee/student/exstra/pay',['as'=>'exstraPay','uses'=>'FeeController@exstraPay']);
Route::get('fee/student/print/invoice/{receiptId}',['as'=>'printInvoice','uses'=>'FeeController@printInvoice']);
Route::get('fee/student/show/level',['as'=>'showLevelStudent','uses'=>'FeeController@showLevelStudent']);
Route::get('fee/student/transaction/dalete/{transact_id}',['as'=>'deleteTransaction','uses'=>'FeeController@deleteTransaction']);

////////////////////////////////////////////////////Fee Report/////////
Route::get('fee/report',['as'=>'getFeeReport','uses'=>'FeeController@getFeeReport']);
Route::get('fee/show/fee-report',['as'=>'showFeeReport','uses'=>'FeeController@showFeeReport']);



/////////////////////////////////////////////reports////////////////////////


Route::get('report/student-list',['as'=>'getStudentLists','uses'=>'ReportController@getStudentLists']);
Route::get('report/student-info',['as'=>'getstudentInfo','uses'=>'ReportController@getstudentInfo']);
Route::get('report/student-multi-class',['as'=>'getStudentListsMulitiClass','uses'=>'ReportController@getStudentListsMulitiClass']);
Route::get('report/student-multi-class-show',['as'=>'showStudentMultiClass','uses'=>'ReportController@showStudentMultiClass']);
Route::get('report/student-Enorrl',['as'=>'NewStudentRegister','uses'=>'ReportController@NewStudentRegister']);





	});

