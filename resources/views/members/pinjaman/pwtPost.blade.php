@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-5">
		
		<div class="panel panel-primary">
			<div class="panel-heading panel-title"><h4>Pinjaman Wang Tunai</h4></div>
			<div class="panel-body">

			{!! Form::open() !!}

			<div class="form-group">
				{!! Form::label('No Pekerja') !!}
				{!! Form::text('noPekerja', $ahli->noPekerja, ['class' => 'form-control', 'readonly' => 'true']) !!}
			</div>

			<div class="form-group">
				<label>*Jumlah Pinjaman</label>
				<div class="input-group">
					<span class="input-group-addon">RM</span>
					{!! Form::number('jumlah', '', ['required' => 'true', 'class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('Tempoh (bulan)') !!}
				{!! Form::number('tempoh', '', ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Insurans</label>
				<div class="input-group">
					<span class="input-group-addon">RM</span>
					{!! Form::number('insurans', '', ['required' => 'true', 'class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00']) !!}
				</div>
			</div>

			{!! Form::close() !!}

			</div>
		</div>

	</div>
</div>

@endsection