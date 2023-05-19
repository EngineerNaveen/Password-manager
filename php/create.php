<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['save-btn'])) 
    {
        session_start();
        $name=$_POST['c-name'];
        $number=$_POST['c-number'];
        $email=$_POST['c-email'];
        $s_no=$_SESSION['s_no'];
        
        if(true)
        {
            if ($email == '')
            {
                $email="Not Found";
            }

            include "../partials/_dbconnect.php";

            $sql="SELECT * FROM `pass_records` WHERE `s_no_user` = '$s_no' AND   `number`='$number'";
            $result=mysqli_query($conn, $sql);
        
            // echo mysqli_num_rows($result);

            // if(mysqli_num_rows($result) >= 1)
            // {
            //     $_SESSION['create_err']="Sorry, Contact allready exist...";
            // }
            if(true)
            {
                $sql="INSERT INTO `pass_records` (`name`, `number`, `email`, `s_no_user`)    VALUES ('$name', '$number', '$email', '$s_no');";

                $result=mysqli_query($conn, $sql);

                if ($result)
                {
                    $_SESSION['login_success']="Password Saved successfully ";
                    header("Location: ../index.php");
                }
                else
                {
                    $_SESSION['create_err']="Password not saved";
                }
            }


            //INSERT INTO `pass_records` (`s_no`, `name`, `number`, `email`, `s_no_user`)    VALUES (NULL, 'Durgesh kumar', '7667107173', 'Durgesh@gmail.com', '1');

        }
        else
        {
            $_SESSION['create_err']="Invalid phone number";
        }    
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Contact| Online Contact Saving</title>
    <link rel="stylesheet" href="../css/create.css">
</head>
<body>
<?php
    if(isset($_SESSION['create_err']))
    {?>
        <div class="notification" id="notification-id">
            <p><?php echo $_SESSION['create_err']; ?></p>
            <form action="" method="get">
                <button onclick="closeLoginError()">X</button>
            </form>
        </div>
<?php unset($_SESSION['create_err']);}
?>
    <div class="container">
        <div class="form-container">
            <div class="form-title">
                <p>Save New Password</p>
            </div>
            <form action="create.php" method="post" class="main-form-container">
                <div class="form-field">
                    <input type="text" name="c-name" id="c-name" maxlength="50" placeholder="Account Name" required>
                </div>

                <div class="form-field">
                    <input type="text" name="c-email" id="c-email" maxlength="100" placeholder="Username">
                </div>

                <div class="form-field">
                    <input type="tel" name="c-number" id="c-number" minlength="5" placeholder="Account Password" required>
                </div>


                <div class="form-field">
                    <input type="submit" name="save-btn" id="save-btn" value="Save">
                </div>
            </form>
        </div>
    </div>

    <script src="../javascript/index.js"></script>
</body>
</html>