<?php require 'config.php'; require_admin(); ?>
<?php
$playlists = $pdo->query("SELECT * FROM playlists")->fetchAll();
if($_SERVER['REQUEST_METHOD']==='POST'){
  if(isset($_FILES['video']) && $_FILES['video']['error']===UPLOAD_ERR_OK){
    $tmp = $_FILES['video']['tmp_name'];
    $name = time().'_'.basename($_FILES['video']['name']);
    $target = 'videos/'.$name;
    if(move_uploaded_file($tmp, $target)){
      $stmt = $pdo->prepare("INSERT INTO videos (playlist_id,title,filename) VALUES (?,?,?)");
      $stmt->execute([$_POST['playlist_id'], $_POST['title'], $name]);
      $msg = "Uploaded successfully";
    }
  }
}
$videos = $pdo->query("SELECT v.*, p.title as plist FROM videos v JOIN playlists p ON v.playlist_id=p.id ORDER BY v.uploaded_at DESC")->fetchAll();
?>
<!-- HTML: form with enctype multipart/form-data, dropdown playlist, title, file input; below table of existing videos with delete/edit actions -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Video</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <h1>Upload Video</h1>
    <a href="dashboard.php">← Back to Dashboard</a>

    <form method="post" enctype="multipart/form-data">
      <input type="text" name="title" placeholder="Video Title" required />
      <select name="playlist_id" required>
        <option value="">Select Playlist</option>
        <!-- Loop through existing playlists -->
        <option value="1">Sample Playlist</option>
      </select>
      <input type="file" name="video" accept="video/*" required />
      <button name="upload">Upload Video</button>
    </form>

    <h2>Existing Videos</h2>
    <table>
      <thead><tr><th>#</th><th>Title</th><th>Playlist</th><th>Uploaded At</th><th>Actions</th></tr></thead>
      <tbody>
        <!-- Loop through videos -->
        <tr>
          <td>1</td>
          <td>Introduction Video</td>
          <td>Sample Playlist</td>
          <td>2025‑07‑27</td>
          <td>
            <form style="display:inline;" method="post">
              <input type="hidden" name="id" value="5">
              <button name="delete" style="background:#dc3545;">Delete</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
