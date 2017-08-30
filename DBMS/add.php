<!DOCTYPE html>

<?php
   
   $db = mysqli_connect('localhost', 'root', 'root','test');
   

		  session_start();
		  $error="";
			if($_SERVER["REQUEST_METHOD"] == "POST") {
	   $cuisine = mysqli_real_escape_string($db,$_POST['cuisine']);
	   $dec = mysqli_real_escape_string($db,$_POST['dec']);
	  $ph1 = mysqli_real_escape_string($db,$_POST['ph1']);
	  $ph2 = mysqli_real_escape_string($db,$_POST['ph2']);
	  
	   if(!strcmp($_SESSION['type'],'HO')){
	  $hall = mysqli_real_escape_string($db,$_POST['hall']);
	   }
	  
	  $image1 = $_FILES['myimage1']['tmp_name'];
	  if($image1)
		$img1 = file_get_contents($image1);
		$image2 = $_FILES['myimage2']['tmp_name'];
		if($image2)
		$img2 = file_get_contents($image2);
		$image3 = $_FILES['myimage3']['tmp_name'];
		if($image3)
		$img3 = file_get_contents($image3);
	
	if(!strcmp($_SESSION['type'],'CA'))
	{
		if($cuisine)
	  {
		  $q5="INSERT INTO cuisine VALUES (".$_SESSION['id'].",'".$cuisine."')";
	  $r5= mysqli_query($db,$q5);
	  }	 
	  if($ph1)
	  {
		  $q4="INSERT INTO caterer_phone VALUES (".$_SESSION['id'].",".$ph1.")";
		  $r4= mysqli_query($db,$q4);
	  } 
      if($ph2)
	  {
		  $q4="INSERT INTO caterer_phone VALUES (".$_SESSION['id'].",".$ph2.")";
		  $r4= mysqli_query($db,$q4);
	  } 
	  $q4="SELECT max(pic_no) as m FROM caterer_pic WHERE ID=".$_SESSION['id'];
		  $r4= mysqli_query($db,$q4);
		  $r = mysqli_fetch_array($r4);
	  $picno=$r['m']+1;
	  if(!$picno)$picno=1;
	  if($image1)
	  {
	  	$insert_image1="INSERT INTO caterer_pic VALUES(".$_SESSION['id'].",?,".$picno.")";
		$stmt1 = mysqli_prepare($db,$insert_image1);
		mysqli_stmt_bind_param($stmt1, "s",$img1);
		mysqli_stmt_execute($stmt1);
		$picno+=1;
	  }
	   if($image2)
	  {
		 
	  	$insert_image2="INSERT INTO caterer_pic VALUES(".$_SESSION['id'].",?,".$picno.")";
		$stmt2 = mysqli_prepare($db,$insert_image2);
		mysqli_stmt_bind_param($stmt2, "s",$img2);
		mysqli_stmt_execute($stmt2);
		$picno+=1;
	  }
	   if($image3)
	  {
	  	$insert_image3="INSERT INTO caterer_pic VALUES(".$_SESSION['id'].",?,".$picno.")";
		$stmt3 = mysqli_prepare($db,$insert_image3);
		mysqli_stmt_bind_param($stmt3, "s",$img3);
		mysqli_stmt_execute($stmt3);
	  }
 
	 }
    else if(!strcmp($_SESSION['type'],'MU'))
		  {
			if($ph1)
	  {
		  $q4="INSERT INTO musician_phone VALUES (".$_SESSION['id'].",".$ph1.")";
		  $r4= mysqli_query($db,$q4);
	  } 
      if($ph2)
	  {
		  $q4="INSERT INTO musician_phone VALUES (".$_SESSION['id'].",".$ph2.")";
		  $r4= mysqli_query($db,$q4);
	  } 
	  $q4="SELECT max(pic_no) as m FROM mucisian_pic WHERE ID=".$_SESSION['id'];
		  $r4= mysqli_query($db,$q4);
		  $r = mysqli_fetch_array($r4);
	  $picno=$r['m']+1;
	  if(!$picno)$picno=1;
	  if($image1)
	  {
	  	$insert_image1="INSERT INTO musician_pic VALUES(".$_SESSION['id'].",?,".$picno.")";
		$stmt1 = mysqli_prepare($db,$insert_image1);
		mysqli_stmt_bind_param($stmt1, "s",$img1);
		mysqli_stmt_execute($stmt1);
		$picno+=1;
	  }
	   if($image2)
	  {
		 
	  	$insert_image2="INSERT INTO musician_pic VALUES(".$_SESSION['id'].",?,".$picno.")";
		$stmt2 = mysqli_prepare($db,$insert_image2);
		mysqli_stmt_bind_param($stmt2, "s",$img2);
		mysqli_stmt_execute($stmt2);
		$picno+=1;
	  }
	   if($image3)
	  {
	  	$insert_image3="INSERT INTO musician_pic VALUES(".$_SESSION['id'].",?,".$picno.")";
		$stmt3 = mysqli_prepare($db,$insert_image3);
		mysqli_stmt_bind_param($stmt3, "s",$img3);
		mysqli_stmt_execute($stmt3);
	  }
 
		  }
		  
	else if(!strcmp($_SESSION['type'],'DE'))
	{
	  if($dec)
	  {
	  $q5="INSERT INTO type_deco VALUES (".$_SESSION['id'].",'".$dec."')";
	  $r5= mysqli_query($db,$q5);
	  } 
	  if($ph1)
	  {
		  $q4="INSERT INTO deco_phone VALUES (".$_SESSION['id'].",".$ph1.")";
		  $r4= mysqli_query($db,$q4);
	  } 
      if($ph2)
	  {
		  $q4="INSERT INTO deco_phone VALUES (".$_SESSION['id'].",".$ph2.")";
		  $r4= mysqli_query($db,$q4);
	  } 
	  $q4="SELECT max(pic_no) as m FROM deco_pic WHERE ID=".$_SESSION['id'];
		  $r4= mysqli_query($db,$q4);
		  $r = mysqli_fetch_array($r4);
	  $picno=$r['m']+1;
	  if(!$picno)$picno=1;
	  if($image1)
	  {
	  	$insert_image1="INSERT INTO deco_pic VALUES(".$_SESSION['id'].",?,".$picno.")";
		$stmt1 = mysqli_prepare($db,$insert_image1);
		mysqli_stmt_bind_param($stmt1, "s",$img1);
		mysqli_stmt_execute($stmt1);
		$picno+=1;
	  }
	   if($image2)
	  {
		 
	  	$insert_image2="INSERT INTO deco_pic VALUES(".$_SESSION['id'].",?,".$picno.")";
		$stmt2 = mysqli_prepare($db,$insert_image2);
		mysqli_stmt_bind_param($stmt2, "s",$img2);
		mysqli_stmt_execute($stmt2);
		$picno+=1;
	  }
	   if($image3)
	  {
	  	$insert_image3="INSERT INTO deco_pic VALUES(".$_SESSION['id'].",?,".$picno.")";
		$stmt3 = mysqli_prepare($db,$insert_image3);
		mysqli_stmt_bind_param($stmt3, "s",$img3);
		mysqli_stmt_execute($stmt3);
	  }
 
		}
		  
	else if(!strcmp($_SESSION['type'],'HO'))
	{
		$q4="SELECT H_ID FROM hall WHERE ID=".$hall;
		  $r4= mysqli_query($db,$q4);
		  $r = mysqli_fetch_array($r4);
		  if($ph1)
	  {
		  $q4="INSERT INTO hall_phone VALUES (".$r['H_ID'].",".$ph1.")";
		  $r4= mysqli_query($db,$q4);
	  } 
      if($ph2)
	  {
		  $q4="INSERT INTO hall_phone VALUES (".$r['H_ID'].",".$ph2.")";
		  $r4= mysqli_query($db,$q4);
	  } 
	  $q4="SELECT max(pic_no) as m FROM hall_pic WHERE ID=".$hall;
		  $r4= mysqli_query($db,$q4);
		  $r = mysqli_fetch_array($r4);
	  $picno=$r['m']+1;
	  if(!$picno)$picno=1;
	  if($image1)
	  {
	  	$insert_image1="INSERT INTO hall_pic VALUES(".$hall.",?,".$picno.")";
		$stmt1 = mysqli_prepare($db,$insert_image1);
		mysqli_stmt_bind_param($stmt1, "s",$img1);
		mysqli_stmt_execute($stmt1);
		$picno+=1;
	  }
	   if($image2)
	  {
		 
	  	$insert_image2="INSERT INTO hall_pic VALUES(".$hall.",?,".$picno.")";
		$stmt2 = mysqli_prepare($db,$insert_image2);
		mysqli_stmt_bind_param($stmt2, "s",$img2);
		mysqli_stmt_execute($stmt2);
		$picno+=1;
	  }
	   if($image3)
	  {
	  	$insert_image3="INSERT INTO hall_pic VALUES(".$hall.",?,".$picno.")";
		$stmt3 = mysqli_prepare($db,$insert_image3);
		mysqli_stmt_bind_param($stmt3, "s",$img3);
		mysqli_stmt_execute($stmt3);
	  }
	}
    
	  
   /* $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        echo 'Successfullly UPloaded';
    }else{
        echo 'Could not upload';
    }*/
	  header("location: head1.php");
 
	} 

