<?php
$conn = mysqli_connect("localhost", "root", "", "perpus");

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =$_POST['password'];
    $address = $_POST['address'];
    $role="peminjam";

    $sql =mysqli_query($conn, "INSERT INTO user (username, email, password,address,fullname,role) VALUES ('$username', '$email', '$password','$address','$fullname','$role')");

    if($sql){
    header("location:peminjam/homesiswa.php");
    }

?>
