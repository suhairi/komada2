@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-8">

		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Perhatian!</h4></div>
			<div class="panel-body">

			<table class="table table-condensed table-striped">
			<tr>
				<th colspan="5"><strong>*** 1 - No Pekerja tiada dalam senarai Ahli KOMADA</strong></th>
			</tr>
			<tr>
				<td>Bil</td>
				<td>No Pekerja</td>
				<td>Jumlah Pinjaman</td>
				<td>Baki</td>
				<td>Pilihan</td>
			</tr>

			@if(!empty($loans1))

				@foreach($loans1 as $loan)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $loan->noPekerja }}</td>
						<td align="right">RM {{ number_format($loan->jumlah, 2) }}</td>
						<td align="right">RM {{ number_format($loan->baki, 2) }}</td>
						<td align="center"><a href="{{ route('pinjaman.padam', $loan->id) }}">Padam</a></td>
					</tr>
				@endforeach

			@else
				<tr>
					<td colspan="2">Tiada maklumat.</td>
				</tr>
			@endif

			</table>

			<table class="table table-condensed table-striped">
			<tr>
				<th colspan="5"><strong>*** 2 - Jumlah baki kurang dari RM 10.00</strong></th>
			</tr>
			<tr>
				<td>Bil</td>
				<td>No Pekerja</td>
				<td>Jumlah Pinjaman</td>
				<td>Baki</td>
				<td>Pilihan</td>
			</tr>

			@if(!empty($loans2))

				@foreach($loans2 as $loan)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $loan->noPekerja }}</td>
						<td align="right">RM {{ number_format($loan->jumlah, 2) }}</td>
						<td align="right">RM {{ number_format($loan->baki, 2) }}</td>
						<td align="center"><a href="{{ route('pinjaman.padam', $loan->id) }}">Padam</a></td>
					</tr>
				@endforeach

			@else
				<tr>
					<td colspan="2">Tiada maklumat.</td>
				</tr>
			@endif

			</table>

			<table class="table table-condensed table-striped">
			<tr>
				<th colspan="5"><strong>*** 3 - Jumlah baki melebihi jumlah pinjaman</strong></th>
			</tr>
			<tr>
				<td>Bil</td>
				<td>No Pekerja</td>
				<td>Jumlah Pinjaman</td>
				<td>Baki</td>
				<td>Pilihan</td>
			</tr>

			@if(!empty($loans3))

				@foreach($loans3 as $loan)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $loan->noPekerja }}</td>
						<td align="right">RM {{ number_format($loan->jumlah, 2) }}</td>
						<td align="right">RM {{ number_format($loan->baki, 2) }}</td>
						<td align="center"><a href="{{ route('pinjaman.padam', $loan->id) }}">Padam</a></td>
					</tr>
				@endforeach

			@else
				<tr>
					<td colspan="2">Tiada maklumat.</td>
				</tr>
			@endif

			</table>

			</div>
		</div>
	</div>
</div>

@endsection