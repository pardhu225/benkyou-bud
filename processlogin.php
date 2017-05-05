<?php

session_start();
if(isset($_SESSION['UserID']))
{
	session_unset();
	session_destroy();
}

$conn = new mysqli("127.0.0.1","root","","db") or die("Unable to connect to database.");

$sql = "SELECT * FROM users WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";

$res = $conn->query($sql);

if(!$res || $res->num_rows===0)
{
	header("Location: index.php?err=1");
	die();
}


if($res->num_rows===1)
{
	//Create the sesssion for the user
	session_start();
	$_SESSION['UserID'] = $res->fetch_array()['UserID'];
	$_SESSION['username'] = $_POST['username'];
	header("Location: dashboard/");
}