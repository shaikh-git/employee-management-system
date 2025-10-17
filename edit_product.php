<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "company_portal");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Check if product ID is provided
if (!isset($_GET['id'])) {
    header("Location: manage_products.php");
    exit();
}

$id = (int)$_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id = $id");
if ($result->num_rows === 0) {
    header("Location: manage_products.php");
    exit();
}
$product = $result->fetch_assoc();

// Handle update submission
if (isset($_POST['update_product'])) {
    $name = $conn->real_escape_string($_POST['product_name']);
    $category = $conn->real_escape_string($_POST['category']);
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price'];

    $conn->query("UPDATE products SET 
        product_name = '$name',
        category = '$category',
        quantity = $quantity,
        price = $price
        WHERE id = $id
    ");

    header("Location: manage_products.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Product</title>
<link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<style>
body{font-family:'Poppins',sans-serif;background:#f3f4f6;margin:0;display:flex;}
a{text-decoration:none;color:inherit;}

/* Sidebar */
.sidebar {width:250px;background:linear-gradient(180deg,#4f46e5,#4338ca);min-height:100vh;display:flex;flex-direction:column;position:fixed;}
.sidebar .logo {color:white;font-size:24px;font-weight:700;text-align:center;padding:20px 0;border-bottom:1px solid rgba(255,255,255,0.2);}
.sidebar ul {list-style:none;padding:0;margin:0;}
.sidebar ul li {padding:15px 20px;display:flex;align-items:center;transition:0.3s;cursor:pointer;color:white;}
.sidebar ul li:hover {background:rgba(255,255,255,0.1);transform:translateX(5px);}
.sidebar ul li i {font-size:20px;margin-right:15px;}
.sidebar ul li.active {background:white;color:#4f46e5;border-radius:8px;font-weight:600;}
.sidebar ul li.active i {color:#4f46e5;}

/* Main Content */
.main-content {margin-left:250px;flex:1;padding:30px;}
h2{text-align:center;margin-bottom:20px;color:#4f46e5;}

/* Form */
form{background:white;padding:25px;border-radius:15px;box-shadow:0 10px 20px rgba(0,0,0,0.15);max-width:600px;margin:auto;}
form input{width:100%;padding:10px;margin-bottom:15px;border-radius:8px;border:1px solid #ccc;transition:0.3s;}
form input:focus{border-color:#4f46e5;box-shadow:0 0 5px rgba(79,70,229,0.3);}
form button{padding:10px 20px;background:#4f46e5;color:white;border:none;border-radius:8px;font-weight:600;cursor:pointer;transition:0.3s;}
form button:hover{background:#4338ca;transform:scale(1.05);}
.back-link{text-align:center;margin-top:15px;}
.back-link a{color:#4f46e5;font-weight:600;}
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">AdminPanel</div>
    <ul>
        <li><i class='bx bx-grid-alt'></i> <a href="admin_dashboard.php" style="color:inherit;">Dashboard</a></li>
        <li class="active"><i class='bx bx-package'></i> <a href="manage_products.php" style="color:inherit;">Manage Products</a></li>
        <li><i class='bx bx-log-out'></i> <a href="logout.php" style="color:inherit;">Logout</a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <h2>Edit Product</h2>
    <form method="POST" action="">
        <input type="text" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" placeholder="Product Name" required>
        <input type="text" name="category" value="<?php echo htmlspecialchars($product['category']); ?>" placeholder="Category" required>
        <input type="number" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" placeholder="Quantity" required>
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" placeholder="Price" required>
        <button type="submit" name="update_product">Update Product</button>
    </form>

    <div class="back-link">
        <a href="manage_products.php">&larr; Back to Manage Products</a>
    </div>
</div>

</body>
</html>
