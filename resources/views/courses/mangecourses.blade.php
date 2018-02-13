@extends('layouts.master')

@section('content')
@include('courses.popup.academic')
@include('courses.popup.program')
@include('courses.popup.level')
@include('courses.popup.shift')
@include('courses.popup.time')
@include('courses.popup.batche')
@include('courses.popup.group')







<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i> Courses</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
			<li><i class="icon_document_alt"></i>Course</li>
			<li><i class="fa fa-file-text-o"></i>Manage Courses</li>

		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

		<section class="panel panel-default">
			<header class="panel-heading">
				Manage Courses
			</header>
			<form  action="{{ route('createclasses') }}" method="POST" class="form-horizontal" id="form-crete-class">
				{{ csrf_field() }}
				<input type="hidden" name="active" id="active" value="1">
				<input type="hidden" name="classe_id" id="classe_id">

				<div class="panel-body" >
					<div class="form-group">

						
						<div class="col-sm-3" >
							<label for="acdemic-year"> Academic Year </label>
							<div class="input-group">
								<select class="form-control" name="academic_id" id="academic_id">
									@foreach($academic as $A)
									<option value="{{$A->academic_id}}">{{$A->academic}}</option>

									@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-academic" ></span>
								</div>
							</div>
						</div>

						<div class="col-sm-3" >
							<label for="acdemic-year"> couress </label>
							<div class="input-group">
								<select class="form-control" name="program_id" id="program_id">
									<option value="">-----------</option>
									@foreach($program as $key=> $p)
									<option value="{{$p->program_id}}">{{$p->program}}</option>

									@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-program"></span>
								</div>
							</div>
						</div>

						<div class="col-sm-3" >
							<label for="acdemic-year"> Level </label>
							<div class="input-group">
								<select class="form-control" name="level_id" id="level_id">
								
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-level"></span>
								</div>
							</div>
						</div>


						<div class="col-sm-3" >
							<label for="acdemic-year"> Shift </label>
							<div class="input-group">
								<select class="form-control" name="shift_id" id="shift_id">
									@foreach($shift as $s)
									<option value="{{$s->shift_id}}">{{$s->shift}}</option>

									@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-shift"></span>
								</div>
							</div>
						</div>

						<div class="col-sm-4" >
							<label for="time"> Time </label>
							<div class="input-group">
								<select class="form-control" name="time_id" id="time_id">
									@foreach($time as $t)
									<option value="{{$t->time_id}}">{{$t->time}}</option>

									@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-time"></span>
								</div>
							</div>
						</div>


						<div class="col-sm-4" >
							<label for="batch"> Batch </label>
							<div class="input-group">
								<select class="form-control" name="batche_id" id="batche_id">
									@foreach($batche as $b)
									<option value="{{$b->batche_id}}">{{$b->batche}}</option>

									@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-batche"></span>
								</div>
							</div>
						</div>



						<div class="col-sm-4" >
							<label for="groub"> Groub </label>
							<div class="input-group">
								<select class="form-control" name="group_id" id="group_id">
									@foreach($group as $g)
									<option value="{{$g->group_id}}">{{$g->group}}</option>

									@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-group"></span>
								</div>
							</div>
						</div>



						<div class="col-sm-5" >
							<label for="groub"> Start Date </label>
							<div class="input-group">
								<input type="text" name="start_date" id="start_date" class="form-control" required> 
								
								
								<div class="input-group-addon" >
									<span class="fa fa-calendar"></span>
								</div>
							</div>
						</div>



						<div class="col-sm-5" >
							<label for="groub"> End Date </label>
							<div class="input-group">
								<input type="text" name="end_date" id="end_date" class="form-control" required> 
								
								<div class="input-group-addon" >
									<span class="fa fa-calendar"></span>
								</div>
							</div>
						</div>
					</div>


				</div>


				<div class="panel-footer" >
					<button type="submit" class=" btn btn-default btn-sm">
						Create Couress
					</button>
					<button type="button" class=" btn btn-success btn-sm update-class">
						Update Couress
					</button>

				</div>
			</div>
		</div>

	</form>
	<div class="panel panel-default ">
		<div class="panel panel-heading">
			Class Information
		</div>
		<div class="panel panel-body" id="add-class-info">
			
		</div>
	</div>
