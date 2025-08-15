
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
      justify-content: space-between;
      align-items: center;
      padding: 0 30px;
      border-bottom: 1px solid #ddd;
    }

    .topbar h2 {
      color: #007bff;
      text-align:center;
      padding-top:15px;
      
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
      flex:1;
      padding: 50px;
    }
    .content .box{
      display:flex;
      gap:20px;
  
    }

    .content .box div{
       height:100px;
       width: 290px;
       background-color:rgba(128, 226, 253, 0.99);
       color:black;
       border-radius:0px;
       border:2px solid black;
       text-align:center;
    }

    .content .box h4{
      
       color:black;
       padding:5px;
     
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
    <h2># ONLINE PDF SHARING SYSTEM</h2>
  </div>

  <div class="container">
    <div class="sidebar">
      <div class="menu">
        <a href="admin_page.php" class="active">📋 Dashboard</a>
        <a href="total_regis.php">📁 Total registration</a>
        <a href="a_managenote.php">📁 Manage Notes</a>
        <a href="#">👤 Profile</a>
      </div>
    </div>

    <div class="content">
      <div class="box">
          <div>
            <?php
                include("includes/db.php");

                 $qry=mysqli_query($conn,"select count(*) as id from registration");
                 $r=mysqli_fetch_array($qry);
                 echo"<h2 style='margin-top:20px;'>",$r['id'],"</h2>";
            ?>
            <h4> 👤  Total Registered People</h4>
          </div>
          <div>
             <?php
                /* $qry=mysqli_query($conn,"select count(*) as id from unote");
                 $r=mysqli_fetch_array($qry);
                 echo"<h2 style='margin-top:20px;'>",$r['id'],"</h2>";*/
            ?>
            <h4> 📋  Total Publics Notes</h4>
          </div>
          <div></div>
      </div>
      <div class="footer">
        © Online PDF Sharing System
      </div>
    </div>
  </div>

</body>
</html>