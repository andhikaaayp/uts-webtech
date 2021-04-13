<?php
//data database
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cart";
//Koneksi ke database
$db = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
//Ambil dari data karyawan/query data
$result = mysqli_query($db, "SELECT * FROM pesanan");
//Mengecek apakah mengambil dari table database yang benar
if ( !$result ){
    echo mysqli_error ($db);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Duniaheadset</title>
    <style type="text/css">
        h1 {
        background-color:black;
        color:white;
        }
    </style>
</head>
<body>
    <h1>Daftar Pesanan</h1>
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Kode Pos</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>No Telepon</th>
    </tr>
    <?php $i = 1; ?>
    <?php while($row = mysqli_fetch_assoc($result)):?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["alamat"]; ?></td>
        <td><?= $row["kpos"]; ?></td>
        <td><?= $row["nproduk"]; ?></td>
        <td><?= $row["jumlah"]; ?></td>
        <td><?= $row["telepon"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endwhile;?>
    </table>
</body>
</html>