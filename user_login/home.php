<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Tomb Finder</title>

    <link rel="stylesheet" href="style.css">
    
  <link rel="stylesheet" type="text/css" href="table.css">
  </head>
  <body>

  

  <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #444645;">
      <div class="container-fluid">

        <a class="navbar-brand" href="#">
                <img class="logo" src="img/logo1.png" alt="" width="100"> Tomb Finder
            </a>

    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border: solid black; border-radius: 10px;">
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#details">DETAILS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">ABOUT US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#transactions">TRANSACTIONS</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">CONTACT</a>
            </li>
          </ul>

          <img src="img/prof2.png" class="user-pic" onclick="toggleMenu()">

          <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
              <div class="user-info">
                <img src="img/prof2.png">
                <h3 class="text-white">Jessie Santos</h3>
              </div>
              <hr>
              <a href="#" class="sub-menu-link">
                <img src="img/prof.png">
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
    <!-- ======= S E C T I O N S  ========= -->
    <!-- ======= H O M E ========= -->
    <section id="home">
      <div class="container">
        <div class="row">
          <div class="col-lg-$">
         
        <h1 class="text-white display-1"></h1>
          </div>
        </div>
      </div>
    </section>
<!-- ======= D E T A I L S  ========= -->
<section id="details">
  <div class="container">
    <div class="row">
      <div class="col-lg-$">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        
                                        
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Born Date</th>
                                    <th>Death Date</th>
                                    <th>Location</th>
                                    

                                     
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","deceased");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM information WHERE CONCAT(name,borndate,deathdate,location) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $information)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $information['id']; ?></td>
                                                    <td><?= $information['name']; ?></td>
                                                    <td><?= $information['borndate']; ?></td>
                                                    <td><?= $information['deathdate']; ?></td>
                                                    <td><a href= "https://www.google.com/maps/d/u/0/embed?mid=1muwOHCQSlAYepjnsA0zPYjxGhwWCn1g&ehbc=2E312F"><?= $information['location']; ?></td>
                                                    
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<!-- ======= A B O U T ========= -->

<section id="about" style="background:url(./img/loginbg.jpg);
    background-position: center;
    background-size: cover;  ba ckground-attachment: fixed;
    position: relative;
    z-index: 2;">
    
  <div class="container">
    <div class="row">
      <div class="col-lg-$">
        <div>
         
        <h1 style="clear:right">ABOUT US</h1>
        <h2>Tomb Finder: An Integrated Information Management and Tracing System for Memorial Park with Geomapping</h2>
        <h2>Ever Memorial Garden</h2>
        <p>Ever Memorial Garden, being the true memorial park of the new millenium, commits to the same ideals that have spelled the mission for most modern memorial parks. </p>
      <!-- Add font awesome icons -->
      <br><br>
      <a href="https://www.facebook.com/EverMemorialGardenLotSale?mibextid=ZbWKwL" class="fa fa-facebook"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="http://evermemorialgarden.com.ph/" class="fa fa-google"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="https://www.google.com/search?client=firefox-b-d&q=XMM%2BJ2Q%2C+E+Service+Rd%2C+Meycauayan%2C+Metro+Manila" class="fa fa-map-marker"></a>
      </div>
    </div>
  </div>
</section>
<!-- ======= T R A N S A C T I O N S ========= -->
<section id="transactions">
<div class="container">
    <div class="row">
      <div class="col-lg-$">
        <h1>Other Transactions   </h1>
        <div class="container">
          <form action="" method="post">
            <label for="fullname">Fullname</label>
            <input type="text" name="fullname" placeholder="Your name..">
            
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Your email..">
            
            <label for="message">Message</label>
            <textarea type="text" name="message" placeholder="Write something.." style="height:200px"></textarea>
        
            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
    
<!-- ======= C O N T A C T S ========= -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-$">
        <h1>Get in touch</h1>
        <div class="container">
          <form action="" method="post">
            <label for="fullname">Fullname</label>
            <input type="text" name="fullname" placeholder="Your name..">
            
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Your email..">
            
            <label for="message">Message</label>
            <textarea type="text" name="message" placeholder="Write something.." style="height:200px"></textarea>
        
            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
  </script>

  <script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu(){
      subMenu.classList.toggle("open-menu");
    }

  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
    
</body>
</html>

<?php
}else{
    header("Location: index2.php");
            exit();
}
?>