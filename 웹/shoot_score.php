<?php

session_start();

$score = $_REQUEST['score'];
$win = $_REQUEST['win'];
$lose = $_REQUEST['lose'];

$userid = $_SESSION['userid'];
$name = $_SESSION['name'];

if(!isset($_SESSION['userid'])) return;

$mysqli = new mysqli('127.0.0.1', 'graduate', 'bitnami', 'my_game') or die('mysqli connect error');

$sql = "UPDATE ShootUserAccount set score = $score, win = $win, lose = $lose WHERE userid='$userid';";
echo $sql . "<br>";

$result = $mysqli->query($sql) or die("query failed");

$mysqli->close();

?>