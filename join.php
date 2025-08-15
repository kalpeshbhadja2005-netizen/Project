
<html>
     <head>
          <title></title>
     <head>
      <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

          <style>
            /* Global styles */
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

/* Card container */
.p {
  background-color: #ff9800  ;
  border-radius: 15px;
  width: 370px;
  padding: 40px 30px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
  text-align: center;
  position: relative;
}

/* Heading */
.p h1 {
  font-size: 28px;
  margin-bottom: 25px;
  color: beige;
}

/* Labels */
.p label {
  font-size: 20px;
  margin-bottom: 5px;
  display: block;
  text-align: left;
  color: #000000ff;
    font-weight: bold;
}

/* Input fields */
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

/* Input hover effect */
.p input:hover {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
}

/* Submit button */
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

/* Link style */
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

/* Profile upload */
.upload-container {
  width: 90px;
  height: 90px;
  margin: 0 auto 25px;
  position: relative;
}

.profile-circle {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-image: url("images/user123.png");
  background-size: cover;
   background-repeat:no-repeat;
  background-position: center;
  border: 3px solid beige;
  cursor: pointer;
  overflow: hidden;
  display: flex;
  align-items: center;
      justify-content: center;
  transition: 0.3s ease;
}

.profile-circle:hover {
  border-color: #ffcc66;
}

.profile-circle::after {
  content: '+';
  position: absolute;
  bottom: -10px;
  right: -10px;
  background-color: beige;
  
  color: black;
  border-radius: 50%;
  width: 25px;
  height: 25px;
  font-weight: bold;
  display: flex;
  justify-content: center;
  align-items: center;
  border: 2px solid #004080;
  font-size: 18px;
}
.profile-circle img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
.profile-circle i {
      font-size: 60px;
      color: #777;
    }

/* Hidden file input */
#fileInput {
  display: none;
}

          </style>
     </head>
<body>
     <div class="p">
         <form method="post" enctype="multipart/form-data">
          
          <div class="in">
               
  <div class="upload-container" onclick="document.getElementById('fileInput').click();">
    <div class="profile-circle" id="profilePreview">
      <i class="fas fa-user"></i>
    </div>
    <input type="file" id="fileInput" accept="image/*" name="pf" onchange="previewImage(event)" required>
  </div>
    <script>
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function () {
        const img = document.createElement("img");
        img.src = reader.result;

        const previewDiv = document.getElementById("profilePreview");
        previewDiv.innerHTML = ''; // Clear existing icon
        previewDiv.appendChild(img); // Add image
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
             <label>  Enter Your Name :</label>&nbsp;&nbsp;<input type="text" name="name"required><br><br>
             <label> Enter Mobile No :</label>&nbsp;&nbsp;<input type="text" name="mobile"required><br><br>
             &nbsp;&nbsp;<label>Enter Your Email address :</label>&nbsp;&nbsp;&nbsp;<input type="email"  name="e" required><br><br>
             <label>Create Your Password :</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass"required><br><br>
             
             <input type="submit" value="Submit" name="sb"><br><br>
             <a href="index.php">Back Home ?</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php"> Login ?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
         </form>
     </div>
</body>
</html>

<?php
 
 include_once('includes/db.php');
 if(isset($_POST['sb']))
 {
     
     $name=$_POST['name'];
     $number=$_POST['mobile'];
     $e=$_POST['e'];
     $pass=$_POST['pass'];
     $pro="img/".$_FILES['pf']['name'];
     move_uploaded_file($_FILES['pf']['tmp_name'],$pro);

       $qry=mysqli_query($conn,"insert into registration(name,mobile,email,passwords,profile)values('$name','$number','$e','$pass','$pro')");
       echo $qry;
           if($qry)
          {
               echo"<script> 
                 alert('registration successfully! please login then access your account');
                 window.location.href='login.php';
             </script>";
          }
          
 }

?>
