<?php 
include 'Conection.php';

$patientedit = $_GET['edit'];


if(isset($_GET['update'])){
    $slno = $_GET['slno'];
    $pname = $_GET['name'];
    $pemail = $_GET['email'];
    $pusername = $_GET['username'];
    $pgender = $_GET['gender'];
    $pphone = $_GET['phone'];
    $paddress = $_GET['address'];

    $sql1 = "update patient set Patient_Name='$pname', Email='$pemail', Username='$pusername', Gender='$pgender', Phone=$pphone, Address= '$paddress' where SLNo=$slno";
    mysqli_query($con,$sql1);
    header("location:PatientList.php");

}
$sql="select * from patient where SLNo=$patientedit";
$res=mysqli_query($con,$sql);


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
                    <td><h1>UPDATE Patient</h1><br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <a href="Dashboard.php">Dashboard</a> &nbsp &nbsp &nbsp 
                        <a href="PatientList.php">Patient</a>&nbsp &nbsp &nbsp
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
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?php echo $r['Patient_Name'];?>"><br><br>
                                        <label>Email</label>
                                        <input type="text" name="email" value="<?php echo $r['Email'];?>"><br><br>
                                        <label>Username</label>
                                        <input type="text" name="username" value="<?php echo $r['Username'];?>"><br><br>
                                        <label>Gender</label>
                                        <input type="text" name="gender" value="<?php echo $r['Gender'];?>"><br><br>
                                        <label>Phone</label>
                                        <input type="number" name="phone" value="<?php echo $r['Phone'];?>"><br><br>
                                        <label>Address</label>
                                        <input type="textarea" name="address" value="<?php echo $r['Address'];?>"><br><br>
                                        <?php } ?>
                                        <button name="update">UPDATE</button><br><br>

                                    </td>
                                </tr>
                                
                                
                                </form>
                            </table><br>
                            
                        </center>
                </tr>
        </table></center>
    </body>
</html>