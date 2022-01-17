<?php
include('includes/config.php');
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require 'vendor/autoload.php';

$mail = new PHPMailer;
if(isset($_POST['send'])){


$femail=$_POST['femail'];

$row1=mysqli_query($con,"select email,password,fname from users where email='$femail'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{
$toemail = $row2['email'];
$fname = $row2['fname'];
$subject = "Information about your password";
$password=$row2['password'];
$message = "Your password is ".$password;
$mail->isSMTP();                           
$mail->Host = 'smtp.gmail.com';             
$mail->SMTPAuth = true;                     
$mail->Username = 'your gmail id here';    
$mail->Password = 'your gmail password here';
$mail->SMTPSecure = 'tls';                  
$mail->Port = 587;                        
$mail->setFrom('your gmail id here','your name here');
$mail->addAddress($toemail);   
$mail->isHTML(true); 
$bodyContent=$message;
$mail->Subject =$subject;
$bodyContent = 'Dear'." ".$fname;
$bodyContent .='<p>'.$message.'</p>';
$mail->Body = $bodyContent;
if(!$mail->send()) {
echo  "<script>alert('Message could not be sent');</script>";
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo  "<script>alert('Your Password has been sent Successfully');</script>";
}

}
else
{
echo "<script>alert('Email not register with us');</script>";   
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css">
    <link rel="stylesheet" href="assets2/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets2/css/styles.css">
    <link rel="stylesheet" href="assets2/css/TextEditor.css">
    <link rel="stylesheet" href="assets2/css/untitled-1.css">
    <link rel="stylesheet" href="assets2/css/untitled.css">
</head>

<body>
    <div class="container-fluid main-panel" style="filter: blur(0px) grayscale(0%) hue-rotate(0deg) invert(0%);">
        <div class="row d-lg-flex justify-content-lg-center align-items-lg-end">
            <div class="col d-flex justify-content-center align-items-center" style="color: var(--indigo);background: rgba(52,58,64,0);">
                <div class="login-panel" style="height: 500px;background: rgba(111,66,193,0.43);">
                    <div class="login-user-avatar" style="background: url(&quot;assets/img/user-icon.jpg&quot;), var(--blue);background-size: contain, auto;"></div>
                    <h2 align="center" style="color:antiquewhite">Réinitialisation du mot de passe</h2>
<hr />
                    <div class="login-form">
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control"  class="form-control"  name="femail" type="email" placeholder="name@blackman.sn" required>
                                    <label for="inputEmail"></label>
                                </div>
                            </div>


                          

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit" name="send"  >reinitialiser</button>
                            </div>
                        </form>
                    </div>
                    <a class="d-lg-flex justify-content-lg-center align-items-lg-end" href="signup.php" style="background: rgba(232,62,140,0);color: #00b2ff;">Besoin d'un compte ?</a>
                    <a class="d-lg-flex justify-content-lg-center align-items-lg-end" href="index.php" style="color: var(--white);">Retour</a>
                   
                    <div class="login-response has-error">
<?php include('includes/footer.php');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src="assets/js/TextEditor.js"></script>
</body>

</html>







