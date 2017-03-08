@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-5">
		
		<div class="panel panel-primary">
			<div class="panel-heading panel-title"><h4>Bayaran Tunai</h4></div>
			<div class="panel-body">
				
				{!! Form::open(['route' => 'bayaran.tunai.proses']) !!}

				{!! Form::hidden('noPekerja', $ahli->noPekerja) !!}
				<div class="form-group">
					<label>Bulan / Tahun</label>
					{!! Form::selectMonth('month', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Bulan']) !!} <br />
					{!! Form::select('year', $years, '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Tahun']) !!}
				</div>

				<div class="form-group">
					<label>Pinjaman - Baki</label>
					<select name="id" required="" class="form-control">
						<option>Pinjaman</option>
						@foreach($pinjaman as $temp)
							<option value="{{ $temp->id }}">{{ $temp->perkhidmatan->nama }} (Baki : RM {{ $temp->baki }})</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
				<label>Jumlah Bayaran</label>
				<div class="input-group">
					<span class="input-group-addon">RM</span>
					{!! Form::number('jumlah', '', ['required' => 'true', 'class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00']) !!}
				</div>
				</div>

				<div class="form-group">
				{!! Form::submit('Proses Bayaran Tunai', ['class' => 'btn btn-primary pull-right']) !!}
				</div>


				{!! Form::close() !!}


			</div>
		</div>
	</div>

	<div class="col-xs-5">
		
		<div class="panel panel-primary">
			<div class="panel-heading panel-title"><h4>Maklumat Pinjaman</h4></div>
			<div class="panel-body">

				<table class="table">
					<tr>
						<td>Bil</td>
						<td>Jenis Pinjaman</td>
						<td>Jumlah Pinjaman</td>
						<td>Baki Pinjaman</td>
					</tr>
					@forelse($pinjaman as $temp)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ strtoupper('pinjaman wang tunai') }}</td>
							<td>{{ number_format($temp->jumlah, 2 ) }}</td>
							<td>{{ number_format($temp->baki, 2 ) }}</td>
						</tr>
					@empty
						<tr>
							<td colspan="4" class="alert alert-danger">Tiada Maklumat Pinjaman.</td>
						</tr>
					@endforelse
				</table>
			
			</div>
		</div>
	</div>


</div>


@endsection