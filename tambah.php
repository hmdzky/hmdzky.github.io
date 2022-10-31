<?php 
require 'function.php';
// koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "jaki");

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    if(tambahdata($_POST) > 0 ) {
        echo "<script>
            alert('Data Berhasil di Tambahkan');
            document.location.htrf = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal di Tambahkan');
        document.location.htrf = 'index.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<body>
    <h1>Tambah Data Siswa</h1>

    <form action="" method="post" class="form">
        <fieldset>
            <legend>Tambah Data</legend>
                <ul>
                    <li>
                        <label for="nama">Nama : </label><br>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required>
                    </li>
                    <li>
                        <label for="kelas">Kelas : </label><br>
                        <input type="number" name="kelas" id="kelas" placeholder="Masukkan Kelas" required>
                    </li>
                    <li>
                        <label for="tanggal_lahir">Tanggal Lahir : </label><br>
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" required>
                    </li>
                    <li>
                        <label for="nis">NIS : </label><br>
                        <input type="number" name="nis" id="nis" placeholder="Nomor Induk Siswa" required>
                    </li>
                    <li>
                        <label for="nisn">NISN : </label><br>
                        <input type="number" name="nisn" id="nisn" placeholder="Nomor Induk Siswa" required>
                    </li>
                    <li>
                        <label for="kelamin">Kelamin : </label><br>
                        <select name="kelamin" id="kelamin">
                            <option value="">-Jenis Kelamin-</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                    </li>
                    <li>
                        <label for="provinsi">Provinsi : </label><br />
                        <select name="provinsi" id="provinsi">
                            <option>Provinsi</option>
                        </select>
                    </li>
                    <li>
                        <label for="kota">Kab/Kota : </label><br />
                        <select name="kab/kota" id="kota">
                            <option>Kota/Kabupaten</option>
                        </select>
                    </div>
                    </li>
                    <li>
                        <label for="Kecamatan">Kecamatan : </label><br />
                        <select name="kecamatan" id="kecamatan">
                            <option>Kecamatan</option>
                        </select>
                    </li>
                    <li>
                        <label for="Kelurahan">Kelurahan : </label><br />
                        <select name="kelurahan" id="kelurahan">
                            <option>Kelurahan</option>
                        </select>
                    </li>
                    <li>
                        <label for="alamat">Masukkan Alamat : </label><br>
                        <input type="text" name="alamat" id="alamat" placeholder="Alamat" required>
                    </li>
                    <br>
                        <button type="submit" name="submit">Tambah Siswa</button>
            </fieldset>
        </ul>
    </form>
    <script>
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
            .then((response) => response.json())
            .then((provinces) => {
                var data = provinces;
                var tampung = `<option>Pilih</option>`;
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("provinsi").innerHTML = tampung;
            });
    </script>
    <script>
        const selectProvinsi = document.getElementById('provinsi');
        const selectKota = document.getElementById('kota');
        const selectKecamatan = document.getElementById('kecamatan');
        const selectKelurahan = document.getElementById('kelurahan');

        selectProvinsi.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                .then((response) => response.json())
                .then((regencies) => {
                    var data = regencies;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kota').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kota").innerHTML = tampung;
                });
        });

        selectKota.addEventListener('change', (e) => {
            var kota = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
                .then((response) => response.json())
                .then((districts) => {
                    var data = districts;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kecamatan").innerHTML = tampung;
                });
        });
        selectKecamatan.addEventListener('change', (e) => {
            var kecamatan = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
                .then((response) => response.json())
                .then((villages) => {
                    var data = villages;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kelurahan").innerHTML = tampung;
                });
        });
    </script>
</body>
</html>