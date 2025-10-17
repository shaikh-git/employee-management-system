<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Registration</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #b3d4fc, #80b3ff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      display: flex;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(10px);
      width: 800px;
      overflow: hidden;
    }

    .form-section {
      flex: 1;
      padding: 40px;
    }

    h2 {
      color: white;
      font-weight: 600;
      margin-bottom: 10px;
    }

    p {
      color: rgba(255, 255, 255, 0.7);
      font-size: 14px;
      margin-bottom: 30px;
    }

    input {
      width: 100%;
      padding: 12px 15px;
      margin: 10px 0;
      border: none;
      border-radius: 25px;
      outline: none;
      background: rgba(255, 255, 255, 0.3);
      color: #333;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 12px;
      background: white;
      border: none;
      border-radius: 25px;
      color: #333;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 10px;
    }

    button:hover {
      background: #dfe6e9;
    }

    .login-link {
      text-align: center;
      margin-top: 15px;
    }

    .login-link a {
      color: #fff;
      font-weight: 500;
      text-decoration: underline;
    }

    .login-link a:hover {
      color: #dfe6e9;
    }

    .security-section {
      flex: 1;
      background: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 30px;
    }

    .lock {
      font-size: 50px;
      color: #007bff;
      margin-bottom: 20px;
    }

    .safe-text {
      color: #333;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-section">
      <h2>Sign up now</h2>
      <p>Register your employee account securely</p>

      <form action="register_action.php" method="POST">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="contact_number" placeholder="Contact Number" required>
        <button type="submit">Sign up</button>
      </form>

      <div class="login-link">
        <p>Already have an account? <a href="admin.php"> Admin Login here</a></p>
      </div>
    </div>

    <div class="security-section">
      <div class="lock">🔒</div>
      <div class="safe-text">Safe security is on</div>
      <small>By signing up, you agree to our <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.</small>
    </div>
  </div>
</body>
</html>
