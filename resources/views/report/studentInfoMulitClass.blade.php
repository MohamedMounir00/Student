<table class=" table table-bordered table-hover table-striped table-condensed" id="student-info">
	<thead>
		<tr>
			<th>#</th>
			<th> Student ID </th>
			<th> Name </th>
			<th> Sex </th>
			<th> Birth Date </th>
			<th> Coursses </th>
			<th> Level </th>
			<th> Shift </th>
			<th> Time </th>
			<th> Batche </th>
			<th> Group </th>
		</tr>
	</thead>
	<tbody>
		@foreach($classes as $key =>$c)


		<tr>
			<td>{{ ++$key}}</td>
			<td>{{sprintf("%05d",$c->student_id) }}</td>
			<td>{{ $c->name }}</td>
			<td>{{ $c->sex }}</td>
			<td>{{ $c->dob }}</td>

			<td>{{ $c->program }}</td>
			<td>{{ $c->level }}</td>
			<td>{{ $c->shift }}</td>
			<td>{{ $c->time }}</td>
			<td>{{ $c->batche }}</td>
			<td>{{ $c->group }}</td>

		</tr>

		@endforeach
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {
    $('#student-info').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
         
    } );
} );


	
</script>
 