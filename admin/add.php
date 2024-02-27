<?php
$conn = mysqli_connect("localhost", "root", "", "perpus");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$Judul = $_POST['Judul'];
$Penulis = $_POST['Penulis'];
$Deskripsi = $_POST['Deskripsi'];
$Penerbit = $_POST['Penerbit'];
$Tahun_Terbit = $_POST['Tahun_Terbit'];
$Cover = ''; // Inisialisasi variabel Cover

if ($_FILES['Cover']['error'] == 0) {
    $cover_tmp = $_FILES['Cover']['tmp_name'];
    $cover_name = $_FILES['Cover']['name'];
    $Cover = addslashes(file_get_contents($cover_tmp));
}

$sql = mysqli_query($conn, "INSERT INTO buku (Judul, Penulis, Deskripsi, Penerbit, Tahun_Terbit, Cover) VALUES ('$Judul', '$Penulis', '$Deskripsi', '$Penerbit', '$Tahun_Terbit', '$Cover')");

if ($sql) {
    header("location:add.html");
}

mysqli_close($conn);
?>