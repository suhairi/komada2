@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-5">

		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Kemaskini TKA</h4></div>
			<div class="panel-body">

				<div class="form-group">

					{!! Form::label('Nilai TKA Semasa') !!}
					<div class="input-group">
						<span class="input-group-addon">RM</span>
						{!! Form::number('jumlah', number_format($tka->jumlah, 2), ['class' => 'form-control',  'required' => 'true']) !!}
					</div>
				</div>

				{!! Form::open() !!}
				<div class="form-group">
					{!! Form::label('Nilai TKA Baru') !!}
					<div class="input-group">
						<span class="input-group-addon">RM</span>
						{!! Form::number('jumlah', '', ['class' => 'form-control', 'required' => 'true', 'step' => '0.01']) !!}
					</div>					
				</div>

				<div class="form-group">
					{!! Form::submit('Kemaskini TKA', ['class' => 'btn btn-primary pull-right']) !!}
				</div>
				{!! Form::close() !!}

			</div>
		</div>		
		
	</div>
</div>

@endsection