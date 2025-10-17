<?php
session_start();

// Step 1: Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_db"; // must match your actual DB name
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Admin Login
if (isset($_POST['admin_login'])) {
  $email = trim($_POST['admin_email']);
  $contact_number = trim($_POST['admin_contact']);

  $query = "SELECT * FROM employees WHERE email='$email' AND contact_number='$contact_number' AND role='admin'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $admin = mysqli_fetch_assoc($result);

    // Create session
    $_SESSION['role'] = 'admin';
    $_SESSION['admin_email'] = $admin['email'];
    $_SESSION['admin_name'] = $admin['name'];

    // Redirect to dashboard
    header("Location: admin_dashboard.php");
    exit();
  } else {
    echo "<script>alert('Invalid Admin Credentials!'); window.location='admin.php';</script>";
    exit();
  }
}

mysqli_close($conn);
?>
