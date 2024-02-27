<?php
class Kategori{
    var $koneksi;
    var $base_url;
    var $table='tb_produk_kategori';
 
    function __construct($koneksi, $base_url){
        $this->koneksi=$koneksi;
        $this->base_url=$base_url;
    }
   
    function getAllData(){
        $no = 0;
        $data = mysqli_query($this->koneksi,"select * from $this->table order by nama asc");
        while($d = mysqli_fetch_array($data)){
            $result[$no]=$d;
            $no++;
        }
        return $result;
    }
 
    function getNama($id){
        $data = mysqli_query($this->koneksi,"select nama from $this->table where id='$id'");
        $d = mysqli_fetch_array($data);
        return $d['nama'];
    }
}
?>