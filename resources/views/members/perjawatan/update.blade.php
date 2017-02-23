@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-6">
		
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Kemaskini Maklumat Perjawatan</h4></div>
			<div class="panel-body">

				{!! Form::model($perjawatan, ['route' => ['updatePerjawatanPost', 'id' => $perjawatan->id]]) !!}
				<table class="table">
					<div class="form-group">
						<label>*Nama Penuh</label>
						{!! Form::text('nama', $perjawatan->ahli->nama, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'Nama Penuh']) !!}
					</div>

					<div class="form-group">
					<label>*No Gaji/Pekerja</label>
					{!! Form::text('noPekerja', $perjawatan->noPekerja, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No Pekerja']) !!}
					</div>

					<div class="form-group">
					<label>*Tarikh Khidmat</label>
					{!! Form::text('noPekerja', $perjawatan->noPekerja, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No Pekerja']) !!}
					</div>

					<div class="form-group">
					<label>*Jawatan</label>
					{!! Form::text('jawatan', $perjawatan->jawatan, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'Jawatan']) !!}
					</div>

					<div class="form-group">
					<label>*Taraf Jawatan</label>
					{!! Form::text('tarafJawatan', $perjawatan->tarafJawatan, ['required' => 'true', 'class' => 'form-control', 'placeholder' => 'No Pekerja']) !!}
					</div>



					

					<div class="form-group pull-right">
						{!! Form::submit('Kemaskini Maklumat Perjawatan', ['class' => 'btn btn-primary']) !!}
					</div>
				</table>
				{!! Form::close() !!}				
			</div>
		</div>

	</div>
</div>


@endsection