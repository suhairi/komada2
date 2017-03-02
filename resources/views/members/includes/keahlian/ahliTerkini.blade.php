<div class="col-xs-5">
	<div class="panel panel-primary">
		<div class="panel-heading title">Keahlian Terkini</div>
		<div class="panel-body">
				
			<table class="table table-condensed">

			<tr>
				<td><strong>Bil</strong></td>
				<td><strong>Nama</strong></td>
				<td><strong>No Gaji</strong></td>
				<td><strong>Status</strong></td>
			</tr>
				
			@foreach($members as $ahli)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>
						<a href="{{ route('profileAhli', ['id' => $ahli->id]) }}" target="_blank"> {{ $ahli->nama }}</a>
					</td>
					<td>{{ $ahli->noPekerja }}</td>
					<td>
						@if($ahli->status == 1)
							<button class="btn btn-success"> AKTIF </button>
						@else
							<button class="btn btn-danger"> TIDAK AKTIF </button>
						@endif
					</td>
				</tr>
			@endforeach
			</table>


		</div>
	</div>
</div>