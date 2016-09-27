<?php

session_start();

if(!empty($_REQUEST)){
    $userid = $_REQUEST['userid'];
    $passwd = $_REQUEST['passwd'];
    $name = $_REQUEST['name'];
} else {
    echo "member fail";
    return;
}

$win = 0;
$lose = 0;
$score = 0;

$mysqli = new mysqli('127.0.0.1', 'graduate', 'bitnami', 'my_game') or die('mysqli connect error');

$sql = "INSERT into ShootUserAccount VALUES('$userid', sha2('$passwd',224), '$name', 0, 0, 0)";

if($mysqli->query($sql))
{
    echo "member success";
}
else 
{
   echo "member failed";
}

$mysqli->close();

?>