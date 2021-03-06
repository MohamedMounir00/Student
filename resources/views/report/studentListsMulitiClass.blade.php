@extends('layouts.master')

@section('content')
<style type="text/css">
	caption{
		height: 50px;
		font-size: 20px;
		font-weight: bold;
	}
</style>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-file-text-o"></i>  Student Registration </h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href=""> Home</a> </li>
			<li><i class="fa fa-home"></i><a href=""> Reports</a> </li>
			<li><i class="fa fa-home"></i><a href=""> StudentList</a> </li>
		</ol>
	</div>
</div>


{{-------------------}}
<div class="panel panel-default">

<div class="panel-heading">
	<b><i class="fa fa-apple"></i> Student Information </b>
	<a href="#" class="pull-right" id="show-class-info"><i class="fa fa-plus"></i>  </a>

</div>
<div class="panel-body" style="padding-bottom: 4px; text-align: center; ">
	<b style="text-align: center; font-size: 20px ;font-weight: bold;"> Student Report</b>
<div class="show-student-info">
	

	</div>

</div>
 </div>


@include('classes.classPopup')

@endsection



@section('script')

@include('script.scriptClassPopup')
<script type="text/javascript">
	$(document).on('click','#btn-go',function(e){
		e.preventDefault();
		data =$('#form-multi-class').serialize();
		$.get('{{ route('showStudentMultiClass') }}',data,function (data) {
			$('.show-student-info').empty().append(data);
		})

	})

	///////////////check all////////////////
	$(document).on('click','#checkAll',function(){
		$(':checkbox.chk').prop('checked',this.checked)
	})
</script>
@endsection
