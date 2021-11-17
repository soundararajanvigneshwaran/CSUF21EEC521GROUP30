<?php
$name =$_POST['customername']
$password =$_POST['password']
$review =$_POST['reviews']
if(!empty($name)||!empty($password)||!empty($reviews))
{
    $host = "localhost";
    $dbusername ="root";
    $dbpassword ="admin";
    $dbname="Dividefeedback"
}
?>