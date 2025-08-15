<?php
include("db/connection.php");
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $q="delete from unote where id=".$id;
    $qry=mysqli_query($con,$q);
    if($qry)
   {  
         header("location:a_managenote.php");
   }
}
?>