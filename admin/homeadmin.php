<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            color: #fff;
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

        .bg-dark {
            background-color: #343a40 !important;
        }

        .bg-warning {
            background-color: #ffc107 !important;
        }

        .bg-success {
            background-color: #28a745 !important;
        }

        .bg-danger {
            background-color: #dc3545 !important;
        }

        .text-dark-800 {
            color: #343a40;
        }

        .col-box {
            padding: 15px;
            flex: 100% ; /* Adjust the width as needed for four boxes in one line */
            max-width: 100%; /* Adjust the max-width as needed */
            box-sizing: border-box;
            margin-bottom: 20px; /* Added margin-bottom to create separation */
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: -15px; /* Adjust margin to remove spacing between cards */
        }

        .col-card {
            flex: 0 0 calc(25% - 30px); /* Adjust the width as needed */
            max-width: calc(25% - 30px); /* Adjust the max-width as needed */
            box-sizing: border-box;
            margin: 15px; /* Added margin to create separation */
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

     <div class="button">
             <?php
             $conn = mysqli_connect("localhost", "root", "", "perpus");
             $hasil=mysqli_query($conn,"select kode_peminjaman from detail_peminjaman");
            $total_peminjaman = mysqli_num_rows($hasil);   
            ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-dark text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-white text-uppercase mb-1">Total Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-dark-800"><?php echo $total_peminjaman;?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-grip-horizontal fa-2x text-dark-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            <?php 
                $hasil=mysqli_query($conn,"select kode_anggota from anggota");
                $jumlah_anggota = mysqli_num_rows($hasil);
            ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-white text-uppercase mb-1">Jumlah Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-dark-800"><?php echo $jumlah_anggota;?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-dark-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            <?php 
                $hasil=mysqli_query($conn,"select kode_pustaka from pustaka");
                $jumlah_pustaka = mysqli_num_rows($hasil);
            ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-white text-uppercase mb-1">Jumlah Pustaka</div>
                            <div class="h5 mb-0 font-weight-bold text-dark-800"><?php echo $jumlah_pustaka;?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-dark-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            <?php 
              
                $sql="select SUM(denda) as total_denda from detail_peminjaman";
            
                $hasil=mysqli_query($conn,$sql);
                $data = mysqli_fetch_array($hasil);       
            ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-white text-uppercase mb-1">Total Denda</div>
                            <div class="h5 mb-0 font-weight-bold text-dark-800">Rp. <?php echo number_format($data['total_denda'],0,',','.');?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-dark-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>


    <br />
    <table border="1">
        <tr>
            <th>Buku Id</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Deskripsi</th>
            <th>Cover</th>
            <th>Option</th>

        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from buku");
        while ($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $d['Judul']; ?>
                </td>
                <td>
                    <?php echo $d['Penulis']; ?>
                </td>
                <td>
                    <?php echo $d['Penerbit']; ?>
                </td>
                <td>
                    <?php echo $d['Tahun_Terbit']; ?>
                </td>
                <td>
                    <?php echo $d['Deskripsi']; ?>
                </td>
                <td class='cover'>
                    <?php
                    // Ambil data Blob dari variabel $d['cover']
                    $blobData = $d['Cover'];

                    // Konversi Blob menjadi base64 encoded string
                    $base64Data = base64_encode($blobData);

                    // Buat URL data untuk gambar
                    $imageUrl = 'data:image/jpeg;base64,' . $base64Data; // Ganti dengan jenis gambar yang sesuai
                
                    // Tampilkan gambar di HTML
                    echo '<img src="' . $imageUrl . '" alt="Gambar">';
                    ?>
                </td>


                <td>
                    <a href="edit.php?id=<?php echo $d['Id_Buku']; ?>">Edit</a>
                    <a href="delete.php?Id_Buku=<?php echo $d['Id_Buku']; ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>