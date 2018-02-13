        
              <style type="text/css">
              	.caadimic{
              		white-space: normal;
              		width:450px;
              	}
              	.action{
              		text-align: center;
              		vertical-align: middle;
              		width:60px;

              	}
              </style>

              <table class="table-bordered table-hover table-condensed table-striped" id="table-class-info" style="width: 100%">
                <thead>
                  <tr>
                    <th>Programs</th>
                    <th>Level</th>
                    <th>Shift</th>
                    <th>Time</th>
                    <th>Academic Details</th>
                    <th id="hidden">Action</th>
                    <th>
                      <input type="checkbox" id="checkAll">
                    </th>

                  </tr>
                </thead>
                <tbody>
                	                  	@foreach($classes as $c)

                  <tr>
                    <td>{{$c->program}}</td>
                     <td>{{$c->level}}</td>
                    <td>{{$c->shift}}</td>
                    <td>{{$c->time}}</td>
                    <td class="caadimic">
                    	<a href="#" data-id="{{$c->classe_id}}" id="class-edite">
                    		Program:{{$c->program}} / Level: {{$c->level}} / Shift:{{$c->shift}}/ Batch:{{$c->batche}} /Time:{{$c->time}} /Groub: {{$c->group}} /StartDate:{{date("d-M-y",strtotime($c->end_date))}} /EndtDate:{{date("d-M-y",strtotime($c->end_date))}}

                    	
                    </a>

                    </td>
                    <td class="action" id="hidden"><button value="{{$c->classe_id}}" class="btn btn-danger  del-class"> Del </button></td>
                <td>
                    <input type="checkbox" name="chk[]" value="{{ $c->classe_id }}" class="chk">

                 </td>


                    </tr>

                   @endforeach
              
                   
                </tbody>
              </table>
     
