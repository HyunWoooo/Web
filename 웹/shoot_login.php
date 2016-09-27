<?php

session_start();

if(!empty($_REQUEST)){
    $userid = $_REQUEST['userid'];
    $passwd = $_REQUEST['passwd'];
} else {
    echo "login fail";
    return;
}

$mysqli = new mysqli('127.0.0.1', 'graduate', 'bitnami', 'my_game') or die('mysqli connect error');

$sql = "SELECT userid, name from ShootUserAccount where userid='$userid' and passwd=sha2('$passwd', 224);";

$result = $mysqli->query($sql) or die("query failed");

if($result->num_rows == 1)
{
    $row = $result->fetch_object();
    $_SESSION['userid'] = $row->userid;
    $_SESSION['name'] = $row->name;
    echo $_SESSION['userid'];
}
else {
    echo "login fail";
}



$mysqli->close();

?>