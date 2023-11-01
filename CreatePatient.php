<?php
  session_start();
  include 'Conection.php';


  $name= $age = $email = $username= $password=$Phone=$gender=$weight=$bloodgroup=$address="";
  $nameError = $ageError = $emailError = $usernameError = $passwordError = $PhoneError = $genderError = $weightError = $bloodgroupError = $addressError="";
  
?>
<?php
   
   if(isset($_POST['register'])){
     if(empty($_POST['name'])){
       $nameError = "Name is Required";
     }
     else{
       $name = $_POST['name'];
     }
     if(empty($_POST['email'])){
       $emailError = "Email is Required";
     }
     else{
       $email = $_POST['email'];
     }
     if(empty($_POST['username'])){
       $usernameError = "User Name is Required";
     }
     else{
       $username = $_POST['username'];
     }
     if(empty($_POST['password'])){
       $passwordError = "Password is Required";
     }
     else{
       $password = $_POST['password'];
     }
     if(empty($_POST['gender'])){
       $genderError = "Gender is Required";
     }
     else{
       $gender = $_POST['gender'];
     }
     if(empty($_POST['address'])){
       $addressError = "Address is Required";
     }
     else{
       $address = $_POST['address'];
     }
     if(empty($_POST['phone'])){
      $PhoneError = "Address is Required";
    }
    else{
      $Phone = $_POST['address'];
    }

    if( !empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['gender']) && !empty($_POST['address'])){
        
      // $sl = $_POST['slnumber'];
       $name=$_POST['name'];
       $email=$_POST['email'];
       $username=$_POST['username'];
       $password=$_POST['password'];
       $gender=$_POST['gender'];
       $address=$_POST['address'];
 
       $sql = "INSERT INTO patient (`Patient_Name`, `Email`, `Username`, `Password`, `gender`, `address`) VALUES ('$name','$email','$username','$password','$gender',$address)";
       mysqli_query($con,$sql);
       header("Location:PatientList.php");
     }
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
          <td><h1>Patient Register</h1> <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <a href="Dashboard.php">Dashboard</a> &nbsp &nbsp &nbsp 
            <a href="PatientList.php">Patient</a>&nbsp &nbsp &nbsp
            <a href="AppointmentView.php">Appointment</a>&nbsp &nbsp &nbsp
            <a href="Invoice.php">Transaction</a>&nbsp &nbsp &nbsp
            <a href="">Notification</a>&nbsp &nbsp &nbsp
            <a href="">Seetings</a> &nbsp &nbsp &nbsp <br> <br><br><br>
            <center>
              <table border="1" style="width: 500px;">
                <tr style="text-align:center;">
                  <td><br><br>
                    Name <input type="text" name="name" id=""><br>
                    <?php if(empty($_POST['name'])){?>
                      <span style="color:red"><?php echo $nameError;?></span><br><br>
                    <?php }?>
                    Email <input type="email" name="email" id=""><br>
                    <?php if(empty($_POST['email'])){?>
                      <span style="color:red"><?php echo $emailError;?></span><br><br>
                    <?php }?>
                    UserName <input type="text" name="username" id=""><br>
                    <?php if(empty($_POST['username'])){?>
                      <span style="color:red"><?php echo $usernameError;?></span><br><br>
                    <?php }?>
                    Password <input type="password" name="password" id=""><br>
                    <?php if(empty($_POST['password'])){?>
                      <span style="color:red"><?php echo $passwordError;?></span><br><br>
                    <?php }?>
                    Gender
                    <input type="radio" name="gender">Male
                    <input type="radio" name="gender">Female
                    <br>
                    <?php if(empty($_POST['gender'])){?>
                      <span style="color:red"><?php echo $genderError;?></span><br><br>
                    <?php }?>
                    Phone <input type="number" name="phone"><br>
                    <?php if(empty($_POST['phone'])){?>
                      <span style="color:red"><?php echo $PhoneError;?></span><br><br>
                    <?php }?>
                    Address <input type="text" name="address"> <br>
                    <?php if(empty($_POST['address'])){?>
                      <span style="color:red"><?php echo $addressError;?></span><br><br>
                    <?php }?>
                    <input type="submit" name="register" value="Save" style="color:blue;"><br><br>
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
