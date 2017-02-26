@extends('layouts.members')

@section('content')

@include('members.includes.css.uppercase')

<div class="row">
	<div class="col-xs-5">
		<div class="panel panel-primary">
			<div class="panel-heading title">Daftar Keahlian</div>
			<div class="panel-body">

				{!! Form::open() !!}

				<div class="form-group">
					<label>*Nama Penuh</label>
					{!! Form::text('nama', '', ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'Nama Penuh']) !!}
				</div>

				<div class="form-group">
				<label>*No Gaji/Pekerja</label>
				{!! Form::text('noPekerja', '', ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No Pekerja']) !!}
				</div>

				<div class="form-group">
				<label>*No Keahlian KOMADA</label>
				{!! Form::text('noAhli', '', ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No Ahli']) !!}
				</div>

				<div class="form-group">
				<label>Tarikh Jadi Ahli</label>
				{!! Form::date('tarikhAhli', '', ['class' => 'form-control', 'placeholder' => 'Tarikh Ahli']) !!}
				</div>

				<div class="form-group">
				<label>*No Kad Pengenalan</label>
				{!! Form::text('nokp', '', ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No KP']) !!}
				</div>

				<div class="form-group">
				<label>Jantina</label>
				{!! Form::select('jantina', ['LELAKI' => 'LELAKI', 'WANITA' => 'WANITA'], '', ['class' => 'form-control', 'placeholder' => 'Jantina']) !!}
				</div>

				<div class="form-group">
				<label>Alamat 1</label>
				{!! Form::text('alamat1', '', ['class' => 'form-control', 'placeholder' => 'Alamat 1']) !!}
				</div>

				<div class="form-group">
				<label>Alamat 2</label>
				{!! Form::text('alamat2', '', ['class' => 'form-control', 'placeholder' => 'Alamat 2']) !!}
				</div>

				<div class="form-group pull-right">
					{!! Form::submit('Daftar Ahli', ['class' => 'btn btn-primary']) !!}
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>

	@include('members.includes.keahlian.ahliTerkini')

</div>	

@endsection