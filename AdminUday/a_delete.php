<?php
include("includes/db.php");

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $q="delete from registration where id=".$id;
    $qry=mysqli_query($con,$q);
    if($qry)
   {  
       $uno="delete from unote where uid=".$id;
       while($qry2=mysqli_query($con,$uno))
      {
         header("location:total_regis.php");
      }
 }
}
?>