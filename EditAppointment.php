

<?php 
include 'Conection.php';

$id =$_GET['edit'];
$sql="select * from appointment where SLNo='$id'";
$res=mysqli_query($con,$sql);
if(isset($_GET['update'])){
    $slno = $_GET['slno'];
    $appointmentid=$_GET['appointmentid'];
    $patientname=$_GET['patientname'];
    $doctorname=$_GET['doctorname'];
    $department=$_GET['department'];
    $appointmentdate=$_GET['appointmentdate'];
    $serial=$_GET['serial'];

    $sql="UPDATE `appointment` SET `AppoinmentID`='$appointmentid',`Patient_name`='$patientname',`Doctor_name`='$doctorname',`Department`='  $department',`Appoinment_date`='$appointmentdate',`Serial`=$serial WHERE SLNo=$slno;";
    mysqli_query($con,$sql);
    header("location:AppointmentView.php");
}
?>

<!DOCTYPE HTML>
<html>
    <body>
        <center>
            <table border="1" style="width: 700px;">
                <tr style="width:200px; heigth: 10px;">
                    <td style="text-align: right;" >Staff |Logout <br><br><br></td>
                </tr>
                <tr style="height:200px;">
                    <td><h1>Appoinment View</h1><br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <a href="Dashboard.php">Dashboard</a> &nbsp &nbsp &nbsp 
                        <a href="">Patient</a>&nbsp &nbsp &nbsp
                        <a href="AppointmentView.php">Appointment</a>&nbsp &nbsp &nbsp
                        <a href="Invoice.php">Transaction</a>&nbsp &nbsp &nbsp
                        <a href="">Notification</a>&nbsp &nbsp &nbsp
                        <a href="">Seetings</a> &nbsp &nbsp &nbsp <br> <br><br><br>
                        <center>
                            <table border="1" style="width: 500px;">
                            <form method="get">
                            <?php while($r=mysqli_fetch_assoc($res)){?>
                                <tr style="text-align:center;">
                                    <td>
                                        <label>SLNo</label>
                                        <input type="number" name="slno" value="<?php echo $r['SLNo'];?>" readonly><br><br>
                                        <label>AppointmentID</label>
                                        <input type="text" name="appointmentid" value="<?php echo $r['AppoinmentID'];?>"><br><br>
                                        <label>Patient Name</label>
                                        <input type="text" name="patientname" value="<?php echo $r['Patient_name'];?>"><br><br>
                                        <label>Doctor Name</label>
                                        <input type="text" name="doctorname" value="<?php echo $r['Doctor_name'];?>"><br><br>
                                        <label>Department</label>
                                        <input type="text" name="department" value="<?php echo $r['Department'];?>"><br><br>
                                        <label>Appoinment Date</label>
                                        <input type="text" name="appointmentdate" value="<?php echo $r['Appoinment_date'];?>"><br><br>
                                        <label>serial</label>
                                        <input type="number" name="serial" value="<?php echo $r['Serial'];?>"><br><br>
                                        <?php } ?>
                                        <button name="update">UPDATE</button><br><br>

                                    </td>
                                </tr>
                                
                                </form>
                            </table><br><br>
                        </center>
                </tr>
        </table></center>
    </body>
</html>
