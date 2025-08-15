
<html>
     <head>
          <title></title>
     <head>
          <style>
             body
             {
              background-image:url("images/book3.jpg");
                background-size:cover;
                background-position:center;
                background-repeat:no-repeat;
                 display:flex;
                 justify-content:center;
                 align-items:center; 
             }
             .p
             {
                 background-color:white;
                 display:flex;
                 justify-content:center;
                 align-items:center;
                 height:340px;
                 width:300px;
                 border-radius:10px;
                 background-color:rgba(0, 0, 0, 0.7);
             }
             .p h1
             {
                
                 color:white;
                 padding-bottom:15px;
                  padding-left:28px;
             }
             .p .in label
             {
               color:white;
             }
             .p .in input
             {
               border-radius:8px;
               height:25px;
               width: 200px;
               transition: background-color 0.3s ease;
             }
             .p .in
             {
                     margin-bottom:45px;
             }
             .p .in input[type="submit"]
             {
               margin-left:0px;
               border-radius:10px;
               height:27px;
               width: 200px;
               font-size:16px;
               background-color:beige;
               color:black;
               transition: background-color 0.3s ease,box-shadow 0.3s ease ;
             }
             .p .in a
             {
                  text-decoration:none;
                  color:red;
             }
             .p .in input:hover
             {
                transform:scale(1.1);
                box-shadow:0 0 8px rgba(0,0,0,0.3);
               
             }
         

          </style>
        
     </head>
<body>
     <div class="p">
         <form method="post">
          <h1>Admin_login</h1>
          <div class="in">
            <label> Email Id</label>
             <br><input type="email"  name="e" required><br><br>
             <label>Password</label>
             <br><input type="password" name="pass" required><br><br>
            
             <input type="submit" value="login" name="sb"><br><br>
              <a href="index.php">Back Home ?</a>
          </div>
         </form>
     </div>
</body>
</html>

<?php
session_start();
include("includes/db.php");

 if(isset($_POST['sb']))
 {
     $em=$_POST['e'];
     $pass=$_POST['pass'];

     
          $qry=mysqli_query($conn,"select * from admin where email='$em' and password='$pass'");
       
      if($r=mysqli_fetch_array($qry))
      {
          header("location:admin_page.php");
      }
      else
      {
             echo"<script> 
                 alert('please valid enter user name and password');
                 window.location.href='a_login.php';
             </script>";
      }
     
 }
 
 ?>