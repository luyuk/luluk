<?php
$con = mysqli_connect("localhost", "root", "", "perpus");

$id = $_GET['id'];

$data_buku_query = mysqli_query($con, "SELECT * FROM buku WHERE Id_Buku='$id'") or die(mysqli_error($con));
$data_buku = mysqli_fetch_array($data_buku_query);

$data_peminjaman_cek = mysqli_query($con, "SELECT * FROM peminjaman WHERE bukuid='$id' AND statuspeminjaman='Belum Dikembalikan'") or die(mysqli_error($con));

$data_peminjaman_query = mysqli_query($con, "SELECT * FROM peminjaman WHERE bukuid='$id'") or die(mysqli_error($con));
$data_peminjaman = mysqli_fetch_array($data_peminjaman_query);

$id_buku_cek = isset($data_peminjaman['bukuid']) ? $data_peminjaman['bukuid'] : null;
$status_cek = isset($data_peminjaman['statuspeminjam']) ? $data_peminjaman['statuspeminjam'] : null;

// Define variables with appropriate values
$statuspeminjaman = "some_status";
$tanggalpengembalian = "some_date";
$tanggalpeminjaman = "some_date";
$peminjamanid = "some_id";
$bukuid = $id; // Using the book ID from the URL
$userid = $_SESSION["user_id"];

// Define $some_condition based on your logic
$some_condition = true; // Replace with your condition

if ($some_condition) {
    $query = mysqli_query($con, "INSERT INTO peminjaman (peminjamanid, userid, bukuid, tanggalpeminjaman, tanggalpengembalian, statuspeminjaman) VALUES ('$peminjamanid', '$userid', '$bukuid', '$tanggalpeminjaman', '$tanggalpengembalian', '$statuspeminjaman')") or die(mysqli_error($con));

    $queryCheck = mysqli_query($con, "SELECT * FROM user INNER JOIN peminjaman on user.id=peminjaman.peminjamanid INNER JOIN buku on peminjaman.bukuid=buku.Id_Buku WHERE Id_Buku='$id'") or die(mysqli_error($con));

    if ($query) {
        echo '<script>alert("Peminjaman Buku Berhasil"); window.location = "daftarpeminjaman.php"</script>';
    } else {
        echo '<script>alert("Register Failed");</script>';
    }
}
?>
