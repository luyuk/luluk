<?php
$conn = mysqli_connect("localhost", "root", "", "perpus");

session_start();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil data pinjaman
$query_pinjaman = "SELECT * FROM peminjaman WHERE statuspeminjaman = 'belum dikembalikan'";
$stmt_pinjaman = $conn->prepare($query_pinjaman);

// Check if the query was successful
if (!$stmt_pinjaman) {
    die("Query failed: " . mysqli_error($conn));
}

$stmt_pinjaman->execute();
$result_pinjaman = $stmt_pinjaman->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pinjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous" rel="stylesheet">
    <style>
        body {
            background-image: url('../../assets/background.png');
            background-size: cover;
            background-position: center;
            margin: 0;
            /* Menetapkan margin menjadi 0 */
            padding: 0;
            /* Menetapkan padding menjadi 0 */
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .img-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .img-container img {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <a href="homeadmin.php" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <h2 style="text-align: center;">Daftar Pinjaman</h2>
        <div class="row">
            <?php
            while ($row_pinjaman = $result_pinjaman->fetch_assoc()) {
                // Ambil data pengguna berdasarkan ID pengguna
                $user_id = $row_pinjaman['userid'];
                $query_user = "SELECT * FROM user WHERE id = ?";
                $stmt_user = $conn->prepare($query_user);
                $stmt_user->bind_param("i", $user_id);

                // Check if the query was successful
                if (!$stmt_user) {
                    die("Query failed: " . mysqli_error($conn));
                }

                $stmt_user->execute();
                $result_user = $stmt_user->get_result();
                $user = $result_user->fetch_assoc();

                // Ambil data buku berdasarkan ID buku
                $buku_id = $row_pinjaman['bukuid'];
                $query_buku = "SELECT * FROM buku WHERE id = ?";
                $stmt_buku = $conn->prepare($query_buku);
                $stmt_buku->bind_param("i", $buku_id);

                // Check if the query was successful
                if (!$stmt_buku) {
                    die("Query failed: " . mysqli_error($conn));
                }

                $stmt_buku->execute();
                $result_buku = $stmt_buku->get_result();
                $buku = $result_buku->fetch_assoc();
                ?>
                <div class="col-md-4">
                    <div class="img-container">
                        <img src="../../imgDB/<?= $buku["cover"]; ?>" alt="Gambar Buku">
                    </div>
                    <h5>
                        <?= $buku['judul']; ?>
                    </h5>
                    <p><strong>ID User:</strong>
                        <?= $user['id']; ?>
                    </p>
                    <p><strong>Username User:</strong>
                        <?= $user['username']; ?>
                    </p>
                    <p><strong>Tanggal Peminjaman:</strong>
                        <?= $row_pinjaman['tanggal_peminjaman']; ?>
                    </p>
                    <p><strong>Tanggal Pengembalian:</strong>
                        <?= $row_pinjaman['tanggal_pengembalian']; ?>
                    </p>
                    <p><strong>Status:</strong>
                        <?= $row_pinjaman['status']; ?>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>