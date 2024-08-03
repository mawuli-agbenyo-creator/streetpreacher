<?php
include('../inc/topbar.php');
if (empty($_SESSION['admin-username'])) {
    header("Location: login.php");
    exit();
}

try {
    // Retrieve all training records
    $stmt = $dbh->query("SELECT * FROM training");
    $trainings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "Database error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Training | <?php echo $sitename; ?></title>
    <!-- Include CSS files here -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar and Sidebar code here -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">List Training</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List Training</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <?php
                if (isset($success_message)) {
                    echo '<div class="alert alert-success">' . $success_message . '</div>';
                }
                if (isset($error_message)) {
                    echo '<div class="alert alert-danger">' . $error_message . '</div>';
                }
                ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Training Records</h3>
                                <a href="add_training.php" class="btn btn-primary float-right">Add New Training</a>
                            </div>

                            <div class="card-body">
                                <table id="trainingTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($trainings as $training): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($training['id']); ?></td>
                                                <td><?php echo htmlspecialchars($training['name']); ?></td>
                                                <td><?php echo htmlspecialchars($training['start_date']); ?></td>
                                                <td><?php echo htmlspecialchars($training['end_date']); ?></td>
                                                <td>
                                                    <a href="edit_training.php?id=<?php echo htmlspecialchars($training['id']); ?>" class="btn btn-warning">Edit</a>
                                                    <a href="delete_training.php?id=<?php echo htmlspecialchars($training['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this training?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block"></div>
        <?php include('../inc/footer.php'); ?>
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- Include JS files here -->
</body>
</html>
