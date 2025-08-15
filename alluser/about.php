

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('includes/db.php');
include_once('includes/header.php');
?>

<link rel="stylesheet" href="style.css">

<main class="about-section">
    <section class="about-hero">
        <h1>About LearnPro</h1>
        <p>Empowering learners through accessible, high-quality education.</p>
    </section>

    <section class="about-content">
        <div class="about-text">
            <h2>Who We Are</h2>
            <p>
                LearnPro is a modern e-learning platform built for students, professionals, and lifelong learners.
                Our mission is to provide valuable courses across different fields — technology, business, design, and more.
            </p>

            <h2>What We Offer</h2>
            <ul>
                <li>100% Free and Paid Courses</li>
                <li>Expert Instructors and Curated Playlists</li>
                <li>Easy-to-use platform with user profiles and progress tracking</li>
                <li>Downloadable content & practical resources</li>
            </ul>
        </div>

        <div class="about-image">
            <img src="images/about-img.png" alt="About LearnPro">
        </div>
    </section>
</main>


<? include_once('includes/footer.php'); ?>