@extends('layouts.members')

@section('content')

@include('members.includes.css.uppercase')

<div class="row">
	<div class="col-xs-5">
		<div class="panel panel-primary">
			<div class="panel-heading panel-title"><h4>Senarai Mengikut Zon Pembayaran Gaji</h4></div>
			<div class="panel-body">

			<table class="table table-striped">
				<tr>
					<td><strong>Bil</strong></td>
					<td><strong>Nama</strong></td>
					<td><strong>Yuran Bulanan</strong></td>
				</tr>
				<?php $totalYuran = 0; ?>
				@forelse($perjawatan as $temp)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td><a href="{{ route('profileAhli', ['id' => $temp->ahli->id]) }}" target="_blank">{{ $temp->ahli->nama }}</a></td>
						<td class="pull-right">RM {{ number_format($temp->yuran->jumlah, 2) }}</td>
						<?php $totalYuran += number_format($temp->yuran->jumlah, 2); ?>
					</tr>

				@empty
					<tr><td colspan="2" class="alert alert-danger">Tiada Maklumat</td></tr>
				@endforelse

				<tr>
					<td colspan="3" align="right"><strong>RM {{ number_format($totalYuran, 2) }}</strong></td>
				</tr>

			</table>
				
			</div>
		</div>
	</div>
</div>

@endsection