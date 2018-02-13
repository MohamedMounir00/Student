@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-file-text-o"></i>  STUDENT SEARCH </h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href=""> Home</a> </li>
			<li><i class="fa fa-home"></i><a href=""> Student</a> </li>
			<li><i class="fa fa-home"></i><a href=""> Student Search</a> </li>
		</ol>
	</div>
</div>


{{-------------------}}
<div class="panel panel-default">
<div class="panel-body">
	<form action="{{ route('studentInfo') }}" method="GET" id="=form-search">
		<table>
			<tr>
				<td>
					<input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search By ID Or Name">
				</td>
			</tr>
	
       </table>
	</form>


</div>

<div class="panel-body">
	<table class="table  table-condensed table-hover table-striped table-bordered ">
		<thead>
			<th>N<sup>o</sup></th>
			<th> First Name </th>
			<th> Last Name </th>
			<th>  Full Name </th>
			<th> Sex </th>
			<th> Birth Date</th>
			<th> Action</th>
		</thead>
		<tbody>

			@foreach($students as $key =>$student)
			<tr>
			<td> {{ ++$key }}</td>
			<td> {{ $student->first_name }} </td>
			<td> {{ $student->last_name }} </td>
			<td> {{ $student->full_name }} </td>
			<td> {{ $student->Sex }} </td>
			<td> {{ $student->dob }} </td>
			<td>
				<a href="#" class="btn btn-info">Edite</a>
				<a href="#" class="btn btn-danger">delete</a>
			</td>
		</tr>
			@endForeach
		</tbody>





	</table>
</div>
<div class="footer">
	{{ $students->render() }}
</div>
 </div>
@endsection