<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "perpus");

// Check connection
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memulai transaksi
mysqli_query($conn, "START TRANSACTION");

// Get the data from the form
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
$bukuid = isset($_POST['Id_Buku']) ? $_POST['Id_Buku'] : '';
$tanggalpeminjaman = date('Y-m-d');
$tanggalpengembalian = date('Y-m-d', strtotime($tanggalpeminjaman . ' + 7 days')); // Assuming 7 days for return

// Validate the existence of keys
if (!empty($userid) && !empty($bukuid)) {
    // Your existing code...

    $simpan_tabel_peminjaman = mysqli_query($conn, "INSERT INTO peminjaman (userid, bukuid, tanggalpeminjaman, tanggalpengembalian, statuspeminjaman) VALUES ('$userid', '$bukuid', '$tanggalpeminjaman', '$tanggalpengembalian', '$statuspeminjaman')");

    // Simpan detail transaksi
    if (!empty($_SESSION["cart_pustaka"])) {
        foreach ($_SESSION["cart_pustaka"] as $item) {
            $Id_Buku = isset($item['Id_Buku']) ? $item['Id_Buku'] : '';
            if (!empty($Id_Buku)) {
                $simpan_tabel_detail = mysqli_query($conn, "INSERT INTO detail_peminjaman (peminjamanid, bukuid) VALUES ('$peminjamanid', '$bukuid')");
            }
        }
    }

    // Your existing code...
}
// Your existing code...

?>