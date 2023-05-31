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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Tomb Finder</title>

    <link rel="stylesheet" href="style.css">
    
  <link rel="stylesheet" type="text/css" href="table.css">
  <style>
         html,
        body {
            width: 100%;
            margin: 0;
            padding: 0;
        }
        </style>
  </head>
  <body>

  

   <nav class="navbar navbar-expand-lg py-0 bg-dark fixed-top">
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
              <a class="nav-link" href="#details">SEARCH LOCATION</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">LANDS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#service">SERVICES</a>
              </li>
              
              <li class="nav-item">
              <a class="nav-link" href="#GUIDE">GUIDELINES</a>
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
  <div class="container" data-aos="fade-up" data-aos-duration  = "700">
    <div class="row">
      <div class="col-lg-$">
      <div class="container">
        <div class="row" >
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                    <h1>DISCLAIMER:</h1>
                    <p>We display personal information such as display name and born date to enhance your experience on our website. This information is used for search only we take our client privacy seriously and will never sell or share their personal information with third parties.</p>
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
                                                    <td><a href= mapindex.html><?= $information['location']; ?></td>
                                                    
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

    
<!-- ======= A B O U T ========= -->
<section id="about">
<div class="section-title" data-aos="fade-up" data-aos-duration  = "700">
            <h1 class="display-4 fw-semibold text-center text-white">LANDS</h1>
            <div id="carouselExampleControls" class="carousel " data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="card">
                <div class="img-wrapper"><img src="img/lawn lots.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Lawn Lot</h5>
                    <p class="card-text">The Lawn Lot is the simplest and Actually the most prominent feature in our park 60% of the entire inventory allocation is the lawn type.
</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/presidential court.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Presidential Court</h5>
                    <p class="card-text">This is the modern version of Niches or tombs in the local Cemetery or we found mostly In public and catholic cemeteries.</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/pillar estate.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Pillar Estate</h5>
                    <p class="card-text">It is one category of the Family Estate. It is a 12 up to 16 lots inventory with a buildable area of 10.64 sq.m <br> <br></p> 
</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/garden estate.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Garden Estate</h5>
                    <p class="card-text">It is one category of the Family Estate. An 18 up to 27 lot inventory measuring 43.92 sq.meters with a buildable area of 17.60 sq. meters which is ideal for private family mausoleum.</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/terrace estate.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Terrace Estate</h5>
                    <p class="card-text"> It is one category of the Family Estate. A standard terrace estate a 28 prime lots measuring 68.32 sq. meters. With a buildable area of 31.60 sq.meters which is also ideal for private family mausoleum.
</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/senior estate.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Senior Estate</h5>
                    <p class="card-text"> It is one category of the Family Estate. A standard terrace estate a 28 prime lots measuring 68.32 sq. meters. With a buildable area of 31.60 sq.meters which is also ideal for private family mausoleum.</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/premier estate.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Premier Estate</h5>
                    <p class="card-text">It is one category of the Family Estate. A 72 prime lots measuring 175.68 sq.meters with buildable area of 87.84 sq.meters</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/colombarium.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Columbarium</h5>
                    <p class="card-text">Around 2000 garden crypts are available in response to the growing demand for cremation and decent and affordable storage spaces for cremated remains.</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</section>

<!-- ======= T R A N S A C T I O N S ========= -->
<section id="service">
<div class="section-title" data-aos="fade-up" data-aos-duration  = "700">
            <h1 class="display-4 fw-semibold text-center text-white">SERVICES</h1>
            <div id="carouselExampleControls" class="carousel " data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/service 1.png" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Cleaning Services</h5>
                    <p class="card-text">This are the under of cleaning services Sweeping and washing, Grave cleaning/ care, and Trash removal. <br>  <br>  </p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/service 2.png" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Maintenance Services</h5>
                    <p class="card-text">This are the under of maintenance services Grass cutting and weed control, Repaint, Fence and gate maintenance, and Security</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card">
                <div class="img-wrapper"><img src="img/service 3.png" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                    <h5 class="card-title">Cremation</h5>
                    <p class="card-text">Cremation can be a more environmentally friendly option than traditional burial because it doesn't require the use of embalming chemicals or the use of land for burial.</p>
                    <a href="#" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
        
    </div>
 
</div>
</section>
        
 <!-- ======= GUIDELINES========= -->
 <section id="GUIDE">
<section class = "section-guidelines"  data-aos="fade-up" data-aos-duration  = "700">
<h1 class="display-5 text-center text-white">ABOUT US</h1>
<h5 class="text-white text-center">Ever Memorial Garden, Inc. (EMGCI) is the owner and developer of a 044-hectare memorial park located at the boundaries of Valenzuela City and Meycauayan, Bulacan. Ever Memorial Garden have perfectly set its direction towards a vision that would bring it to the fulfillment of its mission.                            </h5>


<h1 class="text-white">GUIDELINES</h1>
<ul class="text-white">1. Search function: The web system have a search function that allows users to find a specific tomb by entering the name of the person they are looking for. </ul>
<ul class="text-white">2. User Accounts: The web system should require users to authenticate their credentials for opening their social media account for inquire messaging </ul>
<ul class="text-white">3.Mobile responsiveness: The system designed as mobile-friendly, users allow to access it from their smartphones or tablets. </ul>
<ul class="text-white">4.Maintenance and cleaning services: The system offer maintenance and cleaning services to keep the tombs and surrounding areas in good condition.</ul>
<ul class="text-white">5. Other Inquires/ Question: The system offer a messenger bot to directly ask what their other concern.</ul>

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
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script> 
  
AOS.init();

    </script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
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