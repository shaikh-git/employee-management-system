<?php
session_start();
if (!isset($_SESSION['employee_id'])) {
    header("Location: index.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "company_portal");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$employee_id = $_SESSION['employee_id'];
$stmt = $conn->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Employee Dashboard</title>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #f3f4f6;
    margin: 0;
    padding: 0;
}
.navbar {
    background: #4f46e5;
    color: white;
    display: flex;
    justify-content: space-between;
    padding: 15px 30px;
    font-size: 18px;
    font-weight: 600;
}
.navbar a {
    color: white;
    text-decoration: none;
    background: #4338ca;
    padding: 8px 15px;
    border-radius: 8px;
    transition: 0.3s;
}
.navbar a:hover {
    background: white;
    color: #4f46e5;
}
.dashboard {
    max-width: 500px;
    margin: 80px auto;
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    padding: 40px;
    text-align: center;
}
.dashboard h2 {
    color: #4f46e5;
}
.info {
    text-align: left;
    margin: 10px 0;
    font-size: 16px;
}
label {
    font-weight: 600;
}
</style>
</head>
<body>

<div class="navbar">
    <div>Employee Dashboard</div>
    <a href="logout.php">Logout</a>
</div>

<div class="dashboard">
    <h2>Welcome, <?= htmlspecialchars($user['name']) ?> 👋</h2>
    <div class="info"><label>Email:</label> <?= htmlspecialchars($user['email']) ?></div>
    <div class="info"><label>Phone:</label> <?= htmlspecialchars($user['phone']) ?></div>
    <div class="info"><label>Address:</label> <?= htmlspecialchars($user['address']) ?></div>
    <div class="info"><label>Salary:</label> ₹<?= number_format($user['salary'], 2) ?></div>
    <div class="info"><label>Performance:</label> <?= htmlspecialchars($user['performance']) ?>%</div>
    <div class="info"><label>Status:</label> <?= ucfirst(htmlspecialchars($user['status'])) ?></div>
</div>

</body>
</html>
