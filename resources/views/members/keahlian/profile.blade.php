@extends('layouts.members')

@section('content')

<div class="row">

	<div class="panel panel-primary">
	<div class="panel-heading"><h4>Maklumat Anggota</h4></div>
	<div class="panel-body">
		<div class="col-xs-4">

			<table class="table table-condensed table-striped table-bordered">
			<tr>
				<td colspan="2"><h4>Maklumat Keahlian</h4></td>
			</tr>
				<tr>
					<td><strong>Nama</strong></td>
					<td>{{ $ahli->nama }}</td>
				</tr>
				<tr>
					<td><strong>No Pekerja</strong></td>
					<td>{{ $ahli->noPekerja }}</td>
				</tr>
				<tr>
					<td><strong>No Ahli KOMADA</strong></td>
					<td>{{ $ahli->noAhli }}</td>
				</tr>
				<tr>
					<td><strong>No Kad Pengenalan</strong></td>
					<td>{{ $ahli->nokp }}</td>
				</tr>
				<tr>
					<td><strong>Jantina</strong></td>
					<td>{{ $ahli->jantina }}</td>
				</tr>
				<tr>
					<td><strong>Alamat 1</strong></td>
					<td>{{ $ahli->alamat1 }}</td>
				</tr>
				<tr>
					<td><strong>Alamat 2</strong></td>
					<td>{{ $ahli->alamat2 }}</td>
				</tr>
				<tr>
					<td><strong>Status</strong></td>
					<td>
						@if($ahli->status == 1)
							<button class="btn btn-success"> AKTIF </button>
						@else
							<button class="btn btn-danger"> TIDAK AKTIF </button>
						@endif
					</td>
				</tr>
				<tr>
				<td colspan="2">
					<a href="{{ route('updateKeahlian', ['noPekerja' => $ahli->noPekerja]) }}">
						<button class="btn btn-primary pull-right">Kemaskini Maklumat Keahlian</button>
					</a>
				</td>
			</tr>

			</table>
		</div>

		<div class="col-xs-4">
			<table class="table table-condensed table-striped table-bordered">
			<tr>
				<td colspan="2"><h4>Maklumat Perjawatan</h4></td>
			</tr>
			@if(!empty($ahli->perjawatan))
				<tr>
					<td><strong>No Pekerja</strong></td>
					<td>{{ $ahli->perjawatan->noPekerja }}</td>
				</tr>
				<tr>
					<td><strong>Jawatan</strong></td>
					<td>{{ $ahli->perjawatan->jawatan }}</td>
				</tr>
				<tr>
					<td><strong>Zon Gaji</strong></td>
					<td>{{ $ahli->perjawatan->zonGaji->nama }}</td>
				</tr>
				<tr>
					<td><strong>Taraf Jawatan</strong></td>
					<td>{{ $ahli->perjawatan->tarafJawatan }}</td>
				</tr>
				<tr>
					<td><strong>Tarikh Khidmat</strong></td>
					<td>{{ $ahli->perjawatan->tarikhKhidmat }}</td>
				</tr>
			@else
				<tr>
					<td colspan="2">Tiada maklumat.</td>
				</tr>
			@endif
			<tr>
				<td colspan="2">
					<a href="{{ route('updatePerjawatan', ['noPekerja' => $ahli->noPekerja]) }}">
						<button class="btn btn-primary pull-right">Kemaskini Maklumat Perjawatan</button>
					</a>
				</td>
			</tr>
			</table>
		</div>

		<div class="col-xs-4">
			<table class="table table-condensed table-striped table-bordered">
			<tr>
				<td colspan="3"><h4>Maklumat Yuran</h4></td>
			</tr>

			@if(!empty($ahli->yuran))
				<tr>
					<td>Perkara</td>
					<td>Bulanan</td>
					<td>Terkumpul</td>
				</tr>
				<tr>
					<td><strong>Yuran</strong></td>
					<td align="right">RM {{ number_format($ahli->yuran->jumlah, 2) }}</td>
					<td align="right">RM {{ number_format($ahli->yuranTerkumpul->jumlah, 2) }}</td>
				</tr>
				<tr>
					<td align="right" colspan="3"><a href="#" class="pull-right">Klik untuk maklumat lanjut</a></td>
				</tr>
			@else
				<tr>
					<td colspan="3">Tiada maklumat.</td>
				</tr>
			@endif
			<tr>
				<td colspan="3">
					<a href="{{ route('updateYuran', ['noPekerja' => $ahli->noPekerja]) }}">
						<button class="btn btn-primary pull-right">Kemaskini Maklumat Yuran</button>
					</a>
				</td>
			</tr>
			</table>

			<table class="table table-condensed table-striped table-bordered">
			<tr>
				<td colspan="3"><h4>Maklumat Pinjaman</h4></td>
			</tr>
			@if(!empty($loans->toArray()))

				<tr>
					<td><strong>Pinjaman</strong></td>
					<td><strong>Jumlah</strong></td>
					<td><strong>Baki</strong></td>
				</tr>

				@foreach($loans as $loan)
					<tr>
						<td>{{ $loan->perkhidmatan->nama}} </td>
						<td align="right">RM {{ number_format($loan->jumlah, 2) }}</td>
						<td align="right">RM {{ number_format($loan->baki, 2) }}</td>
					</tr>
				@endforeach
				<tr>
					<td align="right" colspan="3"><a href="#" class="pull-right">Klik untuk maklumat lanjut</a></td>
				</tr>
			@else
				<tr>
					<td colspan="3">Tiada maklumat.</td>
				</tr>
			@endif
			</table>
		</div>
		
	</div>
	</div>




</div>

@endsection