<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "company_portal"); 
if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

// Employee Stats
$totalEmployees = $conn->query("SELECT COUNT(*) AS total FROM employees WHERE role='employee'")->fetch_assoc()['total'];
$activeEmployees = $totalEmployees; 
$avgPerformance = $conn->query("SELECT AVG(performance) AS avg_perf FROM employees WHERE role='employee'")->fetch_assoc()['avg_perf'];

// Product Stats
$totalProducts = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];

// Product categories (for chart)
$categories = []; $catData = [];
$res = $conn->query("SELECT category, COUNT(*) AS total FROM products GROUP BY category");
while ($row = $res->fetch_assoc()) { $categories[] = $row['category']; $catData[] = $row['total']; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<style>
body {font-family:'Poppins',sans-serif; background:#f3f4f6; margin:0; display:flex;}
a {text-decoration:none; color:inherit;}

/* Sidebar */
.sidebar {width:250px; background:linear-gradient(180deg,#4f46e5,#4338ca); min-height:100vh; display:flex; flex-direction:column; position:fixed; z-index:10;}
.sidebar .logo {color:white; font-size:24px; font-weight:700; text-align:center; padding:20px 0; border-bottom:1px solid rgba(255,255,255,0.2);}
.sidebar ul {list-style:none; padding:0; margin:0;}
.sidebar ul li {padding:15px 20px; display:flex; align-items:center; transition:0.3s; cursor:pointer; color:white;}
.sidebar ul li:hover {background:rgba(255,255,255,0.1); transform:translateX(5px);}
.sidebar ul li i {font-size:20px; margin-right:15px;}
.sidebar ul li.active {background:white; color:#4f46e5; border-radius:8px; font-weight:600;}
.sidebar ul li.active i {color:#4f46e5;}

/* Main Content */
.main-content {margin-left:250px; flex:1; padding:30px; transition: margin-left 0.4s;}
header {background:#4f46e5; color:white; padding:15px 25px; display:flex; justify-content:space-between; align-items:center; font-size:22px; font-weight:600; border-radius:15px; margin-bottom:30px; box-shadow:0 5px 15px rgba(0,0,0,0.15);}
header a {background:white;color:#4f46e5;padding:8px 15px;border-radius:8px;font-weight:600; transition:0.3s;}
header a:hover {background:#4338ca;color:white;}

/* Cards */
.cards {display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:25px; margin-bottom:50px;}
.card {background:linear-gradient(135deg,#ffffff,#e0e7ff); padding:20px; border-radius:20px; box-shadow:0 15px 25px rgba(0,0,0,0.2); text-align:center; transition: all 0.5s; position:relative; overflow:hidden; cursor:pointer;}
.card::before {content:""; position:absolute; top:0; left:-75%; width:50%; height:100%; background:rgba(255,255,255,0.2); transform:skewX(-25deg); transition:0.5s;}
.card:hover::before {left:125%;}
.card:hover {transform:translateY(-10px) scale(1.05); box-shadow:0 20px 35px rgba(0,0,0,0.3);}
.card h3 {font-size:22px; color:#4f46e5; margin:10px 0;}
.card p {font-size:26px; font-weight:600; color:#111;}
.card i {font-size:50px; color:rgba(79,70,229,0.2); position:absolute; top:15px; right:15px; transition:all 0.5s;}
.card:hover i {transform: rotate(15deg) scale(1.2);}
.card a {display:inline-block; margin-top:15px; padding:10px 20px; background:#4f46e5; color:white; border-radius:10px; font-weight:600; transition:0.3s; transform:scale(1);}
.card a:hover {background:#4338ca; transform:scale(1.05);}

/* Charts */
.chart-container {display:flex; justify-content:space-around; flex-wrap:wrap;}
canvas {background:white;border-radius:20px;padding:25px;box-shadow:0 15px 25px rgba(0,0,0,0.2); margin:15px;}
</style>
</head>
<body>

<div class="sidebar">
    <div class="logo">AdminPanel</div>
    <ul>
        <li class="active"><i class='bx bx-grid-alt'></i> Dashboard</li>
        <li><i class='bx bx-user'></i> <a href="manage_employees.php" style="color:inherit;">Manage Employees</a></li>
        <li><i class='bx bx-package'></i> <a href="manage_products.php" style="color:inherit;">Manage Products</a></li>
        <li><i class='bx bx-log-out'></i> <a href="logout.php" style="color:inherit;">Logout</a></li>
    </ul>
</div>

<div class="main-content">
    <header>
        <span>Dashboard Overview</span>
        <a href="logout.php">Logout</a>
    </header>

    <div class="cards">
        <div class="card">
            <i class='bx bx-user'></i>
            <h3>Total Employees</h3>
            <p><?= $totalEmployees ?></p>
            <a href="manage_employees.php">Manage Employees</a>
        </div>
        <div class="card">
            <i class='bx bx-user-check'></i>
            <h3>Active Employees</h3>
            <p><?= $activeEmployees ?></p>
        </div>
        <div class="card">
            <i class='bx bx-line-chart'></i>
            <h3>Avg Performance</h3>
            <p><?= round($avgPerformance,1) ?>%</p>
        </div>
        <div class="card">
            <i class='bx bx-package'></i>
            <h3>Total Products</h3>
            <p><?= $totalProducts ?></p>
            <a href="manage_products.php">Manage Products</a>
        </div>
    </div>

    <div class="chart-container">
        <canvas id="employeeChart" width="350" height="350"></canvas>
        <canvas id="productChart" width="350" height="350"></canvas>
    </div>
</div>

<script>
const employeeData = {
  labels: ['Active', 'Inactive'],
  datasets: [{
    data: [<?= $activeEmployees ?>, <?= $totalEmployees - $activeEmployees ?>],
    backgroundColor: ['#4f46e5','#c7d2fe'],
    borderRadius:10, borderWidth:2
  }]
};
const productData = {
  labels: <?= json_encode($categories) ?>,
  datasets: [{
    label:'Products per Category',
    data: <?= json_encode($catData) ?>,
    backgroundColor: ['#22c55e','#3b82f6','#facc15','#f87171','#8b5cf6'],
    borderRadius:5
  }]
};
new Chart(document.getElementById('employeeChart'), {
    type:'doughnut', data:employeeData,
    options:{animation:{animateRotate:true,animateScale:true}, plugins:{legend:{position:'bottom'}}}
});
new Chart(document.getElementById('productChart'), {
    type:'bar', data:productData,
    options:{animation:{duration:1800,easing:'easeOutBounce'}, plugins:{legend:{display:false}}}
});
</script>

</body>
</html>
