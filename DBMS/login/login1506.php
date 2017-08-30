<?php
session_start(); // Starting Session 
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['User_name']) || empty($_POST['Password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['User_name'];
$password=$_POST['Password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect('localhost', 'root', 'root','test');
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($username);
$password = mysqli_real_escape_string($password);
// Selecting Database
//$db = mysqli_select_db("test", $connection);
// SQL query to fetch information of registerd users and finds user match.
$q="select * from login where Password='".$password."' AND User_name='".$username."'";
$query = mysqli_query($q, $connection);
$rows = mysqli_num_rows($query);
echo $rows;
$rows=1;
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
echo $_SESSION['login_user'];
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>