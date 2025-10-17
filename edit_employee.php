<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit();
}

$conn = new mysqli("localhost", "root", "", "company_portal");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Get employee by ID
if (isset($_GET['edit'])) {
  $id = intval($_GET['edit']);
  $result = $conn->query("SELECT * FROM employees WHERE id=$id");
  $employee = $result->fetch_assoc();
}

// Update employee
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $salary = $_POST['salary'];

  $update = "UPDATE employees 
             SET name='$name', email='$email', address='$address', phone='$phone', salary='$salary' 
             WHERE id=$id";
  if ($conn->query($update)) {
    echo "<script>alert('Employee updated successfully!'); window.location='manage_employees.php';</script>";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Employee</title>
<link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<style>
body{font-family:'Poppins',sans-serif;background:#f3f4f6;margin:0;display:flex;}
a{text-decoration:none;color:inherit;}

/* Sidebar */
.sidebar{width:250px;background:linear-gradient(180deg,#4f46e5,#4338ca);min-height:100vh;display:flex;flex-direction:column;position:fixed;}
.sidebar .logo{color:white;font-size:24px;font-weight:700;text-align:center;padding:20px 0;border-bottom:1px solid rgba(255,255,255,0.2);}
.sidebar ul{list-style:none;padding:0;margin:0;}
.sidebar ul li{padding:15px 20px;display:flex;align-items:center;transition:0.3s;cursor:pointer;color:white;}
.sidebar ul li:hover{background:rgba(255,255,255,0.1);transform:translateX(5px);}
.sidebar ul li i{font-size:20px;margin-right:15px;}
.sidebar ul li.active{background:white;color:#4f46e5;border-radius:8px;font-weight:600;}
.sidebar ul li.active i{color:#4f46e5;}

/* Main Content */
.main-content{margin-left:250px;flex:1;padding:30px;}
h2{text-align:center;margin-bottom:20px;color:#4f46e5;}

/* Form */
form{background:white;padding:30px;border-radius:15px;box-shadow:0 10px 20px rgba(0,0,0,0.15);max-width:600px;margin:auto;}
form label{display:block;margin-bottom:5px;font-weight:600;color:#333;}
form input{width:100%;padding:10px;margin-bottom:15px;border-radius:8px;border:1px solid #ccc;transition:0.3s;}
form input:focus{border-color:#4f46e5;box-shadow:0 0 5px rgba(79,70,229,0.3);}
form button{padding:10px 20px;border-radius:8px;background:#4f46e5;color:white;border:none;font-weight:600;cursor:pointer;transition:0.3s;}
form button:hover{background:#4338ca;transform:scale(1.05);}
.back-link{text-align:center;display:block;margin-top:20px;color:#4f46e5;font-weight:600;}
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="logo">AdminPanel</div>
  <ul>
    <li><i class='bx bx-grid-alt'></i> <a href="admin_dashboard.php" style="color:inherit;">Dashboard</a></li>
    <li class="active"><i class='bx bx-user'></i> Edit Employee</li>
    <li><i class='bx bx-log-out'></i> <a href="logout.php" style="color:inherit;">Logout</a></li>
  </ul>
</div>

<!-- Main Content -->
<div class="main-content">
  <h2>Edit Employee</h2>

  <?php if (isset($employee)): ?>
  <form method="POST" action="">
    <input type="hidden" name="id" value="<?= $employee['id']; ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($employee['name']); ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($employee['email']); ?>" required>

    <label>Address:</label>
    <input type="text" name="address" value="<?= htmlspecialchars($employee['address']); ?>" required>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?= htmlspecialchars($employee['phone']); ?>" required>

    <label>Salary:</label>
    <input type="number" step="0.01" name="salary" value="<?= htmlspecialchars($employee['salary']); ?>" required>

    <button type="submit" name="update">Update Employee</button>
  </form>
  <a href="manage_employee.php" class="back-link">← Back to Manage Employees</a>
  <?php else: ?>
    <p style="text-align:center;color:red;">Employee not found.</p>
  <?php endif; ?>
</div>

</body>
</html>
