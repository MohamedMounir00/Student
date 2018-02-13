@extends('layouts.master')

@section('content')
    {!! Charts::assets() !!}


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-file-text-o"></i> NEW STUDENT ENROLL</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href=""> Home</a> </li>
			<li><i class="fa fa-home"></i><a href=""> Student</a> </li>
			<li><i class="fa fa-home"></i><a href=""> Student Enorll</a> </li>
		</ol>
	</div>
</div>





{{-------------------}}
<div class="panel panel-default">

<div class="panel-heading">
	<b><i class="fa fa-apple"></i> Student Information </b>

</div>
<div class="panel-body" style="padding-bottom: 4px">
	<b></b>
<div class="show-student-info">
	
		{!! $chart->render() !!}


	</div>

</div>
 </div>



@endsection