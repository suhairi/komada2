@extends('layouts.members')

@section('content')

@include('members.includes.css.uppercase')

<div class="row">

	<!-- KEMASKINI SUMBANGAN -->
	<div class="col-xs-5">
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Kemaskini Sumbangan</h4></div>
			<div class="panel-body">

				{!! Form::open() !!}
				<div class="form-group">
					<label>Bulan/Tahun</label>
					{!! Form::selectMonth('month', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Bulan']) !!} <br />
					{!! Form::select('year', $years, '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Tahun']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Nilai Sumbangan') !!}
					<div class="input-group">
						<span class="input-group-addon">RM</span>
						{!! Form::number('jumlah', '', ['class' => 'form-control', 'required' => 'true', 'step' => '0.01', 'placeholder' => '10.00']) !!}
					</div>					
				</div>

				<div class="form-group">
					{!! Form::label('Catatan') !!}
					{!! Form::text('jumlah', '', ['class' => 'form-control', 'required' => 'true', 'step' => '0.01', 'placeholder' => 'Kematian/Pendidikan']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Kemaskini Sumbangan', ['class' => 'btn btn-primary pull-right']) !!}
				</div>
				{!! Form::close() !!}

			</div>
		</div>
	</div>

	<!-- LATEST SUMBANGAN -->
	<div class="col-xs-5 col-xs-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading"><h4>Sumbangan Terkini</h4></div>
		<div class="panel-body">

		<table class="table">
		@foreach($sumbangans as $sumbangan)
			@if($sumbangan != null)
				<tr>
					<td>{{ $sumbangan->month }}/{{ $sumbangan->year}}</td>
					<td>{{ $sumbangan->catatan }}</td>
					<td>{{ $sumbangan->jumlah }}</td>
				</tr>
			@else
				<tr><td class="alert alert-danger">Tiada Maklumat</td></tr>
			@endif
		@endforeach		
		</table>

		</div>
	</div>

	</div>		
		
	


</div>

@endsection