<?php require 'config.php'; require_admin(); ?>
<?php
// handle add/edit/delete via POST
if($_SERVER['REQUEST_METHOD']==='POST'){
  if(isset($_POST['add'])) {
    $stmt = $pdo->prepare("INSERT INTO playlists (title,description) VALUES (?,?)");
    $stmt->execute([$_POST['title'], $_POST['description']]);
  }
  if(isset($_POST['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM playlists WHERE id=?");
    $stmt->execute([$_POST['id']]);
  }
}
$lists = $pdo->query("SELECT * FROM playlists ORDER BY created_at DESC")->fetchAll();
?>
<!-- HTML: list playlists, form to add new -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Playlists</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <h1>Playlists</h1>
    <a href="dashboard.php">← Back to Dashboard</a>

    <h2>Create New Playlist</h2>
    <form method="post">
      <input type="text" name="title" placeholder="Playlist Title" required />
      <textarea name="description" placeholder="Description"></textarea>
      <button name="add">Add Playlist</button>
    </form>

    <h2>Existing Playlists</h2>
    <table>
      <thead><tr><th>#</th><th>Title</th><th>Description</th><th>Actions</th></tr></thead>
      <tbody>
        <!-- Loop through playlists here -->
        <tr>
          <td>1</td>
          <td>Sample Playlist</td>
          <td>This is a test playlist.</td>
          <td>
            <form style="display:inline;" method="post">
              <input type="hidden" name="id" value="1">
              <button name="delete" style="background:#dc3545;">Delete</button>
            </form>
          </td>
        </tr>
        <!-- ... -->
      </tbody>
    </table>
  </div>
</body>
</html>
