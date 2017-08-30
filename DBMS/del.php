<!DOCTYPE html>

<?php
   
   $db = mysqli_connect('localhost', 'root', 'root','test');
   

		  session_start();
		  $error="";
			if($_SERVER["REQUEST_METHOD"] == "POST") {
	  if(!strcmp($_SESSION['type'],'HO'))
	  {$package = mysqli_real_escape_string($db,$_POST['package']);
  $hall = mysqli_real_escape_string($db,$_POST['hall']);
	  }
	        
	   if(!strcmp($_SESSION['type'],'CA'))
		  {
			  $pack="SELECT COUNT(*) AS cnt FROM bumper WHERE C_ID=".$_SESSION['id'];
			  $rpack= mysqli_query($db,$pack);
			  $rp = mysqli_fetch_array($rpack);
			  if($rp['cnt']>0){
				$error="The service exists in a package! Please contact the owner for removing it.";  
			  }
			  else{
			  $queryh="DELETE FROM caterer WHERE ID=".$_SESSION['id'];
			  $resh= mysqli_query($db,$queryh);
			  header("location: head1.php");
			  }

		  }
		  else if(!strcmp($_SESSION['type'],'MU'))
		  {
			   $pack="SELECT COUNT(*) AS cnt FROM bumper WHERE M_ID=".$_SESSION['id'];
			  $rpack= mysqli_query($db,$pack);
			  $rp = mysqli_fetch_array($rpack);
			  if($rp['cnt']>0){
				$error="The service exists in a package! Please contact the owner for removing it.";  
			  }
			  else{
			  $queryh="DELETE FROM musician_ WHERE ID=".$_SESSION['id'];
			  $resh= mysqli_query($db,$queryh);
			  header("location: head1.php");
			  }
		  }
		  
			else if(!strcmp($_SESSION['type'],'DE'))
			{
				$pack="SELECT COUNT(*) AS cnt FROM bumper WHERE D_ID=".$_SESSION['id'];
			  $rpack= mysqli_query($db,$pack);
			  $rp = mysqli_fetch_array($rpack);
			  if($rp['cnt']>0){
				$error="The service exists in a package! Please contact the owner for removing it.";  
			  }
			  else{
				$queryh="DELETE FROM decorator_ WHERE ID=".$_SESSION['id'];
				$resh= mysqli_query($db,$queryh);
			  header("location: head1.php");
			  }
			}
		  
	     else if(!strcmp($_SESSION['type'],'HO'))
		 {
			if($package){
				 $queryp="DELETE FROM bumper WHERE ID=".$package;
					$resp= mysqli_query($db,$queryp); 
			 if($hall){ 
			 $pack="SELECT COUNT(*) AS cnt FROM bumper WHERE H_ID=".$hall;
			  $rpack= mysqli_query($db,$pack);
			  $rp = mysqli_fetch_array($rpack);
			  if($rp['cnt']>0){
				$error="Deleted package but the service exists in some package! Please contact the owner for removing it.";  
			  }
			  else{
				 $queryh="DELETE FROM hall WHERE ID=".$hall;
			  $resh= mysqli_query($db,$queryh);			  
			  header("location: head1.php");
			  }
			  }
			  header("location: head1.php");
			}
			else if($hall){
				$pack="SELECT COUNT(*) AS cnt FROM bumper WHERE H_ID=".$hall;
			  $rpack= mysqli_query($db,$pack);
			  $rp = mysqli_fetch_array($rpack);
			  if($rp['cnt']>0){
				$error="The service exists in some package! Please contact the owner for removing it.";  
			  }
			  else{
		      $queryh="DELETE FROM hall WHERE ID=".$hall;
			  $resh= mysqli_query($db,$queryh);			  
			  header("location: head1.php");
			  }
			}

		 }
		 
	   
	}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Delete</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body>
  


    <div class="form">
        <div id="signup">   
          <h1>Remove service</h1>
          
          <form action="" method="post" enctype="multipart/form-data">
          
		  <?php  if(strcmp($_SESSION['type'],'HO')) {
		  if(!strcmp($_SESSION['type'],'CA'))
		  {
			  $queryh="SELECT ID, Name FROM caterer WHERE ID=".$_SESSION['id'];
			  $resh= mysqli_query($db,$queryh);
		  }
		  else if(!strcmp($_SESSION['type'],'MU'))
		  {
			  $queryh="SELECT ID, Name FROM musician_ WHERE ID=".$_SESSION['id'];
			  $resh= mysqli_query($db,$queryh);
		  }
		  
			else if(!strcmp($_SESSION['type'],'DE'))
			{
				$queryh="SELECT ID, Name FROM decorator_ WHERE ID=".$_SESSION['id'];
				$resh= mysqli_query($db,$queryh);
			}
		  
             $row = mysqli_fetch_array($resh)
				 ?>
		  <div class="top-row">
            <div class="field-wrap">             
              <h2>Are you that you want to remove <?php echo ' '.$row['Name'].' '; ?>?</h2>
            </div>
		   </div>
		  <?php } else {
		   $queryh="SELECT ID, Name FROM hall WHERE H_ID=".$_SESSION['id'];
			  $queryp="SELECT ID, H_ID, D_ID, M_ID, C_ID FROM bumper WHERE H_ID IN (SELECT ID FROM hall WHERE H_ID=".$_SESSION['id'].")";
			  $resh= mysqli_query($db,$queryh);
				$resp= mysqli_query($db,$queryp);
				?>
				<div class="top-row">
            <div class="field-wrap">             
              <h2>Choose a service: </h2>
            </div>
		  <div class="field-wrap">
             <select  class="req" name="hall"><label>
			  <option value="null">None</option>
		<?php 
			while ($row = mysqli_fetch_array($resh)){
			  echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
			} ?>
			  </label>
			  </select>
           </div>
		   </div>
		  <?php } ?>
		   <?php if(!strcmp($_SESSION['type'],'HO')) { ?>
		    <div class="top-row">
            <div class="field-wrap">             
              <h2>Choose a package: </h2>
            </div>
		  <div class="field-wrap">
             <select  class="req" name="package"><label>
			  <option value="null">None</option> 
			<?php if(!strcmp($_SESSION['type'],'HO')) {
			while ($row = mysqli_fetch_array($resp)){
				if($row['C_ID'])
					{
						$q="SELECT caterer.Name FROM caterer WHERE caterer.ID=".$row['C_ID'];
						$ca= mysqli_query($db,$q);
						$rowc = mysqli_fetch_array($ca);
					}
					
					if($row['M_ID'])
					{	
						$q="SELECT musician_.Name FROM musician_ WHERE musician_.ID=".$row['M_ID'];
						$mu= mysqli_query($db,$q);
						if($mu)
						$rowm = mysqli_fetch_array($mu);
					}

					if($row['D_ID'])
					{
						$q="SELECT decorator_.Name FROM decorator_ WHERE decorator_.ID=".$row['D_ID'];
						$de= mysqli_query($db,$q);
						if($de)
						$rowd = mysqli_fetch_array($de);
					}
					
					if($row['H_ID'])
					{
						$q="SELECT hall.Name FROM hall WHERE hall.ID=".$row['H_ID'];
						$ha= mysqli_query($db,$q);
						if($ha)
						$rowh = mysqli_fetch_array($ha);
					}
					$lst='';$pre='';
					if($row['C_ID']) {$lst.=$pre.$rowc['Name'];$pre=',';}
					if($row['M_ID']) {$lst.=$pre.$rowm['Name'];$pre=',';}
					if($row['D_ID']) {$lst.=$pre.$rowd['Name'];$pre=',';}
					if($row['H_ID']) {$lst.=$pre.$rowh['Name'];$pre=',';}
			  echo '<option value="'.$row['ID'].'">'.$lst.'</option>';
			} } ?>
			  </label>
			  </select>
           </div>
		   </div>
		   <?php } ?>
            <p class="e"><?php echo $error; ?></p>
          <div class="ajax_result">

          <button type="submit" class="button button-block"/>Remove</button>
          </div>
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>
