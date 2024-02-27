<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "perpus");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $buku_id = $_GET['id'];

    // Retrieve book details from the database based on the given ID
    $query_buku = "SELECT * FROM buku WHERE Id_Buku = ?";
    $stmt_buku = $conn->prepare($query_buku);
    $stmt_buku->bind_param("i", $buku_id);

    if ($stmt_buku->execute()) {
        $result_buku = $stmt_buku->get_result();
        $book = $result_buku->fetch_assoc();

        if ($book) {
            // Add the selected book to the user's borrowing cart (session)
            $cart_item = array(
                'Id_Buku' => $book['Id_Buku'],
                'Judul' => $book['Judul'],
                'Penulis' => $book['Penulis'],
                // Add other book details as needed
            );

            if (!isset($_SESSION['cart_pustaka'])) {
                $_SESSION['cart_pustaka'] = array();
            }

            $_SESSION['cart_pustaka'][] = $cart_item;

            // Optionally, you can redirect the user to a confirmation page
            header("Location: confirmation.php");
            exit;
        } else {
            echo "Book not found.";
        }
    } else {
        echo "Error executing book query: " . $stmt_buku->error;
    }
} else {
    echo "Invalid book ID.";
}

$stmt_buku->close();
mysqli_close($conn);
?>