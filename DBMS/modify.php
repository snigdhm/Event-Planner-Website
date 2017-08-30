<!DOCTYPE html>

<?php
   
   $db = mysqli_connect('localhost', 'root', 'root','test');
   

		  session_start();
		  $error="";
			if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $sname = mysqli_real_escape_string($db,$_POST['sname']);
	  $address = mysqli_real_escape_string($db,$_POST['addr']);
	  $state = mysqli_real_escape_string($db,$_POST['state']);
	  $pin = mysqli_real_escape_string($db,$_POST['pin']);
	  $description = mysqli_real_escape_string($db,$_POST['desc']);
	  if(!strcmp($_SESSION['type'],'HO')){
	  $price = mysqli_real_escape_string($db,$_POST['price']);
	  $hall = mysqli_real_escape_string($db,$_POST['hall']);
	  $capacity = mysqli_real_escape_string($db,$_POST['capacity']);	  
	  $ac =  mysqli_real_escape_string($db,$_POST['ac']);
	  }
	  
	  if(!strcmp($_SESSION['type'],'MU')){
		  $band = mysqli_real_escape_string($db,$_POST['band']);
		  $price = mysqli_real_escape_string($db,$_POST['price']);
	  }
	  
	        
	   if(!strcmp($_SESSION['type'],'CA'))
		  {
			  $queryh="UPDATE caterer SET ID=".$_SESSION['id'];
			  if($sname)
			  $queryh.=",Name='".$sname."'";
		      if($address)
			  $queryh.=",Address='".$address."'";
			  if($state)
			  $queryh.=",State='".$state."'";
			  if($pin)
			  $queryh.=",Pincode=".$pin;
		      if($description)
			  $queryh.=",Description='".$description."'";
		      $queryh.=" WHERE ID=".$_SESSION['id'];
			  $resh= mysqli_query($db,$queryh);
		  }
		  else if(!strcmp($_SESSION['type'],'MU'))
		  {
			  $queryh="UPDATE musician_ SET ID=".$_SESSION['id'];
			  if($sname)
			  $queryh.=",Name='".$sname."'";
		      if($address)
			  $queryh.=",Address='".$address."'";
			  if($state)
			  $queryh.=",State='".$state."'";
			  if($pin)
			  $queryh.=",Pincode=".$pin;
		      if($price)
			  $queryh.=",Price=".$price;
		      if($band)
			  $queryh.=",Capacity='".$band."'";
		      if($description)
			  $queryh.=",Description='".$description."'";
		      $queryh.=" WHERE ID=".$_SESSION['id'];
			  $resh= mysqli_query($db,$queryh);
		  }
		  
			else if(!strcmp($_SESSION['type'],'DE'))
			{
				 $queryh="UPDATE decorator_ SET ID=".$_SESSION['id'];
			  if($sname)
			  $queryh.=",Name='".$sname."'";
		      if($address)
			  $queryh.=",Address='".$address."'";
			  if($state)
			  $queryh.=",State='".$state."'";
			  if($pin)
			  $queryh.=",Pincode=".$pin;
		      if($description)
			  $queryh.=",Description='".$description."'";
		      $queryh.=" WHERE ID=".$_SESSION['id'];
			  $resh= mysqli_query($db,$queryh);
			}
		  
	     else if(!strcmp($_SESSION['type'],'HO'))
		 {

			  $queryh="UPDATE hall SET ID=".$hall;
			  if($sname)
			  $queryh.=",Name='".$sname."'";
		      if($address)
			  $queryh.=",Address='".$address."'";
			  if($state)
			  $queryh.=",State='".$state."'";
			  if($pin)
			  $queryh.=",Pincode=".$pin;
		      if($price)
			  $queryh.=",Price=".$price;
		      if($ac)
			  $queryh.=",AC=".$ac;
		      if($capacity)
			  $queryh.=",Capacity=".$capacity;
		      if($description)
			  $queryh.=",Description='".$description."'";
		      $queryh.=" WHERE ID=".$hall;
			  $resh= mysqli_query($db,$queryh);
		 }
		 
	   header("location: head1.php");
			}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body>
  


    <div class="form">

      
     
        <div id="signup">   
          <h1>Update service</h1>
          
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
		  
		    <div class="field-wrap">             
              <h2>Leave it blank if there's no change!</h2>
            </div>
		   <div class="field-wrap">
            
            <input placeholder="Service Name" name="sname" type="text" autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            
            <input placeholder="Address" name="addr" type="text" autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            
            <input placeholder="State" name="state" type="text" autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            
            <input placeholder="Pincode" name="pin" type="text" autocomplete="off"/>
          </div>
		  <?php 
		  if(!strcmp($_SESSION['type'],'MU')) { ?>
		   <div class="field-wrap">
            
            <input placeholder="Price" name="price" type="text"required autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            
            <input placeholder="Band" name="band" type="text"required autocomplete="off"/>
          </div>
		  <?php } ?>
		  <?php 
		  if(!strcmp($_SESSION['type'],'HO')) { ?>
		  <div class="field-wrap">
            
            <input placeholder="Price" name="price" type="text" autocomplete="off"/>
          </div>
		  <div class="top-row">
            <div class="field-wrap">
              
              <h2>Type: </h2>
            </div>
		  <div class="field-wrap">
             <select  class="req" name="ac"><label>
			 <option value="">No change</option>
			  <option value="1">AC</option>
			  <option value="0">Non-AC</option>
			  </label>
			  </select>
           </div>
		   </div>
		  <div class="field-wrap">
            
            <input placeholder="Capacity" name="capacity" type="text" autocomplete="off"/>
          </div>
		  <?php } ?>
		  <div class="field-wrap">
            
            <input placeholder="Description" name="desc" type="text" autocomplete="off"/>
          </div>
            <p class="e"><?php echo $error; ?></p>
          <div class="ajax_result">

          <button type="submit" class="button button-block"/>Update</button>
          </div>
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>
