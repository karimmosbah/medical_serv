<?php require '../../config.php';  ?>

<?php require BLA.'inc/header.php';  ?>
<?php require BL.'functions/validate.php';  ?>


    <?php 

        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
          
            if(checkEmpty($name) AND checkEmpty($email) AND checkEmpty($password))
            {
                if(validEmail($email))
                {
                     $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
                     $sql = "INSERT INTO admins (`admin_name`,`admin_email`,`admin_password`)
                     VALUES ('$name','$email','$hashedpassword') ";
                     $success_message = db_insert($sql);
                }
                else 
                {
                    $error_message = "Please Type Correct Email";
                }
            }
            else 
            {
                $error_message = "Please fill all fields";
            }
            require BL.'functions/messages.php';
        }


    ?>


    <div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label >Name </label>
                <input type="text" name="name" class="form-control" >
            </div>

            <div class="form-group">
                <label >Email </label>
                <input type="email" name="email" class="form-control" >
            </div>

            <div class="form-group">
                <label >Password </label>
                <input type="password" name="password" class="form-control" >
            </div>

            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
       
    </div>


<?php require BLA.'inc/footer.php';  ?>




