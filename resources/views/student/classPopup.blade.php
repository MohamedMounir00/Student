
<div class="modal fade" id="academic-choose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-xs" >

<section class="panel panel-default">
			<header class="panel-heading">
				Acadamic choose
			</header>
			<form  action="#" method="POST" class="form-horizontal" id="form-view-class">
				{{ csrf_field() }}
				<input type="hidden" name="classe_id" id="classe_id">

				<div class="panel-body" >
					<div class="form-group">

						
						<div class="col-sm-6" >
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

						<div class="col-sm-6" >
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

						<div class="col-sm-6" >
							<label for="acdemic-year"> Level </label>
							<div class="input-group">
								<select class="form-control" name="level_id" id="level_id">
								
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-level"></span>
								</div>
							</div>
						</div>


						<div class="col-sm-6" >
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

						<div class="col-sm-6" >
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


						<div class="col-sm-3" >
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



						<div class="col-sm-3" >
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



						
			</div>
		</div>

	</form>
	<div class="panel panel-default ">
		<div class="panel panel-heading">
			Class Information
		</div>
		<div class="panel panel-body" id="add-class-info" style="overflow-y: auto; height: 250px">
			
		</div>
	</div>
</section>



  </div></div>