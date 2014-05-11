<?php
session_start();
$from=$_SESSION['username'];

$to=$_POST["UserName"];
$compose=$_POST["compose"];
echo $from;
echo $to;
echo $compose;
?>