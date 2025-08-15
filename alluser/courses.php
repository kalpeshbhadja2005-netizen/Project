<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="courses-container">
    <h2>All Courses</h2>
    <div class="course-grid">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM courses ORDER BY id DESC");
        while ($course = mysqli_fetch_assoc($result)) {
        ?>
        <div class="course-card">
            <img src="<?php echo $course['thumbnail']; ?>" alt="Thumbnail">
            <h3><?php echo $course['title']; ?></h3>
            <p><?php echo $course['category']; ?></p>
            <p><?php echo substr($course['description'], 0, 80); ?>...</p>
        </div>
        <?php } ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
