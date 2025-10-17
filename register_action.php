<?php
$servername = "localhost";
$username = "root"; // your MySQL username
$password = "";     // your MySQL password
$dbname = "employee_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $contact_number = $_POST['contact_number'];

  $sql = "INSERT INTO employees (first_name, last_name, email, contact_number, role)
          VALUES ('$first_name', '$last_name', '$email', '$contact_number', 'employee')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Employee Registered Successfully!'); window.location.href='admin.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
