<?php
session_start();
?>

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
</style>

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

<div class="card mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Kode Peminjaman</th>
                        <th rowspan="2">Nama Anggota</th>
                        <th rowspan="2">Judul Pustaka</th>
                        <th colspan="2">Waktu Peminjaman</th>
                        <th rowspan="2">Status</th>
                    </tr>
                    <tr>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // include database
                    $conn = mysqli_connect("localhost", "root", "", "perpus");
                    $kondisi = "";

                    if (!empty($_POST["dari_tanggal"]) && empty($_POST["sampai_tanggal"]))
                        $kondisi = "where date(tanggal_pinjam)='" . $_POST['dari_tanggal'] . "' ";
                    if (!empty($_POST["dari_tanggal"]) && !empty($_POST["sampai_tanggal"]))
                        $kondisi = "where date(tanggal_pinjam) between '" . $_POST['dari_tanggal'] . "' and '" . $_POST['sampai_tanggal'] . "'";

                    // perintah sql untuk menampilkan laporan peminjaman jika level admin maka sistem hanya akan menampilkan transaksi yang dilakukan admin tersebut
                    if ($_SESSION["level"] == "Karyawan") {
                        $id_pengguna = $_SESSION["id_pengguna"];
                        $sql = "select p.kode_peminjaman,an.nama_anggota,pk.judul_pustaka,dp.tanggal_pinjam,dp.tanggal_kembali,dp.status
                                from peminjaman p
                                inner join anggota an  on an.kode_anggota=p.kode_anggota
                                inner join detail_peminjaman dp on dp.kode_peminjaman=p.kode_peminjaman
                                inner join pustaka pk on pk.kode_pustaka=dp.kode_pustaka
                                $kondisi and status!='0'
                                order by dp.tanggal_pinjam asc";
                    } else {
                        $sql = "select p.kode_peminjaman,an.nama_anggota,pk.judul_pustaka,dp.tanggal_pinjam,dp.tanggal_kembali,dp.status
                                from peminjaman p
                                inner join anggota an  on an.kode_anggota=p.kode_anggota
                                inner join detail_peminjaman dp on dp.kode_peminjaman=p.kode_peminjaman
                                inner join pustaka pk on pk.kode_pustaka=dp.kode_pustaka
                                $kondisi and status!='0'
                                order by dp.tanggal_pinjam asc";
                    }

                    $hasil = mysqli_query($conn, $sql); 
                    $no = 0;
                    $status = '';
                    $tanggal_kembali = "-";
                    //Menampilkan data dengan perulangan while
                    while ($data = mysqli_fetch_array($hasil)):
                        $no++;
                        if ($data['status'] == 0) {
                            $status = "<span class='badge badge-dark'>Belum diambil</span>";
                        } else if ($data['status'] == 1) {
                            $status = "<span class='badge badge-primary'>Sedang Dipinjam</span>";
                        } else if ($data['status'] == 2) {
                            $status = "<span class='badge badge-success'>Telah Selesai</span>";
                        } else if ($data['status'] == 3) {
                            $status = "<span class='badge badge-danger'>Batal</span>";
                        }


                        if ($data['tanggal_pinjam'] == '0000-00-00') {
                            $tanggal_pinjam = "";
                        } else {
                            $tanggal_pinjam = date("d/m/Y", strtotime($data['tanggal_pinjam']));
                        }
                        if ($data['tanggal_kembali'] == '0000-00-00') {
                            $tanggal_kembali = "";
                        } else {
                            $tanggal_kembali = date("d/m/Y", strtotime($data['tanggal_kembali']));
                        }
                        ?>
                        <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $data['kode_peminjaman']; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_anggota']; ?>
                            </td>
                            <td>
                                <?php echo $data['judul_pustaka']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tanggal_pinjam; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tanggal_kembali; ?>
                            </td>
                            <td>
                                <?php echo $status; ?>
                            </td>

                        </tr>
                        <!-- bagian akhir (penutup) while -->
                    <?php endwhile; ?>
                </tbody>
            </table>
            <a href="laporan/peminjaman/cetak-laporan.php?dari_tanggal=<?php if (!empty($_POST["dari_tanggal"]))
                echo $_POST["dari_tanggal"]; ?>&sampai_tanggal=<?php if (!empty($_POST["sampai_tanggal"]))
                      echo $_POST["sampai_tanggal"]; ?>"
                target='blank' class="btn btn-primary btn-icon-split"><span class="text"><i
                        class="fas fa-print fa-sm"></i> Cetak Invoice</span></a>
            <a href="laporan/peminjaman/cetak-pdf.php?dari_tanggal=<?php if (!empty($_POST["dari_tanggal"]))
                echo $_POST["dari_tanggal"]; ?>&sampai_tanggal=<?php if (!empty($_POST["sampai_tanggal"]))
                      echo $_POST["sampai_tanggal"]; ?>"
                target='blank' class="btn btn-danger btn-icon-pdf"><span class="text"><i
                        class="fas fa-file-pdf fa-sm"></i> Export PDF</span></a>
            <a href="laporan/peminjaman/cetak-excel.php?dari_tanggal=<?php if (!empty($_POST["dari_tanggal"]))
                echo $_POST["dari_tanggal"]; ?>&sampai_tanggal=<?php if (!empty($_POST["sampai_tanggal"]))
                      echo $_POST["sampai_tanggal"]; ?>"
                target='blank' class="btn btn-success btn-icon-pdf"><span class="text"><i
                        class="fas fa-file-excel fa-sm"></i> Export Excel</span></a>
        </div>
    </div>
</div>