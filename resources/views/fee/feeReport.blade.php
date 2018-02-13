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
		<h1 class="page-header"> <i class="fa fa-file-text-o"></i>  FEE REPORT </h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href=""> Home</a> </li>
			<li><i class="fa fa-home"></i><a href=""> Fees</a> </li>
			<li><i class="fa fa-home"></i><a href=""> Fee Report</a> </li>
		</ol>
	</div>
</div>


{{-------------------}}
<div class="panel panel-default">

<div class="panel-heading">
	<table>
		<tr>
			<td>
					<b><i class="fa fa-apple"></i> Fee Information </b>

			</td>
			<td>
				<input type="text" name="from" id="from" class="form-control" placeholder="yyy/mm/dd"  required value="{{ date('Y-m-d') }}">

			</td>

			<td>
				<input type="text" name="to" id="to" placeholder="yyy/mm/dd" class="form-control" required value="{{ date('Y-m-d') }}">

			</td>
		</tr>
	</table>


</div>
<div class="panel-body" style="padding-bottom: 4px; text-align: center;">
	<b style="text-align: center; font-size: 20px ;font-weight: bold;"> Fee Report</b>
<div class="show-student-paid">
	

	</div>

</div>
 </div>



@endsection

@section('script')
<script type="text/javascript">
	
	$( "#from" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat:'yy-mm-dd',
		onSelect:function(from)
		{
			showFee(from,$('#to').val())
		}
	});
		$( "#to" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat:'yy-mm-dd',
		onSelect:function(to)
		{
			showFee($('#from').val(),to)
		}

	});

		////////////////
		function showFee(from,to)
		{
			$.get("{{ route('showFeeReport') }}",{from:from,to:to},function(data) {
				$('.show-student-paid').html(data)
			})
		}


</script>



@endsection
