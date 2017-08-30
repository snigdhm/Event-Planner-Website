<!DOCTYPE html>

<?php
   
   $db = mysqli_connect('localhost', 'root', 'root','test');
   

		  session_start();
		  $error="";
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				
	  $hall = mysqli_real_escape_string($db,$_POST['hall']);
	  $caterer = mysqli_real_escape_string($db,$_POST['caterer']);
	  $decorator_ = mysqli_real_escape_string($db,$_POST['decorator_']);
	  $musician_ = mysqli_real_escape_string($db,$_POST['musician_']);
	  $price = mysqli_real_escape_string($db,$_POST['price']);
	  
	    $image1 = $_FILES['myimage1']['tmp_name'];
	    if($image1)
		$img1 = file_get_contents($image1);
	        
	 // $q3="INSERT INTO bumper (H_ID,M_ID,D_ID,C_ID,Price) VALUES (".$hall.",".$musician_.",".$decorator_.",".$caterer.",".$price.")";
      //$r3= mysqli_query($db,$q3);  
	  $picno=1;
	  	$insert_image1="INSERT INTO bumper (H_ID,M_ID,D_ID,C_ID,Price,Picture) VALUES (".$hall.",".$musician_.",".$decorator_.",".$caterer.",".$price.",?)";
		$stmt1 = mysqli_prepare($db,$insert_image1);
		mysqli_stmt_bind_param($stmt1, "s",$img1);
		mysqli_stmt_execute($stmt1);
		$picno+=1;
	   header("location: head1.php");
				
			}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Package entry</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body>
  


    <div class="form">

      
     
        <div id="signup">   
		<?php $queryh="SELECT ID, Name FROM hall WHERE H_ID=".$_SESSION['id'];
             $resh= mysqli_query($db,$queryh);
				$num=mysqli_num_rows($resh);
				if($num!=0){
				 ?>
          <h1>Enter a package</h1>
          
          <form action="" method="post" enctype="multipart/form-data">
          
		  
		  <div class="top-row">
            <div class="field-wrap">             
              <h2>Select a Hall: </h2>
            </div>
		  <div class="field-wrap">
             <select  class="req" name="hall"><label>
		<?php 
			while ($row = mysqli_fetch_array($resh)){
			  echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
			} ?>
			  </label>
			  </select>
           </div>
		   </div>
		  
		   <?php $queryh="SELECT ID, Name FROM caterer";
             $resh= mysqli_query($db,$queryh);
				$num=mysqli_num_rows($resh);
				 ?>
		  <div class="top-row">
            <div class="field-wrap">             
              <h2>Select a Caterer: </h2>
            </div>
		  <div class="field-wrap">
             <select  class="req" name="caterer"><label>
			 <option value="null">None</option>
		<?php 
			while ($row = mysqli_fetch_array($resh)){
			  echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
			} ?>
			  </label>
			  </select>
           </div>
		   </div>
		   
		    <?php $queryh="SELECT ID, Name FROM decorator_";
             $resh= mysqli_query($db,$queryh);
				$num=mysqli_num_rows($resh);
				 ?>
		  <div class="top-row">
            <div class="field-wrap">             
              <h2>Select a Decorator: </h2>
            </div>
		  <div class="field-wrap">
             <select  class="req" name="decorator_"><label>
			 <option value="null">None</option>
		<?php 
			while ($row = mysqli_fetch_array($resh)){
			  echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
			} ?>
			  </label>
			  </select>
           </div>
		   </div>
		   
		    <?php $queryh="SELECT ID, Name FROM musician_";
             $resh= mysqli_query($db,$queryh);
				$num=mysqli_num_rows($resh);
				 ?>
		  <div class="top-row">
            <div class="field-wrap">             
              <h2>Select a Musician: </h2>
            </div>
		  <div class="field-wrap">
             <select  class="req" name="musician_"><label>
			 <option value="null">None</option>
		<?php 
			while ($row = mysqli_fetch_array($resh)){
			  echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
			} ?>
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
				<input type="file" name="myimage1" required>
          </div>
		    <div class="field-wrap">
            
            <input placeholder="Price" name="price" type="text"required autocomplete="off"/>
          </div>
            <p class="e"><?php echo $error; ?></p>
          <div class="ajax_result">

          <button type="submit" class="button button-block"/>Create</button>
          </div>
          </form>

        </div>
		<?php } else { ?>
		 <h1>Package can't be created since there are no halls available!</h1>
		 <form action="head1.php">
		 <div class="ajax_result">

          <button type="submit" class="button button-block"/>Return to homepage</button>
          </div>
		  </form>
		<?php } ?>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>
