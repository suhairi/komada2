@extends('layouts.members')

@section('content')

<div class="row">

	{!! Form::open(['route' => 'pwt.proses']) !!}
	<div class="col-xs-3">
		
		<div class="panel panel-primary">
			<div class="panel-heading panel-title"><h4>Pinjaman Wang Tunai</h4></div>
			<div class="panel-body">

			<div class="form-group">
				{!! Form::label('No Pekerja') !!}
				{!! Form::text('noPekerja', $ahli->noPekerja, ['class' => 'form-control', 'readonly' => 'true']) !!}
			</div>

			<div class="form-group">
				<label>*Jumlah Pinjaman</label>
				<div class="input-group">
					<span class="input-group-addon">RM</span>
					{!! Form::number('jumlah', '', ['required' => 'true', 'class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00', 'id' => 'jumlah']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('Kadar (6%)') !!}
				<div class="input-group">
					{!! Form::text('kadar', '6', ['class' => 'form-control', 'readonly' => 'true']) !!}
					<span class="input-group-addon">%</span>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('Tempoh (bulan)') !!}
				<div class="input-group">
					
					{!! Form::number('tempoh', '', ['class' => 'form-control', 'id' => 'tempoh']) !!}
					<span class="input-group-addon">bulan</span>
				</div>
			</div>

			<div class="form-group">
				<label>Insurans</label>
				<div class="input-group">
					<span class="input-group-addon">RM</span>
					{!! Form::number('insurans', '', ['required' => 'true', 'class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00', 'id' => 'insurans']) !!}
				</div>
			</div>

			<div class="form-group">
				<label>Bayaran Proses</label>
				<div class="input-group">
					<span class="input-group-addon">RM</span>
					{!! Form::number('bayaran_proses', '', ['required' => 'true', 'class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00', 'id' => 'proses']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::submit('Proses Pinjaman', ['class' => 'btn btn-primary pull-right']) !!}
			</div>
			</div>
		</div>

	</div>

	<div class="col-xs-3">		
		<div class="panel panel-primary">
			<div class="panel-heading panel-title"><h4>Info Bayaran</h4></div>
			<div class="panel-body">

			<div class="form-group">
				{!! Form::label('Jumlah Pinjaman') !!}
				<div class="input-group">
					<span class="input-group-addon">RM</span>
				{!! Form::text('jumlah_pinjaman', '', ['class' => 'form-control', 'readonly' => 'true', 'id' => 'jumlah_pinjaman']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('Jumlah Ansuran Bulanan') !!}
				<div class="input-group">
					<span class="input-group-addon">RM</span>
				{!! Form::text('ansuran', '', ['class' => 'form-control', 'readonly' => 'true', 'id' => 'ansuran']) !!}
				</div>
			</div>



			</div>
		</div>
	</div>

	{!! Form::close() !!}

</div>

@endsection




@section('js')

<script type="text/javascript">

	$("input[type='number']").change(function() {

		$("input[type='number']").each(function() {

			if($(this).val() == '')
				$(this).val(0.00);
		});

		var jumlahKadar = ($('#jumlah').val() * 0.06) * ($('#tempoh').val() / 12);

		var jumlahPinjam = parseFloat($('#jumlah').val()) + parseFloat(jumlahKadar) + parseFloat($('#insurans').val()) + parseFloat($('#proses').val());

		var ansuran = jumlahPinjam / $('#tempoh').val();

		// console.log('Jumlah Pinjam : ' + jumlahPinjam);
		// console.log('Jumlah Ansuran : ' + ansuran.toFixed(2));

		$('#jumlah_pinjaman').val(jumlahPinjam.toFixed(2));
		$('#ansuran').val(ansuran.toFixed(2));

	});

	$("input[type='number']").focus(function() {
		$(this).val('');
	});

	$("input[type='number']").focusout(function() {
		if($(this).val() == '')
			$(this).val(0);
	});



</script>
@endsection