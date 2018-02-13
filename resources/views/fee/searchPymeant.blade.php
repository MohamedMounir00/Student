@extends('layouts.master')

@section('content')

@include('fee.stylesheet.css-pay')
 <div class="panel panel-default">
 	<div class="panel-heading">
 		<div class="col-md-3">
 			<form action="{{ route('showStudentPayment') }}" class="search-payment" method="GET">
				<input type="text" name="student_id"  placeholder="Student ID" class="form-control">
 			</form>
 		</div>
 		 		<div class="col-md-3">
 		 			<label class="eng-name"> Name: <b class="student-name"></b></label>
 		 		</div>
 		 		<div class="col-md-3"></div>
 		 		<div class="col-md-3" style="text-align: right;">
 		 			<label class="date-invoice">Date: <b>{{ date('d-M-Y') }}</b></label></div>
 		 			<div class="col-md-3" style="text-align: right;">
 		 				<label class="invoice-number"> Recepit N<sup>0</sup></label>
 		 			</div>




 	</div>
 	<div class="panel-body">
 		<table style="margin-top: -12px">
 			<caption class="acadeaicDetails">
 				
 			</caption>
 			<thead>
 				<tr>
 					<th>Programs</th>
 					<th>Leavel</th>
 					<th>School Fee($)</th>
 					<th>Amount ($)</th>
 					<th>Dis(%)</th>
 					<th>Paid($)</th>
 					<th>Amount Lack($)</th>

 				</tr>
 			</thead>
 			<tr>
 				<td>
 					<select id="AcademicID" name="academic_id"> 
 						<option value="">-----------</option>
 					</select>
 				</td>
 				<td>
 					<select>
 						<option value="">------------------</option>
 					</select>
 				</td>
 				<td>
 					<input type="text" name="fee" id="Fee" readonly="true" >
 					 <input type="hidden" name="fee_id" id="feeID" >
 					 <input type="hidden" name="student_id" id="feeID" >
 					 <input type="hidden" name="level_id" id="feeID" >
 					 <input type="hidden" name="user_id" id="feeID" >
 					 <input type="hidden" name="transacdate" id="feeID" >

 				</td>
 				<td>
 					<input type="text" name="amount" id="Amount" required>
 				</td>
 				<td>
 					<input type="text" name="discount" id="Discount" >
 				</td>
 				<td>
 					<input type="text" name="paid" id="Baid" >
 				</td>
 				<td>
 					<input type="text" name="balance" id="Balance" >
 				</td>
 			</tr>
 			<thead>
 				<tr>
 					<th colspan="2">Remarck</th>
 					<th colspan="5">Description</th>
 				</tr>
 			</thead>
 			<tbody>
 				<tr>
 					<td colspan="2">
 						<input type="text" name="decription" id="decription">
 					</td>
 					<td colspan="5">
 						<input type="text" name="remark" id="remark">
 					</td>
 				</tr>
 			</tbody>
 		</table>
 	</div>
 	<div class="panel-footer" style="height: 40px"></div>
 </div>
 @endsection