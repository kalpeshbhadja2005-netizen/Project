<?php
session_start();
require 'config.php';



$username = 'umang';
$password_plain = '17112005';

// Password ko hash karo
$password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");

try {
    $stmt->execute([$username, $password_hashed]);
    echo "Admin user added successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}



if (isset($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Please enter both username and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Admin Login</title>
<link rel="stylesheet" href="assets/style.css" />
<style>
  .login-container {
    max-width: 350px;
    margin: 80px auto;
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  input, button {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    font-size: 1rem;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
  button {
    background-color: #007bff;
    color: white;
    border: none;
  }
  button:hover {
    background-color: #0056b3;
  }
  .error {
    color: #dc3545;
    margin-top: 10px;
  }
</style>
</head>
<body>
  <div class="login-container">
    <h2>Admin Login</h2>
    <?php if($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post" action="">
      <input type="text" name="username" placeholder="Username" required autofocus />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
