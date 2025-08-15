<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title></title>
  <link rel="stylesheet" href="user.css">
 
</head>
<body>

  <div class="topbar">
    <h2>LearnPro</h2>
    <div class="profile-icon">
      <img src="<?php 
                       session_start();
                        echo" ".$_SESSION['profile'];
                  ?>" alt="user" />
      <span>    
        <?php 
             echo" ".$_SESSION['fname'];
        ?>
      </span>
    </div>
  </div>

  <div class="container">
    <div class="sidebar">
      <div class="user-info">
        <img src="<?php 
                        echo" ".$_SESSION['profile'];
                  ?>" 
                  alt="user"/>
        <span>
          <?php
             echo" ".$_SESSION['fname'];
          ?>
        </span>
        <span> 
          <?php
             echo" ".$_SESSION['email'];
          ?>
        </span>
      </div>
      <div class="menu">
     
       
         <a href="user.php">Dashboard</a>
            <a href="alluser/courses.php">All Courses</a>
            <a href="alluser/about.php">About</a>
            <a href="alluser/contect.php">Contact</a>
             <a href="profileview.php">👤 Profile</a>
      </div>
    </div>

    <div class="content">
     <div class="d">
          <?php
          echo"<div style='color:black;font-size:30px; font-weight: bold;padding-left:50px;padding-top:20px;'>Hello,  ".$_SESSION['fname']." Welcome to your panel</div>";
          ?>
      </div>

      
    </div>
  </div>

</body>
</html>

<?php include_once('includes/footer.php'); ?>