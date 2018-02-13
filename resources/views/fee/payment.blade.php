@extends('layouts.master')

@section('content')

@include('fee.stylesheet.css-pay')
@include('fee.createFee')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-3">
			<form action="{{ route('showStudentPayment') }}" class="search-payment" method="GET">
				<input type="text" name="student_id" value="{{$student_id}}" placeholder="Student ID" class="form-control">
			</form>
		</div>
		<div class="col-md-3">
			<label class="eng-name"> Name: <b class="student-name">{{ $status->first_name." ".$status->last_name }}</b></label>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3" style="text-align: right;">
			<label class="date-invoice">Date: <b>{{ date('d-M-Y') }}</b></label></div>
			<div class="col-md-3" style="text-align: right;">
				<label class="invoice-number"> Recepit N<sup>0</sup>: <b>{{sprintf('%05d',$receipt_id)}}</b></label>
			</div>




		</div>
		<form action="{{ count($readstudentTrans) !=0 ? route('exstraPay'): route('savePayment') }}" method="POST" id="formPayment">
			{{ csrf_field() }}
			<div class="panel-body">
				<table style="margin-top: -12px">
					<caption class="acadeaicDetails">
						{{ $status->program }}/
						Level-{{ $status->level }}/
						Shift-{{ $status->shift }}/
						Time-{{ $status->time }}/
						Batch-{{ $status->batche }}/
						Group-{{ $status->group }}


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
							<select id="program_id" name="program_id" class="d"> 
								@foreach($program as $p)
								<option value="{{$p->program_id}}"{{$p->program_id == $status->program_id ?'selected' : null}}>{{$p->program}}  </option>

								@endforeach
							</select>
						</td>
						<td>
							<select id="level_Id" name="level_id" class="d"> 
								<option value="">------------------</option>
								@foreach($level as $l)
								<option value="{{$l->level_id}}" {{$l->level_id == $status->level_id? 'selected' :null}}>{{$l->level}}</option>

								@endforeach
							</select>
						</select>
					</td>
					<td>
						<div class="input-group">
							<span class="input-group-addon create-fee" title="create fee" style="cursor: pointer; color: blue; padding: 0px 3px; padding-right: none;">$</span>
							<input type="text" name="fee" id="Fee" value="{{ $studentfee->amount or null }}" readonly="true" >
						</div>
						<input type="hidden" name="fee_id" id="feeID" value="{{$studentfee->fee_id or null}}">
						<input type="hidden" name="student_id" id="studentD"  value="{{$student_id}}" >
						<input type="hidden" name="level_id" value="{{$status->level_id}}" id="levelID" >
						<input type="hidden" name="user_id" id="userID" value="{{ Auth::id() }}" >
						<input type="hidden" name="transact_date" value="{{ date('Y-m-d H:i:s') }}" id="TransacDate" >
						<input type="hidden" name="s_fee_id" id="s_fee_id" >

					</td>
					<td>
						<input type="text" name="amount" id="Amount" required class="d">
					</td>
					<td>
						<input type="text" name="discount" id="Discount" class="d" >
					</td>
					<td>
						<input type="text" name="paid" id="Paid" >
					</td>
					<td>
						<input type="text" name="lack" id="Lack" disabled>
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
							<input type="text" name="remark" id="remark">
						</td>
						<td colspan="5">
							<input type="text" name="description" id="description">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="panel-footer" >
			<input type="submit" id="btn-go" name="btn-go" class="btn-default btn-payment" value="{{ count($readstudentTrans)!=0? 'Extra Pay': 'Save' }}">
					<a href="{{ route('printInvoice',$receipt_id) }}" target="_blank" class="btn btn-warning btn-xs"><i class="fa fa-print" title="Print"></i>Print</a>
			<input type="button" onclick="this.form.reset()"  class="btn btn-default btn-reset pull-right" value="Reset" >

		</div>
	</form>
</div>
@if(count($readstudentFee)!=0)
@include('fee.list.studentfeelist')
<input type="hidden" name="0" id="disabled">
@endif
@endsection

@section('script')
@include('fee.script.calulate')
@include('fee.script.payment')
@endsection