<!DOCTYPE html>

<?php
   
   $db = mysqli_connect('localhost', 'root', 'root','test');
 /*  if ($db) {
  echo 'conected';
} else {
  echo 'not conected';
}*/
   
    session_start();
	$error ="";
			if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	  
	  $query1="SELECT * FROM login WHERE User_name = '".$myusername."' AND Password = '".$mypassword."'";
      $res1= mysqli_query($db,$query1);
	  $num=mysqli_num_rows($res1);
		$row = mysqli_fetch_array($res1);
      if($num == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
		 $_SESSION['id'] = $row['ID'];
		 $_SESSION['type'] = $row['Type'];
         $error = "success";
         header("location: head1.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

