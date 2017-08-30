<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect('localhost', 'root', 'root','test');
// Selecting Database
//$db = mysqli_select_db("test", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
echo $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query="select User_name from login where User_name='".$user_check."'";
echo $user_check;
$ses_sql=mysqli_query($query, $connection);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['User_name'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: index1.php'); // Redirecting To Home Page
}
?>