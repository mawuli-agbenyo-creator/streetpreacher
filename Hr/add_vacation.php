<?php
include('../inc/topbar.php');
if(empty($_SESSION['admin-username'])) {
  header("Location: login.php");
  exit();
}

try {
  // Fetch employees to populate the dropdown
  $stmt = $dbh->prepare("SELECT id, fullname FROM tblemployee ORDER BY fullname ASC");
  $stmt->execute();
  $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  $error_message = "Database error: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $employee_id = $_POST['employee_id'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $status = $_POST['status'];

  if (!empty($employee_id) && !empty($start_date)) {
    try {
      $stmt = $dbh->prepare("INSERT INTO vacations (employee_id, start_date, end_date, status) VALUES (:employee_id, :start_date, :end_date, :status)");
      $stmt->bindParam(':employee_id', $employee_id);
      $stmt->bindParam(':start_date', $start_date);
      $stmt->bindParam(':end_date', $end_date);
      $stmt->bindParam(':status', $status);

      if ($stmt->execute()) {
        $success_message = "Vacation added successfully!";
      } else {
        $error_message = "Error adding vacation.";
      }
    } catch (PDOException $e) {
      $error_message = "Database error: " . $e->getMessage();
    }
  } else {
    $error_message = "Please fill in all required fields.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Vacation | <?php echo $sitename; ?></title>
  <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo; ?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="../<?php echo $logo2; ?>" alt="Logo" width="150" height="130" style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../<?php echo $row_admin['photo']; ?>" alt="User Image" width="140" height="141" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row_admin['fullname']; ?></a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php include('sidebar.php'); ?>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Vacation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Vacation</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Vacation</h3>
              </div>

              <?php
              if (isset($success_message)) {
                echo '<div class="alert alert-success">' . $success_message . '</div>';
              }
              if (isset($error_message)) {
                echo '<div class="alert alert-danger">' . $error_message . '</div>';
              }
              ?>

              <form method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="employeeId">Employee</label>
                    <select class="form-control" id="employeeId" name="employee_id" required>
                      <option value="">Select Employee</option>
                      <?php
                      if (!empty($employees)) {
                        foreach ($employees as $employee) {
                          echo '<option value="' . htmlspecialchars($employee['id']) . '">' . htmlspecialchars($employee['fullname']) . '</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="startDate">Start Date</label>
                    <input type="date" class="form-control" id="startDate" name="start_date" required>
                  </div>
                  <div class="form-group">
                    <label for="endDate">End Date</label>
                    <input type="date" class="form-control" id="endDate" name="end_date">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                      <option value="pending">Pending</option>
                      <option value="approved">Approved</option>
                      <option value="rejected">Rejected</option>
                    </select>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Vacation</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
    <?php include('../inc/footer.php'); ?>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
