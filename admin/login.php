<?php require '../config.php';  ?>
<?php
if(isset($_SESSION['admin_name']))
{
    header ("location:" .BURLA.'index.php');
}
?>

<?php require BL.'functions/validate.php';  ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/style.css" >

    <title>Dashboard | Login</title>
  </head>
  <body>

        <?php

            if(isset($_POST['submit']))
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                if(checkEmpty($email) && checkEmpty($password))
                {
                    if(ValidEmail($email))
                    {
                        $check = getRow('admins','admin_email',$email);
                        $check_password = password_verify($password,$check['admin_password']);

                        if ($check_password)
                        {

                           $_SESSION['admin_name'] = $check['admin_name'];
                           $_SESSION['admin_email'] = $check['admin_email'];
                           $_SESSION['admin_id'] = $check['admin_id'];

                           header("location:".BURLA.'index.php');

                        }else{
                            $error_message = 'Data Not correct';
                        }
                    }else
                    {
                        $error_message = 'please type correct email';
                    }
                }
                else
                {
                    $error_message = 'please fill all fields';
                }
            }
                    
        
        
        
        
        ?>



        <div class="cont-login d-flex align-items-center justify-content-around">

        
        
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="border p-5" >
                <div class="row">
                    
                    <?php  require BL.'functions/messages.php'; ?>
                    <div class="col-sm-12  ">
                        <h3 class="text-center p-3 text-white">Login</h3>
                    </div>
                    <div class="col-sm-6 offset-sm-3 ">
                        <div class="form-group">
                            <label >Email </label>
                            <input type="email" name="email" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label >Password </label>
                            <input type="password" name="password" class="form-control" >
                        </div>

                        <div class="form-group">
                           
                            <input type="submit" name="submit" class="form-control btn btn-success"   >
                        </div>
                    </div>
                </div>
                
            </form>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo ASSETS; ?>/js/jquery-3.4.1.min.js" ></script>
    <script src="<?php echo ASSETS; ?>/js/popper.min.js" ></script>
    <script src="<?php echo ASSETS; ?>/js/bootstrap.min.js" ></script>




  </body>
</html>
