<?php
// Sertakan file konfigurasi database
$conn = mysqli_connect("localhost", "root", "", "perpus");

// Inisialisasi variabel pencarian
$query = "";
if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($conn, $_GET['query']);
}

// Inisialisasi $result
$result = null;

// Pastikan ada data user ID yang valid
if (isset($_GET['userid']) && is_numeric($_GET['userid'])) {
    $userid = $_GET['userid'];

    // Query untuk mengambil informasi buku, peminjaman, dan user berdasarkan user ID dan query pencarian
    $sql = "SELECT buku.Judul AS judul_buku, buku.Cover AS gambar_buku, peminjaman.id AS id_peminjaman, peminjaman.tanggalpeminjaman, peminjaman.tanggalpengembalian, peminjaman.statuspeminjaman
    FROM peminjaman
    INNER JOIN buku ON peminjaman.bukuid = buku.Id_Buku
    INNER JOIN user ON peminjaman.userid = user.id
    WHERE user.id = $userid";

    // Tambahkan kondisi pencarian jika query tidak kosong
    if (!empty($query)) {
        $sql .= " AND (buku.Judul LIKE '%$query%' OR buku.Penulis LIKE '%$query%' OR buku.Penerbit LIKE '%$query%')";
    }

    $result = mysqli_query($conn, $sql);
}

// Tutup koneksi database
mysqli_close($conn);
?>
