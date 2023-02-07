<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];
  $password=$_POST['password'];

  $sql="insert into crud (name,mobile,email,password)
  values('$name','$mobile',' $email',' $password') ";
  $result=mysqli_query($con,$sql);
  if($result){
    echo "Data inserted succesfully ";

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
    

    <title>crud</title>
  
  </head>
      <!-- jQuery library -->  

  <body>
    <h3 class="text-center mt-5">CRUD OPERATION</h3>
    <div class="container">
    <form  method="post" id="formvalidation">

  <div class="form-group "  >
    <label >Name</label>
    <input type="text" class="form-control"  placeholder="Enter ur name*" name="name"  minlength="2" autocomplete="off" required>
     
  </div>

  <div class="form-group">
    <label >Mobile</label>
    <input type="text" class="form-control"  placeholder="Enter mobile no*" name="mobile" autocomplete="off" required>
  </div>

  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email*" name="email" autocomplete="off" required>
    
  </div>

  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control"  placeholder="Enter Password*" name="password" autocomplete="off" required>
 
  </div>


  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>





<hr>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">mobile</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">operation</th>
    </tr>
  </thead>
  <tbody>

  <?php
$sql="Select * from crud";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result))
    {
     $id=$row['id'];
     $name=$row['name'];
     $mobile=$row['mobile'];
     $email=$row['email'];
     $password=$row['password'];

     echo '<tr>
     <th scope="row">'.$id.'</th>
     <td>'.$name.'</td>
     <td>'.$mobile.'</td>
     <td>'.$email.'</td>
     <td>'.$password.'</td>
     <td>
     
    <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
    <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
   </tr>';

    }


}


  ?>



    <!--<tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
-->
  </tbody>
</table>


<button class="btn btn-primary " ><a href="user.php" class="text-light">Add user</a></button>
    
    </div>



   
  </body>
</html>