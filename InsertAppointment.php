<?php
  include 'Conection.php';
  
  $Serial = $apnmnt_ID = $patnt_name = $dctr_name = $deprtmnt = $dte = $srl = ""; 
  $SerialError = $apnmnt_IDError = $patnt_nameError = $dctr_nameError = $deprtmntError = $dteError = $srlError = "";
?>

<?php 
   
   if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['register'])){
     if(empty($_POST['appointmentid'])){
       $apnmnt_IDError = "Appointment Id is required";
     }else{
       $apnmnt_ID =$_POST["appointmentid"];
     }
     if(empty($_POST['patientname'])){
       $patnt_nameError = "Patient Name is required";
     }else{
       $patnt_name =$_POST["patientname"];
     }
     if(empty($_POST['doctorname'])){
       $dctr_nameError = "Doctor Name is required";
     }else{
       $doctor_name = $_POST['doctorname'];
     }
     if(empty($_POST['department'])){
       $deprtmntError = "Department is required";
     }else{
       $deprtmnt = $_POST["department"];
     }
     if(empty($_POST['date'])){
       $dteError = "Date is required";
     }else{
       $dte = $_POST["date"];
     }
     if(empty($_POST['serial'])){
       $srlError = "Serial is required";
     }else{
       $srl = $_POST["serial"];
     }

     // Insertion
     if( !empty($_POST['appointmentId']) && !empty($_POST['patientname']) && !empty($_POST['doctorname']) && !empty($_POST['department']) && !empty($_POST['date']) && !empty($_POST['serial'])){
        
     // $sl = $_POST['slnumber'];
      $id=$_POST['appointmentId'];
      $patient_name=$_POST['patientname'];
      $doctor_name=$_POST['doctorname'];
      $department=$_POST['department'];
      $Date=$_POST['date'];
      $serial=$_POST['serial'];

      $sql2 = "INSERT INTO appointment(`AppoinmentID`, `Patient_name`, `Doctor_name`, `Department`, `Appoinment_date`, `Serial`) VALUES ('$id','$patient_name','$doctor_name','$department','$Date',$serial)";
      mysqli_query($con,$sql2);
      header("Location:AppointmentView.php");
    }
  }

}

?>


<!DOCTYPE HTML>
<html>Appointment Insertion</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
      <center><table border="1" style="width: 700px;">
        <tr style="width:200px; heigth: 10px;">
          <td style="text-align: right;" >Staff |Logout <br><br><br></td>
        </tr>
        <tr style="height:200px;">
          <td><h1>Appointment Register</h1> <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <a href="Dashboard.php">Dashboard</a> &nbsp &nbsp &nbsp 
            <a href="">Patient</a>&nbsp &nbsp &nbsp
            <a href="AppointmentView.php">Appointment</a>&nbsp &nbsp &nbsp
            <a href="Invoice.php">Transaction</a>&nbsp &nbsp &nbsp
            <a href="">Notification</a>&nbsp &nbsp &nbsp
            <a href="">Seetings</a> &nbsp &nbsp &nbsp <br> <br><br><br>
            <center>
              <table border="1" style="width: 500px;">
                <tr style="text-align:center;">
                  <td><br><br>
                    
                    Appointment_ID: 
                    <input type="text" name="appointmentId" id=""><br>
                    <?php if(empty($_POST['appointmentId'])){?>
                    <span style="color:red;"><?php echo $apnmnt_IDError;?></span><br><br>
                    <?php } ?>
                    Patient Name: 
                    <input type="text" name="patientname" id="" ><br>
                    <?php if(empty($_POST['patientname'])){?>
                    <span style="color:red;"><?php echo $patnt_nameError;?></span><br><br>
                    <?php } ?>
                    <select name="doctorname" id="" >
                      <option value="">Select_Doctor</option>
                      <option value="A">A</option>
                      <option value="B">B</B></option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                      <option value="F">F</option>
                    </select><br>
                    <?php if(empty($_POST['doctorname'])){?>
                    <span style="color:red;"><?php echo $dctr_nameError;?></span><br><br>
                    <?php }?>
                    Department: 
                    <input type="text" name="department"><br>
                    <?php if(empty($_POST['department'])){?>
                    <span style="color:red;"><?php echo $deprtmntError;?></span><br><br>
                    <?php } ?>
                    Appointment Date: 
                    <input type="date" name="date" id="" ><br>
                    <?php if(empty($_POST['date'])){?>
                    <span style="color:red;"><?php echo $dteError;?></span><br><br>
                    <?php } ?>
                    serial:
                     <input type="number" name="serial" id="" ><br>
                     <?php if(empty($_POST['serial'])){?>
                     <span style="color:red;"><?php echo $srlError;?></span><br><br>
                     <?php } ?>
                    <input type="submit" name="register" id="" value="Save" style="color:blue;" ><br><br>
                  </td>
                </tr>
              </table><br><br>
            </center>

          </td>
        </tr> <br><br><br><br>
      </table></center>
    </form>
    
  </body>
</html>
