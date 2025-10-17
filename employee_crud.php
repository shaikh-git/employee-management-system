<?php
$conn = new mysqli("localhost", "root", "", "company_portal");

if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $salary = $_POST['salary'];

  $conn->query("INSERT INTO employees (name, email, address, phone, salary, role) 
                VALUES ('$name', '$email', '$address', '$phone', '$salary', 'employee')");
  header("Location: admin_dashboard.php");
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM employees WHERE id=$id");
  header("Location: admin_dashboard.php");
}
?>
