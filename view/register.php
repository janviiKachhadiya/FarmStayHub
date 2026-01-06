<?php 
include('database.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer files
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

session_start();
if(isset($_SESSION['guest_id'])){
	header("location:dashboard.php");
}
$nameError = $emailError = $contactError = $passwordError = "";

if(isset($_POST['save'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $password=$_POST['password'];
  // Server-side validation
  $isValid = true;

  if (empty($name)) {
    $nameError = "Name Field Required!";
    $isValid = false;
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailError = "Invalid email format.";
    $isValid = false;
  }
  if (!preg_match("/^\d{10}$/", $contact)) {
    $contactError = "Contact number must be exactly 10 digits.";
    $isValid = false;
  }
  if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
    $passwordError = "Password must be at least 8 characters long and contain at least one letter and one number.";
    $isValid = false;
  }

  if($isValid){
    $validEmail="select * from guest where email='$email'";
  $resValid=$obj->query($validEmail,5);
  if($resValid==0){
    $sql = "insert into guest(name,email,password,contact)values('$name','$email','$password','$contact')";
    $res=$obj->query($sql,3);
    if($res != 0){
      echo '<script>alert("Registration successfully.")</script>';
      $mail = new PHPMailer(true);

      try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'farmstayhub21@gmail.com'; 
        $mail->Password = 'xzbv hufo fimo usnx'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('farmstayhub21@gmail.com', 'FarmHouse Booking');
        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Registration Successful';
        $mail->Body    = "Hello $name,<br><br>Thank you for registering with FarmHouse Booking.<br><br>Regards,<br>FarmHouse Team";

        $mail->send();
        echo '<script>alert("A confirmation email has been sent.")</script>';
        header('location:login.php');
      } catch (Exception $e) {
        echo '<script>alert(`Error sending confirmation email: {$mail->ErrorInfo}`)</script>';
      }
    } else {
      echo '<script>alert("Error: " . mysqli_error($con))</script>';
    }
  }else{
    echo '<script>alert("Your Email Already Registerd.")</script>';
  }
  }
}
?>
<!-- register -->
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Farmstay Hub</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assest/vendors/feather/feather.css">
  <link rel="stylesheet" href="../assest/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../assest/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assest/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h3 style="align-items: center;text-align: center;font-weight: bold;">Guest Register</h3>
              <form class="pt-3" method="post">
              <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username" autofocus/>
                  <div class="text-danger"><?php echo $nameError; ?></div>
                </div>
                <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"/>
                <div class="text-danger"><?php echo $emailError; ?></div>
                </div>
                <div class="form-group">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                <div class="text-danger"><?php echo $passwordError; ?></div>
                </div>
                <div class="form-group">
                <input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter your Contact number"/>
                <div class="text-danger"><?php echo $contactError; ?></div>
                </div>
                <div class="mt-3">
                  <a><input type="submit" name="save" value="Register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="background:#3b71fe;border-color:#3b71fe;"></a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  You have an account? <a href="login.php" class="text-primary">Sign in</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assest/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assest/js/off-canvas.js"></script>
  <script src="../assest/js/hoverable-collapse.js"></script>
  <script src="../assest/js/template.js"></script>
  <script src="../assest/js/settings.js"></script>
  <script src="../assest/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>