<?php 
include 'Conection.php';
$delid=$_GET['delete'];
if(isset($_GET['delete'])){
    $delid=$_GET['delete'];
    $sql="delete from patient WHERE SLNo ='$delid';";
    mysqli_query($con,$sql);
    header("location:PatientList.php");
}

?>