</section>
</div>



</div>


@endsection

@section('script')
<script>
			showClassInfo();

	$( "#start_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat:'yy-mm-dd'


	});
	$( "#end_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat:'yy-mm-dd'



	});


	$("#form-crete-class #program_id").on('change',function(e){

		var program_id =$(this).val();
		var level = $('#level_id');
		$(level).empty();
		$.get("{{route('showLevel')}}",{program_id:program_id},function(data){
			$.each(data,function(i,l){
				$(level).append($("<option/>",{
					value : l.level_id,
					text  :  l.level,

				}));
			});
			showClassInfo();

		});
	});

	
$('#academic_id').on('change',function(e){
	showClassInfo()
})

$('#level_id').on('change',function(e){
	showClassInfo()
})
$('#shift_id').on('change',function(e){
	showClassInfo()
})
$('#time_id').on('change',function(e){
	showClassInfo()
})
$('#batche_id').on('change',function(e){
	showClassInfo()
})
$('#group_id').on('change',function(e){
	showClassInfo()
})

    /////////////////////////////////////////////////////////////////academic////////////////////////////////////////////////
    $('#add-more-academic').on('click',function(){
    	$('#academic-year-show').modal();
    });


//////////

$('.btn-save-academic').on('click',function(){
	var academic = $('#new_academic').val();
	$.post("{{route('postInsertAcadmic')}}",{academic:academic},function(data){
		$('#academic_id').append($("<option/>",{
			value : data.academic_id,
			text  :  data.academic

		}));    	
		$('#new_academic').val("");
	});
});
//////////////////////////////////////////////////////////////program///////////////////////////////////////////////////



 /////////
 $('#add-more-program').on('click',function(){
 	$('#program-show').modal();
 });


 $('.btn-save-program').on('click',function(){
 	var program = $('#new_program').val();
 	var description = $('#new_description').val();

 	$.post("{{route('postInsertProgram')}}",{program:program,description:description},function(data){
 		$('#program_id').append($("<option/>",{
 			value : data.program_id,
 			text  :  data.program

 		}));    	
 		$('#new_program').val("");    
 		$('#new_description').val("");
 	});
 });

////////////////////////////////////////////////////////////////Level//////////////////////////////////////////////

 /////////
 $('#add-more-level').on('click',function(){

 	var programs= $('#program_id option');
 	var program= $('#form-level-create').find('#programs_id');
 	$(program).empty();
 	$.each(programs,function(i,pro){
 		$(program).append($("<option/>",{
 			value : $(pro).val(),
 			text  :  $(pro).text(),

 		}));
 	});
 	$('#level-show').modal('show');

 });

//////
$('#form-level-create').on('submit',function(e){
	e.preventDefault();
	var data = $(this).serialize();
	var url = $(this).attr('action');
	$.post(url,data,function(data){
		
		$('#level_id').append($("<option/>",{
			value : data.level_id,
			text  :  data.level

		}));  
		$('#programs_id').val("");

		$('#new_level').val("");    
		$('#description').val("");

	});
	
});

    ////////////////////////////////////==============///////////shift/////////////////////////////////////////////////

    $('#add-more-shift').on('click',function(){
    	$('#shift-show').modal();
    });


//////////

$('.btn-save-shift').on('click',function(){
	var shift = $('#new_shift').val();
	$.post("{{route('postInsertshift')}}",{shift:shift},function(data){
		$('#shift_id').append($("<option/>",{
			value : data.shift_id,
			text  :  data.shift

		}));    	
		$('#new_shift').val("");
	});
});
////////////////////////////////////////======time===/////////////////////////////////////////////////

