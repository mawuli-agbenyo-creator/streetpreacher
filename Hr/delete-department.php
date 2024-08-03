<?php
include('../inc/topbar.php'); // Ensure this includes the database connection setup
if(empty($_SESSION['admin-username'])) {
    header("Location: login.php");
    exit();
}

if(isset($_GET['id'])) {
    $department_id = intval($_GET['id']);

    try {
        // Check if the default database connection from topbar.php is available
        if (!$dbh) {
            throw new Exception("Database connection not available.");
        }

        // Prepare and execute the delete statement
        $stmt = $dbh->prepare("DELETE FROM departments WHERE id = :id");
        $stmt->bindParam(':id', $department_id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect with a success message
        header("Location: list_departments.php?msg=Department+deleted+successfully");
        exit();
    } catch (Exception $e) {
        // Redirect with an error message
        header("Location: list_departments.php?msg=Error+deleting+department");
        exit();
    }
} else {
    // Redirect if no ID is provided
    header("Location: list_departments.php?msg=No+department+ID+provided");
    exit();
}
?>
