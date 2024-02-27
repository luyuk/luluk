<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'perpus');

// Fungsi untuk melakukan pencarian buku
function searchBooks($conn, $query)
{
    $query = mysqli_real_escape_string($conn, $query);
    $query = "SELECT buku.*, IFNULL(ulasan.rating, 0) AS rating, GROUP_CONCAT(kategori.namakategori SEPARATOR ', ') AS kategori_nama
              FROM buku
              LEFT JOIN kategoribuku_relasi ON buku.id = kategoribuku_relasi.bukuid
              LEFT JOIN kategori ON kategori.id = kategoribuku_relasi.kategori_id
              LEFT JOIN ulasan_buku ulasan ON buku.id = ulasan.buku_id
              WHERE buku.Judul LIKE '%$query%' 
                OR buku.Penulis LIKE '%$query%'
                OR kategori.namakategori LIKE '%$query%'
              GROUP BY buku.id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return false;
    }
}


// Proses pencarian jika form dikirimkan
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $buku_perpus = searchBooks($conn, $keyword);
} else {
    // Jika tidak ada pencarian, tampilkan semua buku
    $buku_perpus = mysqli_query($conn, "SELECT * FROM buku");
    // Jika tombol kategori diklik, sesuaikan query SQL untuk mengambil buku berdasarkan kategori
    if (isset($_POST['novel'])) {
        $buku_perpus = mysqli_query($conn, "SELECT buku.*, kategori.nama_kategori FROM buku 
                                        JOIN kategori_buku_relasi ON buku.id = kategori_buku_relasi.buku_id 
                                        JOIN kategori ON kategori_buku_relasi.kategori_id = kategori.id 
                                        WHERE kategori.nama_kategori = 'Novel'");
    } elseif (isset($_POST['kamus'])) {
        $buku_perpus = mysqli_query($conn, "SELECT buku.*, kategori.nama_kategori FROM buku 
                                        JOIN kategori_buku_relasi ON buku.id = kategori_buku_relasi.buku_id 
                                        JOIN kategori ON kategori_buku_relasi.kategori_id = kategori.id 
                                        WHERE kategori.nama_kategori = 'Kamus'");
    } elseif (isset($_POST['dongeng'])) {
        $buku_perpus = mysqli_query($conn, "SELECT buku.*, kategori.nama_kategori FROM buku 
                                        JOIN kategori_buku_relasi ON buku.id = kategori_buku_relasi.buku_id 
                                        JOIN kategori ON kategori_buku_relasi.kategori_id = kategori.id 
                                        WHERE kategori.nama_kategori = 'Dongeng'");
    } elseif (isset($_POST['komik'])) {
        $buku_perpus = mysqli_query($conn, "SELECT buku.*, kategori.nama_kategori FROM buku 
                                        JOIN kategori_buku_relasi ON buku.id = kategori_buku_relasi.buku_id 
                                        JOIN kategori ON kategori_buku_relasi.kategori_id = kategori.id 
                                        WHERE kategori.nama_kategori = 'Komik'");
    } elseif (isset($_POST['ilmupengetahuan'])) {
        $buku_perpus = mysqli_query($conn, "SELECT buku.*, kategori.nama_kategori FROM buku 
                                        JOIN kategori_buku_relasi ON buku.id = kategori_buku_relasi.buku_id 
                                        JOIN kategori ON kategori_buku_relasi.kategori_id = kategori.id 
                                        WHERE kategori.nama_kategori = 'Ilmu Pengetahuan'");
    } else {
        // Jika tidak ada tombol kategori yang diklik, tampilkan semua buku
        $buku_perpus = mysqli_query($conn, "SELECT buku.*, GROUP_CONCAT(kategori.nama_kategori SEPARATOR ', ') AS kategori_nama 
                                        FROM buku 
                                        LEFT JOIN kategori_buku_relasi ON buku.id = kategori_buku_relasi.buku_id 
                                        LEFT JOIN kategori ON kategori_buku_relasi.kategori_id = kategori.id 
                                        GROUP BY buku.id");
    }

    // Pastikan untuk menyesuaikan query dengan nama kategori yang sesuai dengan data di database Anda

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Buku</title>
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

        nav {
            background-color: #ffffff;
            padding: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
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
            width: 46%;
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
            transform: translateY(-50%);
            cursor: pointer;
            padding-top: 14px;
            right: 40%;
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
            padding: 5% 20px;
            font-size: 14px;
            background-color: #fff;
            color: rgb(0, 0, 0);
            border: none;
            border-radius: 20px;
            cursor: pointer;
            width: 310px;
            margin: 0 auto;
    
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

        .tombol-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center horizontally */
            padding: 40px 170px;
        }

        .tombol button {
            margin-bottom: 10px;
            padding: 10px;
        }
    </style>

</head>

<body>

    <div>
        <nav>
            <div class="logo-container">
                <form action="homesiswa.php">
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
            <form action="favorite.php">
                <button onclick="goToFavorite()">Buku Favorit</button>
                <script>
                    function goToFavorite() {
                        window.location.href = "favorite.php";
                    }
                </script>
            </form>

            <form action="kategori.php-">
                <button class="pencet" onclick="goToKategori()">Kategori Buku</button>
                <script>
                    function goToKategori() {
                        window.location.href = "kategori.php";
                    }
                </script>
            </form>

            <form action="pinjaman.php">
                <button onclick="goToPeminjaman()">Buku Pinjaman</button>
                <script>
                    function goToPeminjaman() {
                        window.location.href = "pinjaman.php";
                    }
                </script>
            </form>

        </section>
    </div>

    <!-- tombol buku -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color:rgb(254, 235, 254);">
    <nav class="navbar-atas">
        <div class="logo">
            <img src="gambar/logo.png " style=" width: 7%;">
            <p>Asri Library</p>
        </div>
    </nav>



    <nav class="navbar-bawah">
        <button class="home" style="background-color:rgb(126, 80, 136); margin-top: 10px; ">
            <a href="home.php" class="btn" style="font-size: 30px;  ">
                <img src="gambar/kembali.png" style="width: 70px; height: 50px;">
            </a>
        </button>
    </nav>


    <form class="d-flex" role="search" action="" method="post">
        <input class="form-control me-2" type="search" placeholder="Cari.." name="keyword" id="keyword"
            style="border: 1px solid black;">
        <button class="btn btn-outline-success" type="submit" name="search" style="border: 1px solid black;  "><img
                src="/img/pencarian.png" alt=""></button>
    </form>



    <!--Btn filter data kategori buku-->
    <div class="d-flex gap-2 mt-4 justify-content-center">
        <form action="" method="post">
            <div class="layout-card-custom">
                <button class="btn btn-dark" type="submit">Semua</button>
                <button type="submit" name="novel" class="btn btn-outline-dark"
                    style="width: 180px; height: 40px;">Novel</button>
                <button type="submit" name="kamus" class="btn btn-outline-dark"
                    style="width: 180px; height: 40px;">Kamus</button>
                <button type="submit" name="dongeng" class="btn btn-outline-dark"
                    style="width: 180px; height: 40px;">Dongeng</button>
                <button type="submit" name="komik" class="btn btn-outline-dark"
                    style="width: 180px; height: 40px;">Komik</button>
                <button type="submit" name="ilmupengetahuan" class="btn btn-outline-dark"
                    style="width: 180px; height: 40px;">Ilmu Pengetahuan</button>
            </div>
        </form>
    </div> <br>
    <div class="row ">

        <?php foreach ($buku_perpus as $d): ?>
            <div class="card" style="width: 19rem;">
                <img src="../admin/gambar/<?= $d["gambar"]; ?>" class="card-img-top" alt="" height="210px;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $d["judul"]; ?>
                    </h5>
                </div>
                <ul class="list-group list-group-flush" style="font-size: 14px;">

                    <li class="list-group-item">Penulis :
                        <?= $d["penulis"]; ?>
                    </li>
                    <li class="list-group-item">Penerbit :
                        <?= $d["penerbit"]; ?>
                    </li>

                </ul>


                <div class="card-body">
                    <a class="btn" style="background-color:  rgb(183, 139, 190); color: white; margin-left: 45px;"
                        href="detail-buku.php?id=<?php echo $d['id']; ?>">Lihat Selengkapnya</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>

</body>

</html>