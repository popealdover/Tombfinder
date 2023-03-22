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

    <title>Update Information</title>
  </head>
  <body>
 
                    <div class="container mt-5">
                    <?php include('message.php'); ?>

                <div class="row">
            <div class="col-md-12">
        <div class="card">
    <div class="card-header">
        <h4>Update Deceased Information
        <a href="index1.php" class="btn btn-danger float-end">Back</a>
        </h4>
    </div>
            <div class="card-body">

<?php

if(isset($_GET['id']))
{

$deceased_id = mysqli_real_escape_string($con, $_GET['id']);
$query = "SELECT * FROM information WHERE id='$deceased_id'";
$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0)

{
    $deceased= mysqli_fetch_array($query_run);
    ?>
    <form action="code.php" method="POST">
        <input type="hidden" name="deceased_id" value="<?= $deceased['id']; ?>">
  <div class="mb-3">
         <label>Full Name</label>
            <input type="text" name="name" value="<?= $deceased['name'];?>" class="form-control">
         </div>
         <div class="mb-3">
         <label>Born Date</label>
            <input type="text" name="borndate" value="<?= $deceased['borndate'];?>" class= "form-control">
         </div>
         <div class="mb-3">
         <label>Death Date</label>
            <input type="text" name="deathdate"value="<?= $deceased['deathdate'];?>" class="form-control">
         </div>
         <div class="mb-3">
         <label>Location</label>
            <input type="text" name="location"value="<?= $deceased['location'];?>" class="form-control">
         </div>
         <div class="mb-3">
            <button type="submit" name="update_info" class="btn btn-primary">
                Update Information

            </button>
         </div>



            </div>
            </div>
        </div>
    </div>
</div>

</form>

<?php
}
else
{

    echo "<h4>No Such ID Found</h4>";
}
}

?>

            

       
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>