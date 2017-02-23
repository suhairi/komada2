<div class="col-xs-5">
	<div class="panel panel-primary">
		<div class="panel-heading title">Keahlian Terkini</div>
		<div class="panel-body">
				
			<table class="table table-condensed">

			<tr>
				<td><strong>Nama</strong></td>
				<td><strong>No Gaji</strong></td>
			</tr>
				
			@foreach($members as $ahli)
				<tr>
					<td>
						<a href="{{ route('profileAhli', ['id' => $ahli->id]) }}" target="_blank"> {{ $ahli->nama }}</a>
					</td>
					<td>{{ $ahli->noPekerja }}</td>
				</tr>
			@endforeach
			</table>


		</div>
	</div>
</div>