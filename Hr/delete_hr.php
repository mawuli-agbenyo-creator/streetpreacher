<?php
include('../inc/topbar.php');
if (empty($_SESSION['admin-username'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? null;

if ($id) {
    try {
        // Prepare SQL statement to delete the HR record
        $stmt = $dbh->prepare("DELETE FROM hr WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            $success_message = "HR record deleted successfully!";
        } else {
            $error_message = "Error deleting HR record.";
        }
    } catch (PDOException $e) {
        $error_message = "Database error: " . $e->getMessage();
    }
} else {
    $error_message = "Invalid request. HR ID is missing.";
}

// Redirect to the list page
header("Location: list_hr.php");
exit();
?>
