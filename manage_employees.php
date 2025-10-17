<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role']!=='admin'){
  header("Location: login.php");
  exit();
}

$conn = new mysqli("localhost", "root", "", "company_portal");
if ($conn->connect_error){ die("Connection failed: ".$conn->connect_error); }

// Fetch all employees
$res = $conn->query("SELECT * FROM employees WHERE role='employee'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Employees</title>
<link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<style>
body{font-family:'Poppins',sans-serif;background:#f3f4f6;margin:0; display:flex;}
a{text-decoration:none;color:inherit;}

/* --- Sidebar --- */
.sidebar {width:250px; background:linear-gradient(180deg,#4f46e5,#4338ca); min-height:100vh; display:flex; flex-direction:column; position:fixed; z-index:10;}
.sidebar .logo {color:white; font-size:24px; font-weight:700; text-align:center; padding:20px 0; border-bottom:1px solid rgba(255,255,255,0.2);}
.sidebar ul {list-style:none; padding:0; margin:0;}
.sidebar ul li {padding:15px 20px; display:flex; align-items:center; transition:0.3s; cursor:pointer; color:white;}
.sidebar ul li:hover {background:rgba(255,255,255,0.1); transform:translateX(5px);}
.sidebar ul li i {font-size:20px; margin-right:15px;}
.sidebar ul li.active {background:white; color:#4f46e5; border-radius:8px; font-weight:600;}
.sidebar ul li.active i {color:#4f46e5;}

/* --- Main Content --- */
.main-content {margin-left:250px; flex:1; padding:30px;}
h2{text-align:center; margin-bottom:20px; color:#4f46e5;}

/* --- Form --- */
form{display:flex; flex-wrap:wrap; gap:10px; margin-bottom:20px; background:white; padding:20px; border-radius:15px; box-shadow:0 10px 20px rgba(0,0,0,0.15);}
form input{padding:10px; border-radius:8px; border:1px solid #ccc; flex:1; transition:0.3s;}
form input:focus{border-color:#4f46e5; box-shadow:0 0 5px rgba(79,70,229,0.3);}
form button{padding:10px 20px; border-radius:8px; background:#4f46e5; color:white; border:none; font-weight:600; cursor:pointer; transition:0.3s;}
form button:hover{background:#4338ca; transform:scale(1.05);}

/* --- Table --- */
table{width:100%; border-collapse:collapse; background:white; border-radius:10px; overflow:hidden; box-shadow:0 10px 20px rgba(0,0,0,0.15);}
th,td{padding:12px; border-bottom:1px solid #ddd; text-align:center;}
th{background:#4f46e5; color:white;}
td a{color:#4f46e5; font-weight:600; text-decoration:none;}
td a:hover{text-decoration:underline;}
</style>
</head>
<body>

<!-- Sidebar Navbar -->
<div class="sidebar">
    <div class="logo">AdminPanel</div>
    <ul>
        <li><i class='bx bx-grid-alt'></i> <a href="admin_dashboard.php" style="color:inherit;">Dashboard</a></li>
        <li class="active"><i class='bx bx-user'></i> Manage Employees</li>
        <li><i class='bx bx-log-out'></i> <a href="logout.php" style="color:inherit;">Logout</a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <h2>Manage Employees</h2>

    <!-- Add Employee Form -->
    <form method="POST" action="employee_crud.php">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="phone" placeholder="Phone No" required>
        <input type="number" step="0.01" name="salary" placeholder="Salary" required>
        <button type="submit" name="add">Add Employee</button>
    </form>

    <!-- Employee Table -->
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Salary</th><th>Actions</th></tr>
        <?php while($row=$res->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['salary'] ?></td>
            <td>
                <a href="edir_employee.php?edit=<?= $row['id'] ?>">Edit</a> | 
                <a href="employee_crud.php?delete=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
