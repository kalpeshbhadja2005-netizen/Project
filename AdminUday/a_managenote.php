
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
        display:flex;
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
     flex:1px;
     padding:20px;
    }

    .content .tdisplay table{
        border-color:black;
        border-radius: 5px;
    }

    .id{
        padding:7px;
        text-align:center;
        width:90px;
    }

    .uid{
        padding:7px;
        text-align:center;
        width:90px;
    }

    .tl{
        padding:7px;
        text-align:center;
        width:90px;
    }

    .sbj{
        padding:7px;
        text-align:center;
        width:120px;
    }

     .dst{
        padding:7px;
        text-align:center;
        width:250px;
    }
     

     .fl1{
        padding:7px;
        text-align:center;
        width:150px;
    }

    .fl2{
        padding:7px;
        text-align:center;
        width:150px;
    }

    .fl3{
        padding:7px;
        text-align:center;
        width:150px;
    }

    .fl4{
        padding:7px;
        text-align:center;
        width:150px;
    }

     .adl{
        padding:7px;
        text-align:center;
        width:50px;
    }


    .footer{
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
        <a href="admin_page.php" >📋 Dashboard</a>
        <a href="total_regis.php">📁 Total Registration</a>
        <a href="a_managenote.php" class="active">📁 Manage Notes</a>
        <a href="#">👤 Profile</a>
      </div>
    </div>

    <div class="content"> 
        <div class="tdisplay">
            <table border="1">
                <tr>
                  <td class="id" style="background-color:rgb(134, 201, 253);">id</td>
                  <td class="uid" style="background-color:rgb(134, 201, 253);">Uid</td>
                  <td class="tl" style="background-color:rgb(134, 201, 253);">Title</td>
                  <td class="sbj" style="background-color:rgb(134, 201, 253);">Subject</td>
                  <td class="dst" style="background-color:rgb(134, 201, 253);">Description</td>
                  <td class="fl1" style="background-color:rgb(134, 201, 253);">File1</td>
                  <td class="fl2" style="background-color:rgb(134, 201, 253);">File2</td>
                  <td class="fl3" style="background-color:rgb(134, 201, 253);">File3</td>
                  <td class="fl4" style="background-color:rgb(134, 201, 253);">File4</td>
                  <td class="adl" style="background-color:rgb(134, 201, 253);">Delete</td>
                </tr>
                <?php
                    include("includes/db.php");

                     $qry=mysqli_query($conn,"select * from unote");
                      while($n=mysqli_fetch_array($qry))
                      { 
                          $n[2];
                          $n[3];
                          $n[4];
                          $n[5];
                          $n[6];
                          $n[7];
                          $n[8];
                ?>
                <tr>
                  <td class="id"><?php echo"".$n[0]?></td>
                  <td class="uid"><?php echo"".$n[1]?></td>
                  <td class="tl"><?php echo"".$n[2]?></td>
                  <td class="sbj"><?php echo"".$n[3]?></td>
                  <td class="dst"><?php echo"".$n[4] ?></td>
                  <td class="fl1"><a href="<?php echo" ".$n[5]; ?>" alt="user"><?php echo" ".$n[5]; ?></a></td>
                  <td class="fl2" ><a href="<?php echo" ".$n[6]; ?>" alt="user"><?php echo" ".$n[6]; ?></a></td>
                  <td class="fl3" ><a href="<?php echo" ".$n[7]; ?>" alt="user"><?php echo" ".$n[7]; ?></a></td>
                  <td class="fl4" ><a href="<?php echo" ".$n[8]; ?>" alt="user"><?php echo" ".$n[8]; ?></a></td>
                  <td class="adl"> <a href="a_notedelete.php?id=<?php echo''.$n[0]?>" onclick="return confirm('are you sure ?')">Delete</a></td>
                   
                </tr>
                <?php } ?>
            </table>
        </div>
      <div class="footer">
        © Online PDF Sharing System
      </div>
    </div>
  </div>

</body>
</html>

