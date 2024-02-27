<?php

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "perpus");

// Check connection
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Get data from the form
$Id_Buku = mysqli_real_escape_string($conn, $_POST['Id_Buku']);
$Judul = mysqli_real_escape_string($conn, $_POST['Judul']);
$Penulis = mysqli_real_escape_string($conn, $_POST['Penulis']);
$Penerbit = mysqli_real_escape_string($conn, $_POST['Penerbit']);
$Tahun_Terbit = mysqli_real_escape_string($conn, $_POST['Tahun_Terbit']);
$Deskripsi = mysqli_real_escape_string($conn, $_POST['Deskripsi']);
$Cover = mysqli_real_escape_string($conn, $_POST['Cover']);

$sql = "UPDATE buku SET Judul='$Judul', Penulis='$Penulis', Penerbit='$Penerbit', Tahun_Terbit='$Tahun_Terbit', Deskripsi='$Deskripsi', Cover='$Cover' WHERE Id_Buku='$Id_Buku'";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:homeadmin.php?pesan=update");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>