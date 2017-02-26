@extends('layouts.members')

@section('content')

@include('members.includes.css.uppercase')

<div class="row">
	<div class="col-xs-6">
		
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Kemaskini Keahlian</h4></div>
			<div class="panel-body">

				{!! Form::model($ahli, ['route' => ['updateKeahlianPost', 'id' => $ahli->id]]) !!}
				<table class="table">
					<div class="form-group">
						<label>*Nama Penuh</label>
						{!! Form::text('nama', $ahli->nama, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'Nama Penuh']) !!}
					</div>

					<div class="form-group">
					<label>*No Gaji/Pekerja</label>
					{!! Form::text('noPekerja', $ahli->noPekerja, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No Pekerja']) !!}
					</div>

					<div class="form-group">
					<label>*No Keahlian KOMADA</label>
					{!! Form::text('noAhli', $ahli->noAhli, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No Ahli']) !!}
					</div>

					<div class="form-group">
					<label>Tarikh Jadi Ahli</label>
					{!! Form::date('tarikhAhli', $ahli->tarikhAhli, ['class' => 'form-control', 'placeholder' => 'Tarikh Ahli']) !!}
					</div>

					<div class="form-group">
					<label>*No Kad Pengenalan</label>
					{!! Form::text('nokp', $ahli->nokp, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No KP']) !!}
					</div>

					<div class="form-group">
					<label>Jantina</label>
					{!! Form::select('jantina', ['LELAKI' => 'LELAKI', 'WANITA' => 'WANITA'], $ahli->jantina, ['class' => 'form-control', 'placeholder' => 'Jantina']) !!}
					</div>

					<div class="form-group">
					<label>Bangsa</label>
					{!! Form::select('bangsa', ['MELAYU' => 'MELAYU', 'CINA' => 'CINA', 'INDIA' => 'INDIA', 'LAIN' => 'LAIN'], $ahli->bangsa, ['class' => 'form-control', 'placeholder' => 'Bangsa']) !!}
					</div>



					<div class="form-group">
					<label>Alamat 1</label>
					{!! Form::text('alamat1', $ahli->alamat1, ['class' => 'form-control', 'placeholder' => 'Alamat 1']) !!}
					</div>

					<div class="form-group">
					<label>Alamat 2</label>
					{!! Form::text('alamat2', $ahli->alamat2, ['class' => 'form-control', 'placeholder' => 'Alamat 2']) !!}
					</div>

					<div class="form-group">
					<label>Status</label>
					{!! Form::select('status', ['1' => 'AKTIF', '0' => 'TIDAK AKTIF'], $ahli->status, ['class' => 'form-control', 'placeholder' => 'Status']) !!}
					</div>

					<div class="form-group">
						<a href="{{ route('profileAhli', ['id' => $ahli->id]) }}"><< Kembali ke profil</a>
						{!! Form::submit('Kemaskini Maklumat Keahlian', ['class' => 'btn btn-primary pull-right']) !!}
					</div>
				</table>
				{!! Form::close() !!}				
			</div>
		</div>

	</div>
</div>


@endsection