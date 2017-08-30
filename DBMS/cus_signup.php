<!DOCTYPE html>

<?php
   
   $db = mysqli_connect('localhost', 'root', 'root','test');
   

		  session_start();
		  $error="";
			if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $myusername = mysqli_real_escape_string($db,$_POST['username']);
	  $fname = mysqli_real_escape_string($db,$_POST['fname']);
	  $address = mysqli_real_escape_string($db,$_POST['addr']);
	  $state = mysqli_real_escape_string($db,$_POST['state']);
	  $pin = mysqli_real_escape_string($db,$_POST['pin']);
	  $lname = mysqli_real_escape_string($db,$_POST['lname']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
	  $cmypassword = mysqli_real_escape_string($db,$_POST['cpassword']);
	  
	  $query1="SELECT * FROM login WHERE User_name = '".$myusername."'";
      $res1= mysqli_query($db,$query1);
	   $num=mysqli_num_rows($res1);
		
      if($num == 1) {
         $error = "Username already taken!";

      }else if(!strcmp($mypassword,$cmypassword)) {       
	  $q1="INSERT INTO customer (FName,LName,Address,State,Pincode) VALUES ('".$fname."','".$lname."','".$address."','".$state."',".$pin.")";
      $r1= mysqli_query($db,$q1); 
	  $q2="SELECT ID FROM customer WHERE FName='".$fname."' AND LName='".$lname."'";
	  $r2= mysqli_query($db,$q2);
	  $row = mysqli_fetch_array($r2);  
	  $q3="INSERT INTO login VALUES (".$row['ID'].",'".$myusername."','".$mypassword."','CU')";
	  $r3= mysqli_query($db,$q3); 
	   header("location: loginpage.php");
      }
	  else{
		$error = "Password doesn't match!";  
	  }
	} 

?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Sign-Up Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body>
  


    <div class="form">

      
     
        <div id="signup">   
          <h1>Sign Up</h1>
          
          <form action="" method="post">
          
            <div class="field-wrap">
              
              <input placeholder="username" name="username" type="text" required autocomplete="off" />
            </div>
          <div class="field-wrap">
            
            <input placeholder="First Name" name="fname" type="text"required autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            
            <input placeholder="Last Name" name="lname" type="text"required autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            
            <input placeholder="Address" name="addr" type="text"required autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            
            <input placeholder="State" name="state" type="text"required autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            
            <input placeholder="Pincode" name="pin" type="text"required autocomplete="off"/>
          </div>
		  
          <div class="field-wrap">
            
            <input placeholder="Set a password" name="password" type="password"required autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            
            <input placeholder="Confirm password" name="cpassword" type="password"required autocomplete="off"/>
          </div>
            <p class="e"><?php echo $error; ?></p>
          <div class="ajax_result">

          <button type="submit" class="button button-block"/>Get Started</button>
          </div>
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>
