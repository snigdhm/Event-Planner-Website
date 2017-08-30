<!DOCTYPE html>

<?php
   
   $db = mysqli_connect('localhost', 'root', 'root','test');
   

		  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
		  $error="";
			if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $content = mysqli_real_escape_string($db,$_POST['Content']);
	  
	    $image1 = $_FILES['myimage1']['tmp_name'];
	    if($image1)
		$img1 = file_get_contents($image1);
	        
	 // $q3="INSERT INTO bumper (H_ID,M_ID,D_ID,C_ID,Price) VALUES (".$hall.",".$musician_.",".$decorator_.",".$caterer.",".$price.")";
      //$r3= mysqli_query($db,$q3);  
	  $picno=1;
	  if($image1)
	  {
		  date_default_timezone_set("Asia/Calcutta");
	  	$insert_image1="INSERT INTO testimonial (Picture,Content,C_ID,P_Date,P_Time) VALUES (?,'".$content."',".$_SESSION['id'].",'".date("Y-m-d")."','".date("h:i:s")."')";
		$stmt1 = mysqli_prepare($db,$insert_image1);
		mysqli_stmt_bind_param($stmt1, "s",$img1);
		mysqli_stmt_execute($stmt1);
		$picno+=1;
	  }
	   header("location: head1.php");
			}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Testimonial entry</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body>
  


    <div class="form">

      
     
        <div id="signup">   
          <h1>Feedback</h1>
          
          <form action="" method="post" enctype="multipart/form-data">
          
		 
			 <div class="top-row">
            <div class="field-wrap">
              
              <h2>Upload image: </h2>
            </div>
		   </div>
		 <div class="field-wrap">
				<input type="file" name="myimage1">
          </div>
		    <div class="field-wrap">
            
            <input placeholder="Review" name="Content" type="text"required autocomplete="off"/>
          </div>
            <p class="e"><?php echo $error; ?></p>
          <div class="ajax_result">

          <button type="submit" class="button button-block"/>Submit</button>
          </div>
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>
