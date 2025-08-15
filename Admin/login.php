
<html>
     <head>
          <title></title>
     <head>

      <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
          <style>
             body {
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(to right, #004080, #0059b3);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
}
            .p {
  background-color: #ff9800  ;
  border-radius: 15px;
  width: 370px;
  padding: 10px 30px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
  text-align: center;
  position: relative;
}
             .p h1 {
  font-size: 28px;
  margin-bottom: 25px;
  color: beige;
}

            .p label {
  font-size: 20px;
  margin-bottom: 5px;
  display: block;
  text-align: left;
  color: #000000ff;
    font-weight: bold;
}

            .p input[type="text"],
.p input[type="password"],
.p input[type="email"] {
  width: 100%;
  padding: 10px 15px;
  border-radius: 25px;
  border: none;
  margin-bottom: 15px;
  font-size: 14px;
  outline: none;
  transition: 0.3s;
}
.p input:hover {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
}

             .p .in
             {
                     margin-bottom:45px;
             }
            .p .in input[type="submit"] {
  width: 100%;
  padding: 12px 20px;
  border-radius: 25px;
  border: none;
  background-color: beige;
  color: black;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
}

.p .in input[type="submit"]:hover {
  background-color: #ff0000ff;
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
  color:white;
}
         .p .in a {
  color: #000000ff;
  font-weight: bold;
  text-decoration: none;
  display: inline-block;
  margin-top: 12px;
  transition: color 0.3s ease;
}

.p .in a:hover {
  color: #ff0000ff;
}
         

          </style>
        
     </head>
<body>
     <div class="p">
         <form method="post">
          <h1>Login Page</h1><br>
          <div class="in">
            <label> Email Id</label>
             <br><input type="email"  name="e" required><br><br>
             <label>Password</label>
             <br><input type="password" name="pass" required><br><br>
            
             <input type="submit" value="login" name="sb"><br><br>
             </a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="join.php"> Create An Account ?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
     $fname;

         
     $qry=mysqli_query($conn,"select * from admin where email='$em' and password='$pass'");
      
     if($r=mysqli_fetch_array($qry))
      {   
          $_SESSION['id']=$r[0];
          $_SESSION['fname']=$r[1];
           $_SESSION['mobile']=$r[2];
          $_SESSION['email']=$r[3];
          $_SESSION['profile']=$r[5];
          header("location:html.html");
      }
      else
      {
             echo"<script> 
                 alert('please valid enter user name and password');
                 window.location.href='login.php';
                </script>";
      }
     
 }
 
 ?>