<?php
  include 'Conection.php';
  session_start();
  
 if(isset($_POST['delete'])){
    $sl = $_POST['delete'];
    $sql="delete from invoice WHERE SLNo='$sl'";
    mysqli_query($con,$sql);
  }


  $sql = "select * from invoice";
  $result = mysqli_query($con,$sql);

  
  if(isset($_POST['addpayment'])){
    header("Location:AddInvoice.php");
  }

?>



<!DOCTYPE HTML>
<html>
  <head>
    <title></title>
  </head>
  <body>
    <form method="post">
      <center><table border="1" style="width: 700px;">
        <tr style="width:200px; heigth: 10px;">
          <td style="text-align: right;" >Staff |Logout <br><br><br></td>
        </tr>
        <tr style="height:200px;">
          <td><h1>Invoice</h1><br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <a href="Dashboard.php">Dashboard</a> &nbsp &nbsp &nbsp 
            <a href="">Patient</a>&nbsp &nbsp &nbsp
            <a href="AppointmentView.php">Appointment</a>&nbsp &nbsp &nbsp
            <a href="Invoice.php">Transaction</a>&nbsp &nbsp &nbsp
            <a href="">Notification</a>&nbsp &nbsp &nbsp
            <a href="">Seetings</a> &nbsp &nbsp &nbsp <br> <br><br><br>
            
            <center>
              <table border="" style="width: 500px;">
                 <tr style="text-align:center;">
                    <br><br>
                    <th>SL No</th>
                    <th>Appointment_ID</th>
                    <th>Patient Name</th>
                    <th>Doctor name</th>
                    <th>Serial</th>
                    <th>Payment</th>
                    <th>Date</th>
                    <th>Payment Type</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                                
                  <?php while($r=mysqli_fetch_assoc($result)){ ?>
                  <tr>
                    <td><?php echo $r['SLNo']; ?></td>
                    <td><?php echo $r['Appointment_ID']; ?></td>
                    <td><?php echo $r['Patient_Name'];?></td>
                    <td><?php echo $r['Doctor_Name']; ?></td>
                    <td><?php echo $r['Serial']; ?></td>
                    <td><?php echo $r['Payment'];?></td>
                    <td><?php echo $r['Appointment_Date']; ?></td>
                    <td><?php echo $r['Payment_Type']; ?></td>
                    <td><?php echo $r['Status'];?></td>
    </form>
                    <td>
                      <form action="EditInvoice.php" method="get"><button type="submit" name="submit" value="<?php echo $r["SLNo"] ; ?>">Edit</button></form> 
                      <button type="submit" name="delete" value="<?php echo $r['SLNo'] ; ?>">Delete</button>
                    </td>
                                  
                  </tr>
                  <?php }?>
              </table><br><br>
            </center>

          </td>
        </tr> <br><br><br><br>
      </table></center>
    
  </body>
</html>