@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-5">
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Carian (No Pekerja)</h4></div>
			<div class="panel-body">
				
				{!! Form::open() !!}
				<div class="form-group">
					{!! Form::text('noPekerja', '', ['class' => 'form-control', 'placeholder' => 'No Pekerja : 3374', 'required' => 'true']) !!}
					<br />
					{!! Form::submit('Carian', ['class' => 'btn btn-primary']) !!}
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-6">
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Keputusan Carian</h4></div>
			<div class="panel-body">
				<table class="table">
					<tr>
						<td><strong>Bil</strong></td>
						<td><strong>Nama</strong></td>
						<td><strong>No Pekerja</strong></td>
						<td><strong>Status</strong></td>
						<td><strong>Jawatan</strong></td>

					</tr>
					@foreach($members as $ahli)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>
								<a href="{{ route('profileAhli', ['id' => $ahli->id]) }}"> 
								{{ $ahli->nama }}
								</a>
							</td>
							<td>{{ $ahli->noPekerja }}</td>
							<td align="center">
								@if($ahli->perjawatan != null)
									{{ $ahli->perjawatan->jawatan }}
								@else
									<font color="red">-</font>
								@endif
							</td>
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
</div>


@endsection