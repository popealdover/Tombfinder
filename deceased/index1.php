<?php
session_start();
require 'dbcon.php';




?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="admin-nav.css">
    <title>ADMIN</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #444645;">
      <div class="container-fluid">

        <a class="navbar-brand" href="#">
                <img class="logo" src="img1/logo1.png" alt="" width="100"> Tomb Finder
            </a>

    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border: solid black; border-radius: 10px;">
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#details"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact"></a>
            </li>
          </ul>

          <img src="img1/prof2.png" class="user-pic" onclick="toggleMenu()">

          <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
              <div class="user-info">
                <img src="img/prof2.png">
                <h3>Username</h3>
              </div>
              <hr>
              <a href="#" class="sub-menu-link">
                <img src="img1/prof.png">
                <p>Edit Profile</p>
                <span>></span>
              </a>
              <a href="#" class="sub-menu-link">
                <img src="img/help.png">
                <p>Help & Support</p>
                <span>></span>
              </a>
              <a href="index2.php" class="sub-menu-link">
                <img src="img/logout.png">
                <p>Logout</p>
                <span>></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>

  <div class="container mt-4">

  

  <?php  include ('message.php');    ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Deceased Persons Details
          <a href="deceased-create.php" class="btn btn-primary float-end">Add</a>
        </h4>
      </div>
      <div class="card-body">

<table class="table table-boardered table-striped">
  <thead>
    <tr>
    
      <th>ID</th>
      <th>Full Name</th>
      <th>Born Date</th>
      <th>Death Date</th>
      <th>Location</th>
      <th>Action</th>
    </tr>
  </thead>
<tbody>

<?php
  $query = "SELECT * FROM information";
  $query_run = mysqli_query($con, $query);


  if(mysqli_num_rows($query_run) > 0)
{

  foreach($query_run as $deceased)
  {

    //echo 
    ?>

<tr>
    <td><?= $deceased['id'];?></td>
    <td><?= $deceased['name'];?></td>
    <td><?= $deceased['borndate'];?></td>
    <td><?= $deceased['deathdate'];?></td>
    <td><?= $deceased['location'];?></td>
    <td>
      <a href="deceased-edit.php?id=<?=$deceased['id'];?>" class= "btn btn-success btn-sm">Edit</a> 
      <form action="code.php" method = "POST" class="d-inline">
      <button type="submit" name="delete_deceased" value="<?=$deceased['id'];?>" class= "btn btn-danger btn-sm">Delete</a>


      </form>
    </td>
  </tr> 

    <?php

  }

}

else
{

  echo "<h5> No Record Found </h5>";

}


?>


  <tr>
    <td></td>
  </tr>
</tbody>

</table>

      </div>
    </div>
  </div>
</div>

  </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>