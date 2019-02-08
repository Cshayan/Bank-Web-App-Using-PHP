<?php
$servername="localhost";
$username="id7694703_bank123";
$pd="12345678";
$dbname="id7694703_bank";

$conn=mysqli_connect($servername,$username,$pd,$dbname);

if(!$conn)
{
    die ("Connection failed".mysqli_connect_error());
}
?>
