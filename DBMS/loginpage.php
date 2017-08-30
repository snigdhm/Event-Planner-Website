<?php include('login.php'); ?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body>
  


    <div class="form">
        
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="" method="post">
          
            <div class="field-wrap">
              
              <input placeholder="username" name="username" type="text" required autocomplete="off" />
            </div>
          
          <div class="field-wrap">
            
            <input placeholder="password" name="password" type="password"required autocomplete="off"/>
          </div>
          
          <p class="e"><?php echo $error; ?></p>
          
          <button class="button button-block"/>Log In</button>
		  
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>
