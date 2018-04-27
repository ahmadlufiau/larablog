@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Data Komentar {{ $artikel->judul }}</div>
				<div class="card-body">
					<table class="table table-stripped table-hover">
						<thead align="center">
							<th>Nama</th>
							<th>Email</th>
							<th>Isi</th>
							<th colspan="2">Pilihan</th>
						</thead>
						<tbody>
							@foreach($artikel->komentars as $komentar)
							<tr>
								<td>{{ $komentar->nama }}</td>
								<td>{{ $komentar->email }}</td>
								<td>{{ $komentar->isi }}</td>
								<td><a href="" class="btn btn-warning">Edit</a></td>
								<td><input type="submit" class="btn btn-danger" value="Hapus"></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection