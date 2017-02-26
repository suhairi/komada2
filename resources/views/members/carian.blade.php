@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-5">

		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Carian (No Pekerja)</h4></div>
			<div class="panel-body">
				
				{!! Form::open() !!}
				<div class="form-group">
					{!! Form::text('noPekerja', '', ['class' => 'form-control', 'placeholder' => 'No Pekerja : 3374', 'required' => 'true']) !!}
					<br />
					{!! Form::submit('Carian', ['class' => 'btn btn-primary']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>

	</div>
</div>


@endsection