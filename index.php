<?php 
require 'function.php';
$siswa = query("SELECT * FROM siswa");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1 style="text-align: center;">Daftar Siswa</h1>
<a href="tambah.php">Tambah Data Siswa</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0" align="center">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Tanggal Lahir</th>
		<th>Nomor Induk Siswa (NIS)</th>
		<th>Nomor INduk Siswa Nasional (NISN)</th>
		<th>Kelamin</th>
		<th>Provinsi</th>
		<th>Kabupaten/Kota</th>
		<th>Kelurahan</th>
		<th>Alamat</th>
	</tr>
	<?php ($i = 1) ?>
	<?php foreach( $siswa as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="">Edit</a> |
				<a href="">Delete</a>
			</td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["kelas"]; ?></td>
			<td><?= $row["tanggal_lahir"]; ?></td>
			<td><?= $row["nis"]; ?></td>
			<td><?= $row["nisn"]; ?></td>
			<td><?= $row["kelamin"]; ?></td>
			<td><?= $row["provinsi"]; ?></td>
			<td><?= $row["kab/kota"]; ?></td>
			<td><?= $row["kelurahan"]; ?></td>
			<td><?= $row["alamat"]; ?></td>
		</tr>
	<?php $i++ ?>
	<?php endforeach; ?>
</table>
</body>
</html>