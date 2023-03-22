<?php
session_start();
require 'dbcon.php';


if(isset($_POST['delete_deceased']))
{


$deceased_id = mysqli_real_escape_string($con, $_POST['delete_deceased']);


$query= "DELETE FROM information WHERE id='$deceased_id'";
$query_run = mysqli_query($con, $query);


if($query_run)
{

    $_SESSION['message'] = "Deleted Successfully";
    header("Location: index1.php");
    exit(0);

}
else
{

    $_SESSION['message'] = "Delete Not Successful";
    header("Location: index1.php");
    exit(0);


}


}


if(isset($_POST['update_info']))
{

    $deceased_id = mysqli_real_escape_string($con, $_POST['deceased_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $borndate = mysqli_real_escape_string($con, $_POST['borndate']);
    $deathdate = mysqli_real_escape_string($con, $_POST['deathdate']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    

    $query =  "UPDATE information SET name= '$name', borndate='$borndate', deathdate= '$deathdate', location= '$location' 
    WHERE id= '$deceased_id'";

    $query_run= mysqli_query($con, $query);

    if($query_run)
    {

        $_SESSION['message'] = "Update Successfully";
        header("Location: index1.php");
        exit(0);
    

    }
    else
    {

        $_SESSION['message'] = "Update Not Successful";
        header("Location: index1.php");
        exit(0);
    


    }


}




if(isset($_POST['save_info']))
{
$name = mysqli_real_escape_string($con, $_POST['name']);
$borndate = mysqli_real_escape_string($con, $_POST['borndate']);
$deathdate = mysqli_real_escape_string($con, $_POST['deathdate']);
$location = mysqli_real_escape_string($con, $_POST['location']);

$query = "INSERT INTO information (name,borndate,deathdate,location) VALUES 
('$name','$borndate','$deathdate','$location')";

$query_run = mysqli_query($con, $query);
if($query_run)
{
    $_SESSION['message'] = "Input Successfully";
    header("Location: deceased-create.php");
    exit(0);
    }
    else
    {
        $_SESSION['message'] = "Input Failed";
        header("Location: deceased-create.php");
        exit(0);

    }

}

?>