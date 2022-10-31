<?php 
	// koneksi ke database
	$db = mysqli_connect("localhost", "root", "", "jaki"); //database

	function query($query) {
		global $db;
		$result = mysqli_query($db, $query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}
	function tambahdata($data){
		global $db;
	$nama = $data["nama"];
    $kelas = $data["kelas"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $nis = $data["nis"];
    $nisn = $data["nisn"];
    $kelamin = $data["kelamin"];
    $provinsi = $data["provinsi"];
    $kota = $data["kab/kota"];
    $kecamatan = $data["kecamatan"];
    $kelurahan = $data["kelurahan"];
    $alamat = $data["alamat"];

	mysqli_query($db, "INSERT INTO siswa VALUES('', '$nama', '$kelas', '$tanggal_lahir', '$nis', '$nisn', '$kelamin', '$provinsi', '$kota', '$kecamatan', '$kelurahan', '$alamat')");
	return mysqli_affacted_rows($db);
	}
 ?>