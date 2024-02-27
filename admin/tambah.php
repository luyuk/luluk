<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>

<body>
    <h1>Daftar Buku</h1>

    <?php
    while ($row = mysqli_fetch_assoc($sql)) {
        echo "<div>";
        echo "<h3>" . $row['Judul'] . "</h3>";
        echo "<p>Penulis: " . $row['Penulis'] . "</p>";
        echo "<p>Deskripsi: " . $row['Deskripsi'] . "</p>";
        echo "<p>Penerbit: " . $row['Penerbit'] . "</p>";
        echo "<p>Tahun Terbit: " . $row['Tahun_Terbit'] . "</p>";

        // Tampilkan gambar cover buku jika tersedia
        if (!empty($row['Cover'])) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Cover']) . '" alt="Cover Buku">';
        }

        echo "</div>";
    }
    ?>

</body>

</html>