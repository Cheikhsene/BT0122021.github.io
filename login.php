<?php session_start(); 
include_once('includes/config.php');

if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];
$ret= mysqli_query($con,"SELECT id,fname FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{

$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
header("location:welcome.php");

}
else
{
echo "<script>alert('Invalid username or password');</script>";
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
                    <div class="login-form">
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control"  class="form-control" name="uemail" type="email" placeholder="name@blackman.sn" required>
                                    <label for="inputEmail"></label>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" name="password" type="password" placeholder="Mot de passe" required>
                                    <label for="inputPassword"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" name="login" type="submit"  >Connexion</button>
                            </div>
                        </form>
                    </div>
                    <a class="d-lg-flex justify-content-lg-center align-items-lg-end" href="signup.php" style="background: rgba(232,62,140,0);color: #00b2ff;">Besoin d'un compte ?</a>
                    <a class="d-lg-flex justify-content-lg-center align-items-lg-end" href="password-recovery.php" style="color: var(--white);">Mot de passe oublié ?</a>
                    <div class="small"><a href="index.php">Retour</a></div>
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