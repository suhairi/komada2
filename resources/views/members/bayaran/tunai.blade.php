@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-5">
		
		<div class="panel panel-primary">
			<div class="panel-heading panel-title"><h4>Pinjaman Wang Tunai</h4></div>
			<div class="panel-body">
				
				{!! Form::open(['route' => 'bayaran.tunai']) !!}
				<div class="form-group">
					<label>No Pekerja</label>
					{!! Form::text('noPekerja', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'No Pekerja']) !!}
				</div>

				<div class="form-group">
				{!! Form::submit('Carian', ['class' => 'btn btn-primary pull-right']) !!}
				</div>


				{!! Form::close() !!}


			</div>
		</div>
	</div>
</div>


@endsection