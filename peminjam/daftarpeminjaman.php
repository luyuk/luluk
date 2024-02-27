<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
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
            justify-content: space-around;
            max-width: fit-content;
            padding-left: 20px;
            margin-top: 10px;
        } 

        .book {
            margin: 8px;
            padding: 50px;
            border: 1px solid #ccc;
            background-color: white;
            text-align: center;
            width: 140px;
            border-radius: 10px;
            cursor: pointer;
        }

        .book p {
            width: 150px;
            height: auto;
            font-size: 15px;

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

        .pencet{
            background-color:#D9D9D9;
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

            <a class="profile-logo" href="login.html"><img src="/ukk/img/door.png"></a>
        </nav>
    </div>

    <div>
        <section class="button">
            <form action="favorite.html">
                <button onclick="goToFavorite()">Buku Favorit</button>

                <script>
                    function goToFavorite() {
                        window.location.href = "favorite.html";
                    }
                </script>
            </form>
            
            <form action="kategori.html">
                <button onclick="goToKategori()">Kategori Buku</button>

                <script>
                    function goToKategori() {
                        window.location.href = "kategori.html";
                    }
                </script>
            </form>
            
            <form action="pinjaman.html">
                <button class="pencet" onclick="goToPeminjaman()">Buku Pinjaman</button>

                <script>
                    function goToPeminjaman() {
                        window.location.href = "pinjaman.html";
                    }
                </script>
            </form>
            
        </section>
    </div>

<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpus");
?>
    
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #212529; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <h4>BUKU</h4>
    <hr>
    <div class="d-flex">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Peminjaman</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Gambar Buku</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Kembalikan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userTemp = isset($_GET['userid']) ? $_GET['userid'] : die("User ID not provided");
                $query = mysqli_query($con, "SELECT * FROM user INNER JOIN Peminjaman on user.id=peminjaman.id INNER JOIN buku on peminjaman.bukuid=buku.Id_Buku where user.id='$userTemp'") or
                    die(mysqli_error($con));
                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data buku</td> </tr>';
                } else {
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                        if( $data['status']  == "Sudah Dikembalikan"){
                            echo '
                            <tr>
                            <th scope="row">' . $no . '</th>
                            <td>' . $data['id'] . '</td>
                            <td>' . $data['Judul'] . '</td>
                            <td>' . $data['username'] . '</td>
                            <td> <img src="../gambu/'.$data['Cover'].'" style="width:100px; height:150px; "> </td>
                            <td>' . $data['statuspeminjaman'] . '</td>
                            <td>' . $data['tanggalpeminjaman'] . '</td>
                            <td>' . $data['tanggalpengembalian'] . '</td>
                            
                            
                            
                            </tr>';
                        }else{
                            echo '
                            <tr>
                            <th scope="row">' . $no . '</th>
                            <td>' . $data['id'] . '</td>
                            <td>' . $data['Judul'] . '</td>
                            <td>' . $data['username'] . '</td>
                            <td> <img src="../gambu/'.$data['Cover'].'" style="width:100px; height:150px;"> </td>
                            <td>' . $data['statuspeminjaman'] . '</td>
                            <td>' . $data['tanggalpeminjaman'] . '</td>
                            <td>' . $data['tanggalpengembalian'] . '</td>
                            
                            
                            <td>
                                <a href="../process/updateBukuPinjamProcess_user.php?id=' . $data['id'] . '">
                                    <i style="color: #212529" class="fa fa-minus fa-2x"></i>
                                </a>
                            </td>
                            </tr>';
                        }

                        
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</aside>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>

</html>