<?php
session_start();
$id=$_GET['id'];
echo $id;

include "../partials/_dbconnect.php";

$sql="DELETE FROM `pass_records` WHERE `pass_records`.`s_no` = $id;";
$result=mysqli_query($conn, $sql);
if ($result)
{
    $_SESSION['login_success']="password deleted successfully";
    header("Location: ../index.php");
}
else
{
    echo"could not delete the password";
}


?>