?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Add</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body>
  


    <div class="form">

      
     
        <div id="signup">   
          <h1>Add details</h1>
          
          <form action="" method="post" enctype="multipart/form-data">
		  <?php  if(!strcmp($_SESSION['type'],'HO')) {
			    $queryh="SELECT ID, Name FROM hall WHERE H_ID=".$_SESSION['id'];
			  $resh= mysqli_query($db,$queryh);
			  ?>
			  <div class="top-row">
            <div class="field-wrap">             
              <h2>Choose a service: </h2>
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
		  <?php } ?>
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
		  <?php 
		  if(!strcmp($_SESSION['type'],'CA')) { ?>
		  <div class="top-row">
            <div class="field-wrap">
              
              <h2>Cuisine: </h2>
            </div>
			<div class="field-wrap">
             <select  class="req" name="cuisine"><label>
			 <option value="">None</option>
			 <option value="North Indian">North Indian</option>
			  <option value="South Indian">South Indian</option>
			  <option value="Chinese">Chinese</option>
			  </label>
			  </select>
           </div>
			  </div>
		  <?php } ?>
		  <?php 
		  if(!strcmp($_SESSION['type'],'DE')) { ?>
		  <div class="top-row">
            <div class="field-wrap">
              
              <h2>Decors: </h2>
            </div>
			<div class="field-wrap">
             <select  class="req" name="dec"><label>
			 <option value="">None</option>
			 <option value="Lighting">Lighting</option>
			  <option value="Chair covers">Chair covers</option>
			  <option value="Entrance features">Entrance features</option>
			  <option value="Flowers">Flowers</option>
			  </label>
			  </select>
           </div>
			  </div>
		  <?php } ?>
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
