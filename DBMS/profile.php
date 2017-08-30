<!DOCTYPE html>

<?php
   
   $db = mysqli_connect('localhost', 'root', 'root','test');
   

		 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
		  $error="";
			if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $selected_val =  mysqli_real_escape_string($db,$_POST['user']);

         if($selected_val=="Modify"){
		  header("location: modify.php");
			}
		 else if($selected_val=="Delete"){
		  header("location: del.php");
			}
		 else if($selected_val=="Add"){
		  header("location: add.php");
			}
      
     }

?>

<html >
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
          <h1>Update Profile</h1>
          
          <form action="" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              
              <h2>Choose an action: </h2>
            </div>
        
            <div class="field-wrap">
             <select  class="req" name="user"><label>
			  <option value="Modify">Modify</option>
			  <option value="Delete">Delete</option>
			  <option value="Add">Add</option>
			  </label>
			  </select>
            </div>
          </div>
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
