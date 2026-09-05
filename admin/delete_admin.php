<?php
include('../config/constants.php');

// Validate and sanitize the id parameter
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM tbl_admin WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['delete_admin'] = "Admin deleted successfully";
    } else {
        $_SESSION['delete_admin'] = "Failed to delete admin";
    }
    $stmt->close();
    header("Location: admin.php");
    exit();
} else {
    $_SESSION['delete_admin'] = "Invalid admin ID";
    header("Location: admin.php");
    exit();
}
