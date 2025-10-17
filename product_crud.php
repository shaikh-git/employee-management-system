<?php
$conn = new mysqli("localhost", "root", "", "company_portal");

// Add Product
if (isset($_POST['add_product'])) {
  $name = $_POST['product_name'];
  $category = $_POST['category'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];

  $conn->query("INSERT INTO products (product_name, category, quantity, price)
                VALUES ('$name', '$category', '$quantity', '$price')");
  header("Location: admin_dashboard.php");
}

// Delete Product
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM products WHERE id=$id");
  header("Location: admin_dashboard.php");
}
?>
