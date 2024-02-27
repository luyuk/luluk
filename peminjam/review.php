<?php
$conn=mysqli_connect("localhost","root","","perpus");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ulasanid = $_POST['ulasanid'];
    $userid = $_POST['userid'];
    $bukuid = $_POST['bukuid'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];
    $username = $_POST['username'];

    $sql = "INSERT INTO ulasanbuku (ulasanid, userid, bukuid, ulasan, rating, username) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $ulasanid, $userid, $bukuid, $ulasan, $rating, $username);
    $stmt->execute();

    echo "Review submitted successfully!";

    $stmt->close();
}
?>