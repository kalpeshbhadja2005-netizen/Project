

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('includes/db.php');
include_once('includes/header.php');
?>
<link rel="stylesheet" href="style.css">

<main class="hero">
    <section class="intro">
        <h1>Welcome to LearnPro</h1>
        <p>Your gateway to free and premium online courses</p><br>
        <a href="courses.php" class="btn">Browse Courses</a>
    </section>

    <section class="featured">
        <h2>Featured Playlists</h2>
        <div class="playlist-container">
            <?php
            $query = "SELECT * FROM playlists ORDER BY created_at DESC LIMIT 4";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="playlist-card">
                        <img src="images/'.$row['thumbnail'].'" alt="Thumbnail">
                        <h3>'.$row['title'].'</h3>
                        <p>'.$row['category'].'</p>
                        <a href="playlist.php?id='.$row['id'].'" class="btn-small">View Playlist</a>
                    </div>';
                }
            } else {
                echo '<p>No playlists found.</p>';
            }
            ?>
        </div>
    </section>
</main>

<?php include_once('includes/footer.php'); ?>
