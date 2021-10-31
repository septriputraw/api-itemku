<!DOCTYPE html>
<html>
<head>
	<title>Data Transaksi</title>
</head>
<body>

	<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

	<h2><a href="?">Laravel</a></h2>
	<h3>Data Transaksi</h3>


	<p>Cari Data Transaksi :</p>
	<form action="/report/query" method="GET">
		<input type="text" name="query" placeholder="Cari Data .." value="{{ old('query') }}">
		<input type="submit" value="CARI">
	</form>
		
	<br/>

	<table border="1">
		<tr>
            <th>No</th>
			<th>Nama Barang</th>
			<th>Stok</th>
			<th>Jumlah Terjual</th>
			<th>Tanggal Transaksi</th>
            <th>Jenis Barang</th>
		</tr>
        <?php $id=1; ?>
		@foreach($report as $p)
		<tr>
            <td>{{ $id }}</td>
			<td>{{ $p->itemName }}</td>
			<td>{{ $p->qty }}</td>
			<td>{{ $p->sold }}</td>
			<td>{{ $p->dateTrx }}</td>
            <td>{{ $p->typeName }}</td>
		</tr>
        <?php $id++; ?>
		@endforeach
	</table>

	<br/>
	Halaman : {{ $report->currentPage() }} <br/>
	Jumlah Data : {{ $report->total() }} <br/>
	Data Per Halaman : {{ $report->perPage() }} <br/>


	{{ $report->links() }}


</body>
</html>