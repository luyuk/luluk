<!DOCTYPE html>
<html>

<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .cover img {
            width: 100px; /* Adjust the width as needed */
            height: auto;
            display: block;
            margin: auto;
        }

        td a {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF; /* Adjust the color as needed */
            border-radius: 5px;
            margin-right: 5px;
        }

        td a:hover {
            background-color: #0056b3; /* Adjust the hover color as needed */
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

        .add {
            width: 80%;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        .submit {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 10px;
        }

    </style>
</head>

<body>

<div>
        <nav>
            <div class="logo-container">
                <form action="index.php">
                    <button class="logo-button">
                        <span class="logo-icon"><img src="/ukk/img/logots.png"></span> TELLIBRARY
                    </button>
                </form>
            </div>

            <div class="search-bar">
                <div class="search-icon"><img src="/ukk/img/search.png"></div>
                <input type="text" class="search-input" placeholder="Search...">
            </div>

            <a class="profile-logo" href="login.html"><img src="/ukk/img/door.png"></a>
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

            <form action="edit.php">
                <button onclick="goToKategori()">Edit Buku</button>

                <script>
                    function goToKategori() {
                        window.location.href = "edit.php";
                    }
                </script>
            </form>

            <form action="delete.html">
                <button class="pencet" onclick="goToPeminjaman()">Hapus Buku</button>

                <script>
                    function goToPeminjaman() {
                        window.location.href = "delete.html";
                    }
                </script>
            </form>

        </section>
    </div>

    <div class="judul">
        <h1>Edit Buku</h1>
    </div>
        
    <?php
        include "koneksi.php";

        $id = $_GET['id'];
        $query_mysql = mysqli_query($koneksi, "select * from buku where Id_Buku='$id'") or die(mysqli_error($koneksi));
        $nomor = 1;

        while ($data = mysqli_fetch_array($query_mysql)) {
    ?>

   
            <form class='add' action="update.php" method="post" enctype="multipart/form-data">
                
                    <label for="Cover">Book Cover:</label>
                    <input type="file" name="Cover" accept="image/*" value="<?php
                    // Ambil data Blob dari variabel $d['cover']
                    $blobData = $d['Cover'];
                    // Konversi Blob menjadi base64 encoded string
                    $base64Data = base64_encode($blobData);

                    // Tampilkan gambar di HTML
                    echo '<img src="' . $imageUrl . '" alt="Gambar">';
                    ?>">
                
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" value="<?php echo $data['Judul'] ?>">
                
                    <label for="Penulis">Penulis:</label>
                    <input type="text" name="Penulis" value="<?php echo $data['Penulis'] ?>">
                
                    <label for="Penerbit">Penerbit:</label>
                    <input type="text" name="Penerbit" value="<?php echo $data['Penerbit'] ?>">
                
                    <label for="Tahun_Terbit">Tahun Terbit:</label>
                    <input type="date" name="Tahun_Terbit" value="<?php echo $data['Tahun_Terbit'] ?>">
                
                    <label for="Deskripsi">Deskripsi:</label>
                    <textarea name="Deskripsi" rows="4"><?php echo $data['Deskripsi'] ?></textarea>
                
                    <input class='submit' type="submit" name="submit" value="Submit">

                </form>
        <?php } ?>

</body>

</html>