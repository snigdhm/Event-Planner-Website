<!DOCTYPE html>

<?php
   
   $db = mysqli_connect('localhost', 'root', 'root','test');
   

		  session_start();
		  $error="";
			if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $myusername = mysqli_real_escape_string($db,$_POST['username']);
	  $sname = mysqli_real_escape_string($db,$_POST['sname']);
	  $address = mysqli_real_escape_string($db,$_POST['addr']);
	  $state = mysqli_real_escape_string($db,$_POST['state']);
	  $pin = mysqli_real_escape_string($db,$_POST['pin']);
	  $description = mysqli_real_escape_string($db,$_POST['desc']);
	  $cuisine = mysqli_real_escape_string($db,$_POST['cuisine']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
	  $cmypassword = mysqli_real_escape_string($db,$_POST['cpassword']);
	  $ph1 = mysqli_real_escape_string($db,$_POST['ph1']);
	  $ph2 = mysqli_real_escape_string($db,$_POST['ph2']);
	  
	  $image1 = $_FILES['myimage1']['tmp_name'];
	  if($image1)
		$img1 = file_get_contents($image1);
		$image2 = $_FILES['myimage2']['tmp_name'];
		if($image2)
		$img2 = file_get_contents($image2);
		$image3 = $_FILES['myimage3']['tmp_name'];
		if($image3)
		$img3 = file_get_contents($image3);
	  $query1="SELECT * FROM login WHERE User_name = '".$myusername."'";
      $res1= mysqli_query($db,$query1);
	   $num=mysqli_num_rows($res1);
		
      if($num == 1) {
         $error = "Username already taken!";

      }else if(!strcmp($mypassword,$cmypassword)) {       
	  $q1="INSERT INTO caterer (Name,Address,State,Pincode,Description) VALUES ('".$sname."','".$address."','".$state."',".$pin.",'".$description."')";
     $r1= mysqli_query($db,$q1); 
	  $q2="SELECT ID FROM caterer WHERE Name='".$sname."'";
	 $r2= mysqli_query($db,$q2);
	 $row = mysqli_fetch_array($r2);  
	 $q3="INSERT INTO login VALUES (".$row['ID'].",'".$myusername."','".$mypassword."','CA')";
	  $r3= mysqli_query($db,$q3);
	  $q5="INSERT INTO cuisine VALUES (".$row['ID'].",'".$cuisine."')";
	  $r5= mysqli_query($db,$q5);
	  if($ph1)
	  {
		  $q4="INSERT INTO caterer_phone VALUES (".$row['ID'].",".$ph1.")";
		  $r4= mysqli_query($db,$q4);
	  } 
      if($ph2)
	  {
		  $q4="INSERT INTO caterer_phone VALUES (".$row['ID'].",".$ph2.")";
		  $r4= mysqli_query($db,$q4);
	  } 
	  $picno=1;
	  if($image1)
	  {
	  	$insert_image1="INSERT INTO caterer_pic VALUES(".$row['ID'].",?,".$picno.")";
		$stmt1 = mysqli_prepare($db,$insert_image1);
		mysqli_stmt_bind_param($stmt1, "s",$img1);
		mysqli_stmt_execute($stmt1);
		$picno+=1;
	  }
	   if($image2)
	  {
		 
	  	$insert_image2="INSERT INTO caterer_pic VALUES(".$row['ID'].",?,".$picno.")";
		$stmt2 = mysqli_prepare($db,$insert_image2);
		mysqli_stmt_bind_param($stmt2, "s",$img2);
		mysqli_stmt_execute($stmt2);
		$picno+=1;
	  }
	   if($image3)
	  {
	  	$insert_image3="INSERT INTO caterer_pic VALUES(".$row['ID'].",?,".$picno.")";
		$stmt3 = mysqli_prepare($db,$insert_image3);
		mysqli_stmt_bind_param($stmt3, "s",$img3);
		mysqli_stmt_execute($stmt3);
	  }
 
   /* $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        echo 'Successfullly UPloaded';
    }else{
        echo 'Could not upload';
    }*/
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
          
          <form action="" method="post" enctype="multipart/form-data">
          
            <div class="field-wrap">
              
              <input placeholder="username" name="username" type="text" required autocomplete="off" />
            </div>
          <div class="field-wrap">
            
            <input placeholder="Service Name" name="sname" type="text"required autocomplete="off"/>
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
            
            <input placeholder="Description" name="desc" type="text"required autocomplete="off"/>
          </div>
		  <div class="top-row">
            <div class="field-wrap">
              
              <h2>Cuisine: </h2>
            </div>
			<div class="field-wrap">
             <select  class="req" name="cuisine"><label>
			 <option value="North Indian">North Indian</option>
			  <option value="South Indian">South Indian</option>
			  <option value="Chinese">Chinese</option>
			  </label>
			  </select>
           </div>
			  </div>
		  <div class="top-row">
            <div class="field-wrap">
              
              <h2>Upload image: </h2>
            </div>
		   </div>
		 <div class="field-wrap">
				<input type="file" name="myimage1">
          </div>
		  <div class="field-wrap">
				<input type="file" name="myimage2">
          </div>
		  <div class="field-wrap">
				<input type="file" name="myimage3">
          </div>
		  <div class="top-row">
            <div class="field-wrap">
              
              <h2>Contact no: </h2>
            </div>
		   </div>
		 <div class="field-wrap">
				<input placeholder="Phone number 1" name="ph1" type="text" autocomplete="off"/>
          </div>
		  <div class="field-wrap">
				<input placeholder="Phone number 2" name="ph2" type="text" autocomplete="off"/>
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
