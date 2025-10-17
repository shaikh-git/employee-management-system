<?php
session_start();

$conn = new mysqli("localhost", "root", "", "company_portal");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if (isset($_POST['login'])) {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);

    $stmt = $conn->prepare("SELECT * FROM employees WHERE name = ? AND phone = ? AND role = 'employee'");
    $stmt->bind_param("ss", $name, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['employee_id'] = $user['id'];
        $_SESSION['employee_name'] = $user['name'];
        header("Location: employee_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid Name or Phone Number!');</script>";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Employee Login</title>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #eef2ff, #c7d2fe);
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.login-box {
    background: #fff;
    padding: 40px;
    width: 380px;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    text-align: center;
    position: relative;
}
h2 {
    color: #4f46e5;
    margin-bottom: 25px;
}
input {
    width: 100%;
    padding: 12px 15px;
    margin: 8px 0;
    border: 1px solid #ddd;
    border-radius: 10px;
    outline: none;
    font-size: 15px;
}
button {
    width: 100%;
    background: #4f46e5;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
    margin-top: 10px;
}
button:hover {
    background: #4338ca;
}
.admin-link {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #4338ca;
    color: white;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 13px;
    text-decoration: none;
    transition: 0.3s;
}
.admin-link:hover {
    background: #4f46e5;
}
</style>
</head>
<body>

<div class="login-box">
    <a href="admin.php" class="admin-link">Admin Login</a>
    <h2>Employee Login</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Enter Your Name" required>
        <input type="text" name="phone" placeholder="Enter Your Phone Number" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>
