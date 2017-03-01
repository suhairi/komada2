@extends('layouts.members')

@section('content')

@include('members.includes.css.uppercase')

<div class="row">
	<div class="col-xs-5">
		<div class="panel panel-primary">
			<div class="panel-heading panel-title"><h4>Senarai Mengikut Zon Pembayaran Gaji</h4></div>
			<div class="panel-body">

			{!! Form::open() !!}
			<div class="form-group">
				{!! Form::label('Bahagian / Wilayah /PPK') !!}
				{!! Form::select('zongaji', $zones, '', ['class' => 'form-control', 'placeholder' => 'Zon Pembayaran Gaji', 'required' => 'true']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Papar Senarai', ['class' => 'btn btn-primary pull-right']) !!}
			</div>

			{!! Form::close() !!}
				
			</div>
		</div>
	</div>
</div>

@endsection