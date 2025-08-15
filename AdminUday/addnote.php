<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>ONSS Dashboard</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f8f9fc;
    }

    .topbar {
      height: 60px;
      background-color: #f1f5f9;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 30px;
      border-bottom: 1px solid #ddd;
    }

    .topbar h2 {
      color: #007bff;
    }

    .topbar .profile-icon {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #000;
    }

    .topbar .profile-icon img {
      width: 30px;
      height:30px;
      border-radius: 50%;
    }

    .container {
      display: flex;
    }

    .sidebar {
      width: 250px;
      background-color: #f8f9fc;
      height: calc(100vh - 60px);
      border-right: 1px solid #ddd;
      padding: 20px;
    }

    .sidebar .user-info {
      text-align: left;
      margin-bottom: 30px;
    }

    .sidebar .user-info img {
      width: 45px;
      height: 45px;
      vertical-align: middle;
      margin-right: 10px;
      border-radius: 50%;
    }

    .sidebar .user-info span {
      display: block;
      font-size: 14px;
      color: #333;
    }

    .sidebar .menu a {
      display: block;
      padding: 10px 15px;
      margin-bottom: 10px;
      text-decoration: none;
      border-radius: 5px;
      color: #000;
    }

    .sidebar .menu a.active {
      background-color: #007bff;
      color: #fff;
    }

    .content {
      flex: 1;
      padding: 30px;
    }

    .form-box {
      background-color: #eef1f7;
      padding: 30px;
      max-width: 600px;
      margin: auto;
      border-radius: 10px;
    }

    .form-box h3 {
      margin-bottom: 20px;
      color: #000;
    }

    .form-box input[type="text"],
    .form-box textarea,
    .form-box input[type="file"] {
      width: 100%;
      margin-bottom: 15px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-box button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 25px;
      border-radius: 5px;
      cursor: pointer;
    }

    .footer {
      text-align: center;
      padding: 20px;
      color: #007bff;
      font-size: 14px;
    }

  </style>
</head>
<body>

  <div class="topbar">
    <h2># Arene of PDF</h2>
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
                  ?>" alt="user" />
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
        <a href="user.php">📋 Dashboard</a>
        <a href="addnote.php" class="active">📁 Add Notes</a>
        <a href="manage.php">📁 Manage Notes</a>
        <a href="profileview.php">👤 Profile</a>
      </div>
    </div>

    <div class="content">
      <div class="form-box">
        <h3>Add Notes</h3>
        <form method="post" enctype="multipart/form-data">

        <input type="text"  name="ti" placeholder="Notes Title" required/>
        <input type="text"  name="su" placeholder="Subject" required />
        <textarea rows="4"  name="de" placeholder="Notes Description" required></textarea>

        <label>Upload File</label>
        <input type="file" name="f1" required/>

        <label>More File</label>
        <input type="file" name=" f2"/>

        <label>More File</label>
        <input type="file" name="f3" />

        <label>More File</label>
        <input type="file" name="f4"/>

        <button name="sb">Add</button>
        </form>
      </div>

      <div class="footer">
        © Online PDF Sharing System
      </div>
    </div>
  </div>

</body>
</html>

<?php
 include("db/connection.php");
 if(isset($_POST['sb']))
 {
     $t=$_POST['ti'];
     $s=$_POST['su'];
     $d=$_POST['de'];
     $r=$_SESSION['id'];
     
     $f1="file1/".$_FILES['f1']['name'];
     move_uploaded_file($_FILES['f1']['tmp_name'],$f1);

      $f2="file2/".$_FILES['f2']['name'];
     move_uploaded_file($_FILES['f2']['tmp_name'],$f2);

     $f3="file3/".$_FILES['f3']['name'];
     move_uploaded_file($_FILES['f3']['tmp_name'],$f3);

     $f4="file4/".$_FILES['f4']['name'];
     move_uploaded_file($_FILES['f4']['tmp_name'],$f4);

       $qry=mysqli_query($con,"insert into unote(uid,title,subject,des,file1,file2,file3,file4)values('$r','$t','$s','$d','$f1','$f2','$f3','$f4')");
       echo $qry;
           if($qry)
          {
               echo"<script> 
                 alert('your note is publish');
                 window.location.href='user.php';
             </script>";
          }
 }

?>