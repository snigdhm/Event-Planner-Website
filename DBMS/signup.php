<!DOCTYPE html>

<?php
   
   $db = mysqli_connect('localhost', 'root', 'root','test');
   

		  session_start();
		  $error="";
			if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $selected_val =  mysqli_real_escape_string($db,$_POST['user']);

         if($selected_val=="caterer"){
		  header("location: c_signup.php");
			}
		 else if($selected_val=="musician"){
		  header("location: m_signup.php");
			}
		 else if($selected_val=="decorator"){
		  header("location: d_signup.php");
			}
		 else if($selected_val=="hall_owner"){
		  header("location: h_signup.php");
			}
		 else if($selected_val=="customer"){
		  header("location: cus_signup.php");
			}
      
     }

?>

<html >
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
          
          <div class="top-row">
            <div class="field-wrap">
              
              <h2>Select your category: </h2>
            </div>
        
            <div class="field-wrap">
             <select  class="req" name="user"><label>
			  <option value="customer">Customer</option>
			  <option value="caterer">Caterer</option>
			  <option value="musician">Musician</option>
			  <option value="hall_owner">Hall Owner</option>
			  <option value="decorator">Decorator</option>
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
