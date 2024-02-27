<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    // cek peran (role) dari user
    if ($data['role'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location: admin/homeadmin.php");

    } else if ($data['role'] == "peminjam") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "peminjam";
        // alihkan ke halaman dashboard peminjam
        header("location: peminjam/homesiswa.php");

    } else if ($data['role'] == "pengurus") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "pengurus";
        // alihkan ke halaman dashboard pengurus
        header("location: halaman_pengurus.php");
        
    } else {
        // alihkan ke halaman login kembali
        header("location: login.php?pesan=gagal");
    }
} else {
    header("location: login.php?pesan=gagal");
}
?>