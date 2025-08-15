<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Learn Pro</title>
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
      height: 30px;
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
      flex:1px;
      padding: 30px;
    }
    
    td{
        padding:16px;
        text-align:center;
    }

    .content img{
        height:90px;
        width: 90px;
       border-radius:50%;
       border:2px solid black;
    }

     .content input{
        height:30px;
        width: 200px;
        border-radius:3px;
        border-color:#ddd;
     }

     button {
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
    <h2>Learn Pro</h2>
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
            <a href="courses.php">All Courses</a>
            <a href="about.php">About</a>
            <a href="contect.php">Contact</a>
             <a href="profileview.php">👤 Profile</a>
      </div>
    </div>

    <div class="content">
      
      <form method="post" enctype="multipart/form-data">
      <table >
        <tr>
          <th colspan="10">
            <img src="<?php echo" ".$_SESSION['profile']; ?>" alt="user" />
          </th>
        </tr>
        
        <tr>
          <th colspan="10">
            <input type="file" accept="img/*" name="pf" value="<?php echo" ".$_SESSION['profile'];?>"/>
          </th>
        </tr>

         <tr>
          <td>
            <label> First Name :</label>
          </td>
          <td>
            <input type="text" name="first" value="<?php echo" ".$_SESSION['fname']; ?>" required />
          </td>
        </tr>

        <tr>
          <td>
            <label> Mobile :</label>
          </td>
          <td>
          <input type="text" name="last" value="<?php echo"".$_SESSION['mobile'];?>" required />
          </td>
          </td>
        </tr>
            
        <tr>
          <td>
            <label>Email Id</label>
          </td>
          <td>
            <input type="email"  name="e" placeholder="<?php echo" ".$_SESSION['email']; ?>" readonly>
          </td>
        </tr>
        
        <tr>
          <td>
            <button name="sb">update</button> 
          </td>
        </tr>
      </table>
      </form>
      <div class="footer">
        © Online PDF Sharing System
      </div>
    </div>
  </div>
</body>
</html>
<?php
 
 if(isset($_POST['sb']))
 {
  

     $fnm=$_POST['first'];
     $lnm=$_POST['last'];
     $pro="img/".$_FILES['pf']['name'];
     move_uploaded_file($_FILES['pf']['tmp_name'],$pro);
     $r=$_SESSION['id'];
     $qry=mysqli_query($conn,"update registration set name='$fnm',mobile='$lnm',profile='$pro' where id='$r'");
     
 if(!empty($_FILES['pf']['name']))
  {
     $qry=mysqli_query($conn,"update registration set fname='$fnm',mobile='$lnm',profile='$pro' where id='$r'");
      if($qry)
      {
        echo"<script> 
                 alert('update your record please login');
                 window.location.href='login.php';
                </script>";
      }
  }
  else
  {
    $qry=mysqli_query($conn,"update registration set fname='$fnm',mobile='$lnm' where id='$r'");
    
      if($qry)
      {
        echo"<script> 
                 alert('update your record please login');
                 window.location.href='login.php';
                </script>";
      }
  }
   
 }
 
 ?>


