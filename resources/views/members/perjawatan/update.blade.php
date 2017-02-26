@extends('layouts.members')

@section('content')

@include('members.includes.css.uppercase')

<div class="row">
	<div class="col-xs-6">
		
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Kemaskini Maklumat Perjawatan</h4></div>
			<div class="panel-body">

				{!! Form::open() !!}
				<table class="table">
					<div class="form-group">
						<label>*Nama Penuh</label>
						{!! Form::text('nama', $ahli->nama, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'Nama Penuh', 'readonly' => 'true']) !!}
					</div>

					<div class="form-group">
					<label>*No Gaji/Pekerja</label>
					{!! Form::text('noPekerja', $ahli->noPekerja, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No Pekerja', 'readonly' => 'true']) !!}
					</div>

					<div class="form-group">
					<label>*Tarikh Khidmat</label>
					{!! Form::date('tarikhKhidmat', '', ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No Pekerja']) !!}
					</div>

					<div class="form-group">
					<label>*Jawatan</label>
					{!! Form::text('jawatan', '', ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'Jawatan']) !!}
					</div>

					<div class="form-group">
					<label>*Taraf Jawatan</label>
					{!! Form::text('tarafJawatan', '', ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'Eg : TETAP/SAMBILAN/KONTRAK']) !!}
					</div>

					<div class="form-group">
					<label>*Zon Pembayaran Gaji</label>
					{!! Form::select('zonGaji_id', $zones, '', ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'Zon Gaji']) !!}
					</div>

					<div class="form-group">
						<a href="{{ route('profileAhli', ['id' => $ahli->id]) }}"><< Kembali ke profil</a>
						{!! Form::submit('Kemaskini Maklumat Perjawatan', ['class' => 'btn btn-primary pull-right']) !!}
					</div>
				</table>
				{!! Form::close() !!}				
			</div>
		</div>

	</div>
</div>


@endsection