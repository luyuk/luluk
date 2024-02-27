<?php
include 'koneksi.php';

// Check if 'id' is set and not empty
if (isset($_GET['Id_Buku']) && !empty($_GET['Id_Buku'])) {
    // Sanitize input to prevent SQL injection
    $Id_Buku = mysqli_real_escape_string($koneksi, $_GET['Id_Buku']);

    // Perform the delete query
    $query = "DELETE FROM buku WHERE Id_Buku='$Id_Buku'";
    $result = mysqli_query($koneksi, $query);

    // Check if the query was successful
    if ($result) {
        header("location:homeadmin.php?pesan=hapus");
    } 
}
?>