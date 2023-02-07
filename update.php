<?php

include 'connect.php';
$id=$_GET['updateid'];

$sql="Select * from crud where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$mobile=$row['mobile'];
$email=$row['email'];
$password=$row['password'];


if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];
  $password=$_POST['password'];

  $sql="update crud set id=$id,name='$name',mobile='$mobile',email='$email',password='$password' where id=$id";
  $result=mysqli_query($con,$sql);
  if($result){
    //echo "updated  succesfully ";
    header('location:user.php');

  }else{
    die(mysqli_error($con));
  }
}

?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >

    <title>update</title>
  </head>
  <body>
    <h3 class="text-center mt-5">UPDATE DATA</h3>
    <div class="container">
    <form  method="post">

  <div class="form-group "  >
    <label >Name</label>
    <input type="text" class="form-control"  placeholder="Enter ur name*" name="name" autocomplete="off" value=<?php echo $name;?>>
  </div>

  <div class="form-group">
    <label >Mobile</label>
    <input type="text" class="form-control"  placeholder="Enter mobile no*" name="mobile" autocomplete="off" value=<?php echo $mobile;?>>
  </div>

  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email*" name="email" autocomplete="off" value=<?php echo $email;?>>
  </div>

  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control"  placeholder="Enter password*" name="password" autocomplete="off" value=<?php echo $password;?>>
  </div>

  
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
   

    
    </div>
  </body>
</html>