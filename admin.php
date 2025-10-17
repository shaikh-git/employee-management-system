<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #ede9fe;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      display: flex;
      background: white;
      width: 900px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      position: relative;
    }

    /* Top-right Employee Login Button */
    .employee-link {
      position: absolute;
      top: 15px;
      right: 15px;
      background: #4f46e5;
      color: white;
      padding: 8px 14px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
      transition: 0.3s;
    }

    .employee-link:hover {
      background: #4338ca;
    }

    .form-section {
      flex: 1;
      padding: 50px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    input {
      width: 100%;
      padding: 12px 15px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 10px;
      outline: none;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #7c3aed;
      border: none;
      border-radius: 10px;
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 10px;
    }

    button:hover {
      background: #6d28d9;
    }

    .right-section {
      flex: 1;
      background: linear-gradient(135deg, #7c3aed, #4f46e5);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .right-section img {
      width: 80%;
      border-radius: 15px;
    }

    .section-box {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 20px;
    }

    .section-box h3 {
      color: #333;
      text-align: center;
      margin-bottom: 10px;
    }

    .link {
      text-align: center;
      margin-top: 10px;
    }

    .link a {
      color: #7c3aed;
      text-decoration: none;
      font-weight: 500;
    }

    .link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <!-- Employee Login Shortcut Button -->
    <a href="index.php" class="employee-link">Employee Login</a>

    <div class="form-section">
      <h2>ADMIN LOGIN</h2>
      <p style="text-align:center; color:#666;">Login with your admin credentials</p>

      <!-- Admin Login -->
      <div class="section-box">
        <h3>Admin Login</h3>
        <form action="admin_action.php" method="POST">
          <input type="email" name="admin_email" placeholder="Admin Email" required>
          <input type="text" name="admin_contact" placeholder="Admin Contact" required>
          <button type="submit" name="admin_login">Login as Admin</button>
        </form>
      </div>

      <div class="link">
        <p>Don’t have an account? <a href="register.php">Register here</a></p>
      </div>
    </div>

    <div class="right-section">
      <img src="https://img.freepik.com/free-photo/smiling-woman-holding-tablet_23-2147802324.jpg" alt="Login Image">
    </div>
  </div>
</body>
</html>
