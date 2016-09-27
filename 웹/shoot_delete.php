<?php

session_start();

if(!isset($_SESSION['userid'])) return;

$userid = $_SESSION['userid'];

$mysqli = new mysqli('127.0.0.1', 'graduate', 'bitnami', 'my_game') or die('mysqli connect error');

$sql = "DELETE from ShootUserAccount where userid='$userid';";

if($mysqli->query($sql))
{
    echo "delete success";
}
else 
{
   echo "delete failed";
}

$mysqli->close();

?>