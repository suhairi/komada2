@extends('layouts.members')

@section('content')

<div class="row">

	{!! Form::open() !!}
	<div class="col-xs-3">
		
		<div class="panel panel-primary">
			<div class="panel-heading panel-title"><h4>Kemaskini Baki Pinjaman</h4></div>
			<div class="panel-body">

			{!! Form::hidden('pinjaman_id', $pinjaman->id) !!}

			<div class="form-group">
				{!! Form::label('No Pekerja') !!}
				{!! Form::text('noPekerja', $pinjaman->ahli->noPekerja, ['class' => 'form-control', 'readonly' => 'true']) !!}
			</div>

			<div class="form-group">
				<label>*Jumlah Pinjaman</label>
				<div class="input-group">
					<span class="input-group-addon">RM</span>
					{!! Form::number('jumlah', $pinjaman->jumlah, ['required' => 'true', 'class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00', 'id' => 'jumlah']) !!}
				</div>
			</div>

			<div class="form-group">
				<label>*Baki</label>
				<div class="input-group">
					<span class="input-group-addon">RM</span>
					{!! Form::number('baki', $pinjaman->baki, ['required' => 'true', 'class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00', 'id' => 'baki']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('Tempoh (bulan)') !!}
				<div class="input-group">
					
					{!! Form::number('tempoh', $pinjaman->tempoh, ['class' => 'form-control', 'id' => 'tempoh']) !!}
					<span class="input-group-addon">bulan</span>
				</div>
			</div>

			<div class="form-group">
				<label>Insurans</label>
				<div class="input-group">
					<span class="input-group-addon">RM</span>
					{!! Form::number('insurans', $pinjaman->insurans, ['required' => 'true', 'class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00', 'id' => 'insurans']) !!}
				</div>
			</div>

			<div class="form-group">
				<label>Bayaran Proses</label>
				<div class="input-group">
					<span class="input-group-addon">RM</span>
					{!! Form::number('bayaran_proses', $pinjaman->caj_proses, ['required' => 'true', 'class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00', 'id' => 'proses']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('Jumlah Ansuran Bulanan') !!}
				<div class="input-group">
					<span class="input-group-addon">RM</span>
				{!! Form::text('ansuran', $pinjaman->ansuran, ['class' => 'form-control', 'id' => 'ansuran']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::submit('Kemaskini', ['class' => 'btn btn-primary pull-right']) !!}
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
		if($(this).val() == 0 || $(this).val() == '')
			$(this).val('');
	});

	$("input[type='number']").focusout(function() {
		if($(this).val() == '')
			$(this).val(0);
	});

</script>
@endsection