<?php
//menuliskan data input variabel
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$kode_pos = $_POST['kpos'];
$nama_produk = $_POST['nproduk'];
$jumlah = $_POST['jumlah'];
$no_telepon = $_POST['telepon'];
//memastikan kolom di bawah ini tidak boleh kosong
if (!empty($nama) || !empty($email) || !empty($alamat) || !empty($kode_pos) || 
    !empty($nama_produk) || !empty($jumlah) || !empty($no_telepon)) {
    //data database
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "cart";

    //membuat koneksi
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    //mengecek apakah terjadi error koneksi
    if (mysqli_connect_error()) {
        die('Connect error ('. mysqli_connect_errorno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email FROM pesanan WHERE email = ? Limit 1";
        $INSERT = "INSERT INTO pesanan (nama, email, alamat, kpos, nproduk, jumlah, telepon)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        //Persiapan statement
        $stmt = $conn -> prepare($SELECT);
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt -> bind_result ($email);
        $stmt -> store_result();
        $rnum = $stmt -> num_rows;

        if ($rnum==0){
            $stmt -> close();

            $stmt = $conn->prepare($INSERT);
            $stmt -> bind_param("sssisii", $nama, $email, $alamat, $kode_pos, $nama_produk, $jumlah, $no_telepon);
            $stmt -> execute();
            echo "Data Anda berhasil masuk ke sistem kami. 
                  Admin kami akan menghubungi Anda via WA untuk konfirmasi pembayaran";
        } else {
            echo "Data Anda gagal masuk ke sistem kami";
        }
        $stmt -> close();
        $conn -> close();
    }
} else {
    echo "Semua field harus diisi";
    die();
}
?>