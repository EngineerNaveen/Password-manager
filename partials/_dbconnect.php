<?php

$server='localhost';
$dbuname='root';
$dbpassword='';
$db_name='password_manager';

$conn=mysqli_connect($server, $dbuname, $dbpassword, $db_name);
if($conn)
{
}
else
{
    echo"Could not connected";
}

?>