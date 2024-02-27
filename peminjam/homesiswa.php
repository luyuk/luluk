<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME SISWA</title>
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

      .book-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .book {
            margin: 8px;
            padding: 12px;
            border: 1px solid #ccc;
            background-color: white;
            text-align: center;
            width: 13%; /* Adjust as needed */
            border-radius: 10px;
            cursor: pointer;
        }

        .book-container a {
            width: 150px;
            height: auto;
            font-size: 15px;
            padding: 10px;

        }

        .book img {
            width: 140px;
            height: auto;
            border-radius: 10px;
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


        .kontain {
            left: 500px;
            padding-top: 50px;
            padding-left: 80px;
            padding-right: 80px;
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

            <form action="kategori.php">
                <button onclick="goToKategori()">Kategori Buku</button>

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

    <div>
        <section>
            <h2 class="judul">Rekomendasi Untuk Anda</h2>

            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "select * from buku");
            ?>
    
            <div class="book-container">
                <?php while ($d = mysqli_fetch_array($data)): ?>
                    <a class='book' href="detail.php?id=<?php echo $d['Id_Buku']; ?>">
                        <?php echo $d['Judul']; ?>
                        <?php
                        $blobData = $d['Cover'];
                        $base64Data = base64_encode($blobData);
                        $imageUrl = 'data:image/jpeg;base64,' . $base64Data;
                        echo '<img src="' . $imageUrl . '" alt="Gambar">';
                        ?>
                    </a>
                <?php endwhile; ?>
            </div>
    
        </section>
    </div>


</html>