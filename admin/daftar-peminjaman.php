<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B32423;
            margin: 0;
            padding: 0;
        }

        .button {
            margin: 15px;
            display: flex;
            justify-content: space-between;

        }

        .judul {
            color: #fff;
            text-align: center;
            padding-top: 20px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
            margin: 0px auto;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        th {
            background-color: #f2f2f2;
        }

        .cover img {
            width: 100px;
            /* Adjust the width as needed */
            height: auto;
            display: block;
            margin: auto;
        }

        td a {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            /* Adjust the color as needed */
            border-radius: 5px;
            margin-right: 5px;
        }

        td a:hover {
            background-color: #0056b3;
            /* Adjust the hover color as needed */
        }

        nav {
            background-color: #ffffff;
            padding: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 1260px;
            border: 3px solid #C39E5C;
        }

        .profile-logo {
            width: 25px;
            height: 25px;
            border-radius: 1%;
            padding-bottom: 8px;
            padding-right: 45px;
            cursor: pointer;

        }

        .profile-logo img {
            width: 45px;
            height: auto;
        }

        .search-bar {
            flex-grow: 1;
            left: 1000px;
            padding-top: 15px;
        }

        .search-input {
            width: 45%;
            padding: 15px;
            padding-right: 130px;
            border: none;
            border-radius: 30px;
            font-size: 13px;
            background-color: #D9D9D9;
            margin-left: 35px;
        }

        .search-icon {
            position: absolute;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            padding-top: 14px;
            right: 400px;
            width: 30px;
            height: 20px;
        }

        .search-bar img {
            width: 33px;
            padding: 10px;
        }

        p {
            width: 30%;
            margin-left: auto;
            margin-right: auto;
        }

        section button {
            padding: 10px 20px;
            font-size: 14px;
            background-color: #fff;
            color: rgb(0, 0, 0);
            border: none;
            border-radius: 20px;
            cursor: pointer;
            width: 310px;
            margin-bottom: 10px;
            /* Added margin-bottom */
        }

        button a {
            padding: 50px;
        }

        .pencet {
            background-color: #D9D9D9;
        }

        .logo-container {
            text-align: center;
            margin-top: 0px;

        }

        .logo-button {
            background: #ffffff;
            color: #ececec;
            border: none;
            cursor: pointer;
            font-size: 36px;
            display: inline-flex;
            align-items: center;
            font-family: sans-serif;
            text-align: center;
            padding: 5px;
            padding-bottom: 5px;
            font-family: sans-serif;
            font-weight: bold;
            stroke: black;
            stroke-width: 5px;
            text-shadow: 2px 2px 3px #B32423;
            text-decoration: none;
            -webkit-text-stroke: 2px #B32423;
            font-weight: 1000;
        }

        .logo-icon {
            width: 13px;
            margin-right: 35px;
            padding-top: 10px;
        }

        .logo-icon img {
            width: 33px;
            padding: 8px;
        }

        a {
            /*color: #fff;*/
            padding: 5px;
            text-decoration: none;
        }

        .cover {
            width: 20%;
            size: 20%;
        }

        .row {
            margin: 0;
        }

        .card {
            height: 100%;
        }

        .card-body {
            padding: 1rem;
        }

        .text-xs {
            font-size: 0.75rem;
        }

        .text-white {
            color: #fff;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .fa-2x {
            font-size: 2rem;
        }

    </style>
</head>

<body>

    <div>
        <nav>
            <div class="logo-container">
                <form action="homeadmin.php">
                    <button class="logo-button">
                        <span class="logo-icon"><img src="/ukk/img/logots.png"></span> TELLIBRARY
                    </button>
                </form>
            </div>

            <div class="search-bar">
                <div class="search-icon"><img src="/ukk/img/search.png"></div>
                <input type="text" class="search-input" placeholder="Search...">
            </div>

            <a class="profile-logo" href="/ukk/logout.php"><img src="/ukk/img/door.png"></a>
        </nav>
    </div>

    <div>
        <section class="button">
            <form action="add.html">
                <button onclick="goToFavorite()">Tambah Buku</button>

                <script>
                    function goToFavorite() {
                        window.location.href = "add.html";
                    }
                </script>
            </form>

            <form action="daftar-peminjaman.php">
                <button onclick="goToKategori()">Data Peminjaman</button>

                <script>
                    function goToKategori() {
                        window.location.href = "daftar-peminjaman.php";
                    }
                </script>
            </form>

            <form action="laporan.php">
                <button onclick="goToPeminjaman()">Laporan</button>

                <script>
                    function goToPeminjaman() {
                        window.location.href = "laporan.php";
                    }
                </script>
            </form>

        </section>
    </div>

      <div class="container mt-4">
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