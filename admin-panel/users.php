<?php require 'login.php'; require_admin();
// add admin
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['add'])){
  $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $pdo->prepare("INSERT INTO admins (username,password) VALUES (?,?)")->execute([$_POST['username'],$hash]);
}
// list users
$admins = $pdo->query("SELECT id,username FROM admins")->fetchAll();
?>
<!-- HTML: form to add new user and list existing ones with delete option, excluding current -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Users</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <h1>Admin Users</h1>
    <a href="dashboard.php">← Back to Dashboard</a>

    <h2>Add Admin User</h2>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button name="add">Add User</button>
    </form>

    <h2>Existing Admins</h2>
    <table>
      <thead><tr><th>#</th><th>Username</th><th>Actions</th></tr></thead>
      <tbody>
        <!-- Loop admins -->
        <tr>
          <td>1</td>
          <td>admin</td>
          <td>
            <!-- Assume cannot delete self -->
            <form style="display:inline;" method="post">
              <input type="hidden" name="id" value="1">
              <button name="delete" style="background:#dc3545;">Delete</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
</body>
</html>
