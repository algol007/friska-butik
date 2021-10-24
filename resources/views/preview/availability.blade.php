<!DOCTYPE html>
<html>
<head>
	<title>Laporan Stok Barang Frisqa Butik</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<center>
			<h4>Laporan Stok Barang Frisqa Butik</h4>
		</center>
		<br/>
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Kategori</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($kodebarang as $kb)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$kb->kode_barang}}</td>
					<td>{{$kb->nama_barang}}</td>
					<td>{{$kb->kategori->nama_kategori}}</td>
					<td>Rp {{$kb->harga}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

</body>
</html>