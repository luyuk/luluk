<?php
    session_start();
    $kon = mysqli_connect("localhost", "root", "", "perpus");
    //Memulai transaksi
    mysqli_query($kon,"START TRANSACTION");

    $query = mysqli_query($kon, "SELECT max(userid) as userid FROM peminjaman");
    $data = mysqli_fetch_array($query);
    $id_peminjaman = $data['userid'];
    $id_peminjaman++;
    $peminjamanid = sprintf("%05s", $id_peminjaman);
    $tanggalpeminjaaman=date('Y-m-d');
    $tanggalpengembalian=date('Y-m-d');
    $userid=$_SESSION['userid'];
    $bukuid=$_SESSION['bukuid'];
    $statuspeminjaman = $_POST['statuspeminjaman'];

    $simpan_tabel_peminjaman=mysqli_query($kon,"insert into peminjaman (peminjamanid, userid, bukuid, tanggalpeminjaman, tanggalpengembalian, statuspeminjaman)values (`$peminjamanid`, `$userid`, `$bukuid`, `$tanggalpeminjaman`, `$tanggalpengembalian`, `$statuspeminjaman`)");

    //Simpan detail transaksi
    if(!empty($_SESSION["cart_pustaka"])):
        foreach ($_SESSION["cart_pustaka"] as $item):
            $Id_Buku=$item['Id_Buku'];
            $simpan_tabel_detail=mysqli_query($kon,"insert into peminjaman (userid ,idbuku) values ('$userid','$bukuid')");
        endforeach;
    endif;

    if ($simpan_tabel_peminjaman and $simpan_tabel_detail) {
        //Jika semua query berhasil, lakukan commit
        mysqli_query($kon,"COMMIT");

        //Kosongkan kerangjang belanja
        unset($_SESSION["cart_pustaka"]);
        header("Location:homesiswa.php?page=usrid=$userid");
    }
    else {
        //Jika ada query yang gagal, lakukan rollback
        mysqli_query($kon,"ROLLBACK");

        //Kosongkan kerangjang pustaka
        unset($_SESSION["cart_pustaka"]);
        header("Location:homesiswa.php?page=add=gagal");
    }
?>