$('#form-time-create').on('submit',function(e){
	e.preventDefault();
	var data = $(this).serialize();
	$.post("{{ route('postInserttime') }}",data,function(data){
		
		$('#time_id').append($("<option/>",{
			value : data.time_id,
			text  :  data.time

		}));
	});

	$(this).trigger('reset');

});
$('#add-more-time').on('click',function(e){

	$('#time-show').modal('show');


});





////////////////////////////////////////======batche===/////////////////////////////////////////////////

$('#form-batche-create').on('submit',function(e){
	e.preventDefault();
	var data = $(this).serialize();
	$.post("{{ route('postInsertbatche') }}",data,function(data){
		
		$('#batche_id').append($("<option/>",{
			value : data.batche_id,
			text  :  data.batche

		}));
	});

	$(this).trigger('reset');

});
$('#add-more-batche').on('click',function(e){

	$('#batche-show').modal('show');


});



////////////////////////////////////////======group===/////////////////////////////////////////////////

$('#form-group-create').on('submit',function(e){
	e.preventDefault();
	var data = $(this).serialize();
	$.post("{{ route('postInsertgroup') }}",data,function(data){
		
		$('#group_id').append($("<option/>",{
			value : data.group_id,
			text  :  data.group

		}));
	});

	$(this).trigger('reset');

});
$('#add-more-group').on('click',function(e){

	$('#group-show').modal('show');


});


////////////////////////////////////////======ADD AClass===////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$('#form-crete-class').on('submit',function(e){
	e.preventDefault();
	var data = $(this).serialize();

	var url = $(this).attr('action');
	$.post(url,data,function(data){
		showClassInfo(data.academic_id);
	});
	$(this).trigger('reset');

});


//////////////////////////////////////////////// addAclass in table
function showClassInfo(){
		var data = $('#form-crete-class').serialize();

	//var academic_id= $('#academic_id').val();
	$.get("{{ route('showClassInformation') }}",data,function(data){
			$('#add-class-info').empty().append(data);
			MergeCommonRows($('#table-class-info'))


	})

}

////////////////////////////////////////////////////call class///////////


function MergeCommonRows(table){

	var firstColumnBrakes =[];
	$.each(table.find('th'),function(i){
		var previous = null,cellToExtend =null ,rowspan = 1;
		table.find("td:nth-child("+ i +")").each(function(index ,e){
			var jthis= $(this),content = jthis.text();
			if (previous == content && content!== "" && $.inArray(index, firstColumnBrakes) === -1) {
				jthis.addClass('hidden');
				cellToExtend.attr("rowspan", (rowspan=rowspan+1));


			}
			else{
				if (i == 1) firstColumnBrakes.push(index);
				rowspan=1;
				previous = content;
				cellToExtend=jthis;


			}

		});
	});
	$('td.hidden').remove();
}
/////////////////////////////////////////////////////////////deletClass////////////////////////////////////////////////////
$(document).on('click','.del-class',function(e){
	classe_id = $(this).val();
	$.post("{{ route('deletClass') }}" ,{classe_id:classe_id},function(data){
			showClassInfo($('#academic_id').val());

	})
})
////////////////////////////////////////////////////////class-edite//////////////////////////////
$(document).on('click','#class-edite',function(data){
	var classe_id =$(this).data('id');
	$.get("{{route('editeClass')}}",{classe_id:classe_id},function(data){
		$('#academic_id').val(data.academic_id);
		$('#level_id').val(data.level_id);
		$('#time_id').val(data.time_id);
		$('#shift_id').val(data.shift_id);
		$('#batche_id').val(data.batche_id);
		$('#group_id').val(data.group_id);
		$('#start_date').val(data.start_date);
		$('#end_date').val(data.end_date);
		$('#classe_id').val(data.classe_id);


	})
})
///////////////////////////////////////////////////////////////updateClass/////////////////////////////////////////////
$('.update-class').on('click',function(e){
	e.preventDefault();
	var data =$('#form-crete-class').serialize(data);
	$.post("{{ route('updateClass') }}",data,function(dta){
					showClassInfo(data.academic_id);

	})
})
</script>

@endsection



