<?php 
    include 'Conection.php';
    $editinvoice = $_GET['edit'];
    
    if(isset($_GET['update'])){
        $slno = $_GET['slno'];
        $appointmentid= $_GET['appointmentid'];
        $patientname= $_GET['patientname'];
        $doctorname= $_GET['doctorname'];
        $serial= $_GET['serial'];
        $appointmentdate= $_GET['appointmentdate'];
        $payment=$_GET['payment'];
        $paymenttype= $_GET['paymenttype'];
        $status= $_GET['status'];

        $sql ="UPDATE invoice SET `Appointment_ID`='$appointmentid',`Patient_Name`='$patientname',`Doctor_Name`='$doctorname',`Serial`='$serial',`Payment`='$payment',`Appointment_Date`='$appointmentdate',`Payment_Type`='$paymenttype',`Status`='$status' WHERE SLNo=$slno";
        mysqli_query($con,$sql);
        header("location:Invoice.php");
    }
    $sql = "select * from invoice where SLNo = $editinvoice;";
    $result=mysqli_query($con,$sql);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <title>Document</title>
 </head>
 <body>
 <center>
            <table border="1" style="width: 700px;">
                <tr style="width:200px; heigth: 10px;">
                    <td style="text-align: right;" >Staff |Logout <br><br><br></td>
                </tr>
                <tr style="height:200px;">
                    <td><h1>Edit Invoice</h1><br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <a href="Dashboard.php">Dashboard</a> &nbsp &nbsp &nbsp 
                        <a href="PatientList.php">Patient</a>&nbsp &nbsp &nbsp
                        <a href="AppointmentView.php">Appointment</a>&nbsp &nbsp &nbsp
                        <a href="Invoice.php">Transaction</a>&nbsp &nbsp &nbsp
                        <a href="">Notification</a>&nbsp &nbsp &nbsp
                        <a href="">Seetings</a> &nbsp &nbsp &nbsp <br> <br><br><br>
                        <center>
                            <table border="1" style="width: 500px;">
                            <form method="get">
                            <?php while($r=mysqli_fetch_assoc($result)){?>
                                <tr style="text-align:center;">
                                    <td>
                                        <label>SLNo</label>
                                        <input type="number" name="slno" value="<?php echo $r['SLNo'];?>" readonly><br><br>
                                        <label>AppointmentID</label>
                                        <input type="text" name="appointmentid" value="<?php echo $r['Appointment_ID'];?>"><br><br>
                                        <label>Patient Name</label>
                                        <input type="text" name="patientname" value="<?php echo $r['Patient_Name'];?>"><br><br>
                                        <label>Doctor Name</label>
                                        <input type="text" name="doctorname" value="<?php echo $r['Doctor_Name'];?>"><br><br>
                                        <label>Serial</label>
                                        <input type="number" name="serial" value="<?php echo $r['Serial'];?>"><br><br>
                                        <label>Appoinment Date</label>
                                        <input type="text" name="appointmentdate" value="<?php echo $r['Appointment_Date'];?>"><br><br>
                                        <label>Payment</label>
                                        <input type="number" name="payment" value="<?php echo $r['Payment'];?>"><br><br>
                                        <label>Payment Type</label>
                                        <input type="text" name="paymenttype" value="<?php echo $r['Payment_Type'];?>"><br><br>
                                        <label>Status</label>
                                        <input type="text" name="status" value="<?php echo $r['Status'];?>"><br><br>
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
