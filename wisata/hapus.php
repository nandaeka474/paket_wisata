<?php
include '../koneksi.php'; // Including database connection

// Handle delete request
if (isset($_GET['id_pesanan'])) {
    $id_pesanan = intval($_GET['id_pesanan']); // Sanitize input
    $delete_sql = "DELETE FROM pesanan WHERE id_pesanan = ?";
    
    // Prepare and execute the statement
    if ($stmt = $koneksi->prepare($delete_sql)) {
        $stmt->bind_param("i", $id_pesanan);
        if ($stmt->execute()) {
            header("Location: daftar_pesan.php?status=success"); // Redirect with success status
            exit();
        } else {
            echo "<script>alert('Error deleting record: " . htmlspecialchars($koneksi->error) . "'); window.location.href='daftar_pesan.php';</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Failed to prepare the delete statement'); window.location.href='daftar_pesan.php';</script>";
    }
} else {
    echo "<script>alert('No ID specified for deletion'); window.location.href='daftar_pesan.php';</script>";
}

mysqli_close($koneksi);
?>
