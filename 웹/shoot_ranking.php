<?php

$mysqli = new mysqli('127.0.0.1', 'graduate', 'bitnami', 'my_game') or die('mysqli connect error');

$sql = "SELECT name, score, win, lose from ShootUserAccount;";

$result = $mysqli->query($sql) or die("query failed");

if(!empty($_REQUEST)){
    header("Content-Type: application/json");
}

$output = array();

while ( $row = $result->fetch_object() ) {
    $temp = array("score"=>$row->score, "name"=>$row->name, "win"=>$row->win, "lose"=>$row->lose);

    array_push($output, $temp);
}


$json = json_encode($output);

echo $json;

$mysqli->close();

?>