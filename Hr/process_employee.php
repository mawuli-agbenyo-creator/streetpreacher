<?php
// Include database connection file
include('../inc/topbar.php');// Update with the correct path to your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $employeeID = $_POST['employeeID'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $qualification = $_POST['qualification'];
    $dept = $_POST['dept'];
    $employee_type = $_POST['employee_type'];
    $date_appointment = $_POST['date_appointment'];
    $basic_salary = $_POST['basic_salary'];
    $gross_pay = $_POST['gross_pay'];
    $status = $_POST['status'];
    $leave_status = $_POST['leave_status'];
    //add department
    $department_name = $_POST['dept'];

    // // Handle file upload
    // $photo = $_FILES['photo']['name'];
    // $photo_tmp = $_FILES['photo']['tmp_name'];
    // $photo_path = 'uploads/' . basename($photo); // Set the path where the file will be stored

    // // Check if file was uploaded and move it to the desired location
    // if (move_uploaded_file($photo_tmp, $photo_path)) {
    //     // File upload successful
    // } else {
    //     // Handle file upload error
    //     die("File upload failed.");
    // }

    // Insert data into the database
    $query = "INSERT INTO tblemployee (
        employeeID, fullname, password, sex, email, dob, phone, address,
        qualification, dept, employee_type, date_appointment, basic_salary,
        gross_pay, status, leave_status,
        deparment
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?
    )";

    // Prepare and execute the SQL statement
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param(
            'sssssssssssssssss',
            $employeeID, $fullname, $password, $sex, $email, $dob, $phone, $address,
            $qualification, $dept, $employee_type, $date_appointment, $basic_salary,
            $gross_pay, $status, $leave_status,$department_name
        );

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to success page or display success message
            echo "Employee added successfully!";
            header("Location: employees.php"); // Redirect to the employees list page
        } else {
            // Handle query error
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle preparation error
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If form is not submitted, redirect to the form page
    header("Location: ../");
}
?>
