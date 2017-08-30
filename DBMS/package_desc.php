<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <title>Service Description</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
        <!-- Google Fonts-->
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open Sans:300,400" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Source Sans Pro:300,400" />
    </head>
  <style>
.mini-widgets {
	position:relative;
	left:100px;
}
.head1 {
	position:relative;
	left:100px;
}
</style>
<script type="text/javascript">
var qs = new Querystring();
var id = qs.get("id")
var uid = qs.get("uid")
</script>
<?php 
include('login.php');
//echo $_SESSION['login_user'].$_SESSION['id'].$_SESSION['type']; 
?>

<?php
$db = mysqli_connect('localhost', 'root', 'root','test');
//mysql_connect('localhost','root', 'root');
//@mysql_select_db('test') or die( "Unable to select database");
$query="SELECT bumper.ID, bumper.C_ID,bumper.M_ID,bumper.H_ID,bumper.D_ID,bumper.Price,bumper.Picture FROM bumper WHERE bumper.ID=".$_GET["id"];
//$result=mysql_query($query);
$result = mysqli_query($db,$query);
$row = mysqli_fetch_array($result);
if($row['C_ID'])
{
$query1="SELECT caterer.Name,caterer.Description FROM caterer WHERE caterer.ID=(SELECT bumper.C_ID FROM bumper WHERE bumper.ID=".$_GET["id"].")";
 $result1 = mysqli_query($db,$query1);
}
if($row['D_ID'])
{$query2="SELECT decorator_.Name,decorator_.Description FROM decorator_ WHERE decorator_.ID=(SELECT bumper.D_ID FROM bumper WHERE bumper.ID=".$_GET["id"].")";
$result2 = mysqli_query($db,$query2);
}
if($row['H_ID'])
{$query3="SELECT hall.Name,hall.Description FROM hall WHERE hall.ID=(SELECT bumper.H_ID FROM bumper WHERE bumper.ID=".$_GET["id"].")";
$result3 = mysqli_query($db,$query3);
}
if($row['M_ID'])
{
$query4="SELECT musician_.Name,musician_.Description FROM musician_ WHERE musician_.ID=(SELECT bumper.M_ID FROM bumper WHERE bumper.ID=".$_GET["id"].")";
$result4 = mysqli_query($db,$query4);
}


//mysqli_close($db);

?>

<script type="text/javascript">
function startAjax(){
	var book_id = "<?php echo $row['ID'] ?>";
	
    var url = "package_hist_search.php";
   $.ajax({
     type: "POST",
     url: url,
     data: {"bdate" :$('#booking').find('input[name="bday"]').val(), "bookID" :book_id, "id_" :<?php echo $_GET["uid"]; ?>},
     success: function(data)
     {                  
        $('.ajax_result').html(data);
     }               
   });
  return false;
}
</script>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />


	<link rel="stylesheet" type="text/css" href="footer.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel='stylesheet' id='dt-main-css' href='http://www.myweddingplanning.in/wp-content/themes/dt-the7/css/main.min.css?ver=3.7.1' type='text/css' media='all'/>
<link rel='stylesheet' id='dt-custom.less-css' href='http://www.myweddingplanning.in/wp-content/uploads/wp-less/dt-the7/css/custom-be9cbc0534.css?ver=3.7.1' type='text/css' media='all'/>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type='text/javascript' src='http://www.myweddingplanning.in/wp-content/themes/dt-the7/js/above-the-fold.min.js?ver=3.7.1'></script>

<script type='text/javascript' src='http://www.myweddingplanning.in/wp-content/themes/dt-the7/js/above-the-fold.min.js?ver=3.7.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var dtLocal = {"themeUrl":"http:\/\/www.myweddingplanning.in\/wp-content\/themes\/dt-the7","passText":"To view this protected post, enter the password below:","moreButtonText":{"loading":"Loading..."},"postID":"9537","ajaxurl":"http:\/\/www.myweddingplanning.in\/wp-admin\/admin-ajax.php","contactNonce":"c6af9bb33c","ajaxNonce":"ad4e2062fa","pageData":{"type":"page","template":"page","layout":null},"themeSettings":{"smoothScroll":"off","lazyLoading":false,"accentColor":{"mode":"gradient","color":["#a12b31","#d73e45"]},"mobileHeader":{"firstSwitchPoint":930,"secondSwitchPoint":400},"content":{"responsivenessTreshold":970,"textColor":"#494949","headerColor":"#3a3a3a"},"stripes":{"stripe1":{"textColor":"#474747","headerColor":"#3a3a3a"},"stripe2":{"textColor":"#f9f9f9","headerColor":"#f4f4f4"},"stripe3":{"textColor":"#f4f4f4","headerColor":"#f4f4f4"}}}};
/* ]]> */
</script>
<script type='text/javascript' src='http://www.myweddingplanning.in/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='http://www.myweddingplanning.in/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='http://www.myweddingplanning.in/wp-content/plugins/essential-grid/public/assets/js/lightbox.js?ver=2.0.9'></script>
<script type='text/javascript' src='http://www.myweddingplanning.in/wp-content/themes/dt-the7/js/main.min.js?ver=3.7.1'></script>



	
<link rel="stylesheet" type="text/css" href="footer.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel='stylesheet' id='dt-web-fonts-css' href='http://fonts.googleapis.com/css?family=Open+Sans%7CRoboto+Condensed%7COleo+Script&#038;ver=4.6.1' type='text/css' media='all'/>

	
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<body class="home page page-id-9537 page-template-default slideshow-on large-hover-icons click-effect-on-img overlay-cursor-on accent-gradient srcset-enabled btn-flat custom-btn-color custom-btn-hover-color footer-overlap filter-style-ios contact-form-ios small-fancy-datas semitransparent-bullets light-icons phantom-fade phantom-shadow-decoration phantom-custom-logo-on floating-mobile-menu-icon top-header first-switch-logo-left first-switch-menu-right second-switch-logo-left second-switch-menu-right right-mobile-menu layzr-loading-on wpb-js-composer js-comp-ver-4.11.1 vc_responsive outlined-portfolio-icons album-minuatures-style-2">
<div id="page">

<div class="masthead inline-header center widgets surround shadow-decoration show-device-logo show-mobile-logo" role="banner" style="padding:0px">
<div class="top-bar solid-bg">

<div class="mini-widgets">
<div class="mini-nav show-on-desktop near-logo-first-switch hide-on-second-switch select-type-menu">

</div>
<span class="mini-contacts phone show-on-desktop near-logo-first-switch in-menu-second-switch">0982021521 / 0986982976 </span></div>
 <div class="mini-widgets"><span class="mini-contacts email show-on-desktop near-logo-first-switch in-menu-second-switch">
[dreamplanner@gmail.com]
</span>
<div class="soc-ico show-on-desktop near-logo-first-switch in-menu-second-switch custom-bg hover-accent-bg">
<a title="Pinterest" target="_blank" class="pinterest">
<span class="assistive-text">Pinterest</span></a>
<a title="Twitter" target="_blank" class="twitter">
<span class="assistive-text">Twitter</span></a>
<a title="Google+" target="_blank" class="google">
<span class="assistive-text">Google+</span></a>
<a title="Facebook" target="_blank" class="facebook">
<span class="assistive-text">Facebook</span></a></div></div> </div>

<header class="header-bar">
<div class= "head1">
<ul class="main-nav underline-decoration from-centre-line outside-item-remove-margin" role="menu">
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10508 dt-mega-menu mega-auto-width mega-column-3">
<a href='head1.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">HOME</span></span></a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10508 dt-mega-menu mega-auto-width mega-column-3">
<a href='caterer.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">CATERERS</span></span></a></li>
 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10508 dt-mega-menu mega-auto-width mega-column-3">
<a href='hall.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">HALLS</span></span></a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10508 dt-mega-menu mega-auto-width mega-column-3">
<a href='decorator.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">DECORATORS</span></span></a></li>
 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12478">
<a href='musician.php' data-level='1'>
<span class="menu-item-text">
<span class="menu-text">MUSICIANS</span></span></a></li>
 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9792">
<a href='testimonial.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">TESTIMONIALS</span></span></a></li> 
 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9792">
<a href='package.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">PACKAGES</span></span></a></li> 
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9792">

<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9792">
<?php 
if(!isset($_SESSION['login_user'])){ ?>
<a href='loginpage.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">LOGIN</span></span></a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9792">
<a href='signup.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">SIGNUP</span></span></a></li>  </ul>
</div>
<?php } else { if(!strcmp($_SESSION['type'],'HO')){ ?>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9792">
<a href='package_entry.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">ADD PACKAGES</span></span></a></li>
<?php } if(!strcmp($_SESSION['type'],'CU')){?>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9792">
<a href='testimonial_entry.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">FEEDBACK</span></span></a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9792">
<a href='history.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">HISTORY</span></span></a></li>
<?php } if(strcmp($_SESSION['type'],'CU')){?>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9792">
<a href='profile.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">UPDATE</span></span></a></li>
<?php } ?>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9792">
<a href='logout.php' data-level='1'>
<span class="menu-item-text"><span class="menu-text">LOGOUT</span></span></a></li></ul></div>
<?php } ?>
</li>
<div class="mini-widgets"><div class="mini-search show-on-desktop near-logo-first-switch in-menu-second-switch"> <form class="searchform" role="search" method="get" action="http://www.myweddingplanning.in/">
<input type="text" class="field searchform-s" name="s" value="" placeholder="Type and hit enter &hellip;"/>
<input type="submit" class="assistive-text searchsubmit" value="Go!"/>

</form></div></div>
</header>
    <body>
       <body background="assets/img/bg2.png">
        <div >
            <div id="container_header" class="container">
                <div id="header" class="row">
                    <div class="col-md-12 margin-top-5">
                        <!-- Header Social Icons -->
                   <!-- <ul class="social-icons circle pull-right">
                            <li class="social-rss">
                                <a href="#" target="_blank" title="RSS"></a>
                            </li>
                            <li class="social-twitter">
                                <a href="#" target="_blank" title="Twitter"></a>
                            </li>
                            <li class="social-facebook">
                                <a href="#" target="_blank" title="Facebook"></a>
                            </li>
                            <li class="social-googleplus">
                                <a href="#" target="_blank" title="GooglePlus"></a>
                            </li>
                        </ul>
                        <!-- End Header Social Icons -->
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="primary-container-group">
                <!-- Background -->
                <div class="primary-container-background">
                    <div class="primary-container"></div>
                    <div class="clearfix"></div>
                </div>
                <!--End Background -->
                <div class="primary-container">
                    <div id="container_hornav" class="container no-padding">
                        <!-- Logo -->
                       
                    <!-- End Logo -->
                        <!-- Slogan -->
                  <!--      <p class="site-slogan">A BOOTSTRAP TEMPLATE</p>
                        <!-- End Slogan -->
                        <!-- Top Menu -->
        
                        <!-- End Top Menu -->
                    </div>
                    <div class="container">
                        <!-- === END HEADER === -->
                        <!-- === BEGIN CONTENT === -->
                        <div class="row margin-vert-30">
                            <div class="col-md-12">
							 
                                    <?php 
                                           if($row['C_ID'])
                                           { 
                                              $row1 = mysqli_fetch_array($result1); ?>
                                              <h2 style="font-family:veranda"><?php echo $row1['Name']; ?></h2>
                                <br>
                                <h3>About Us</h3><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><i><?php echo $row1['Description']; ?></i></p><br>
										</div>
									</div>
                                       <?php } ?>
									
                                 <?php 
                                           if($row['D_ID'])
                                           {
                                              $row2 = mysqli_fetch_array($result2); ?>
                                              <h2 style="font-family:veranda"><?php echo $row2['Name']; ?></h2>
                                <br>
                                <h3>About Us</h3><br>
                                
                                        <p><i><?php echo $row2['Description']; ?></i></p><br>
									
                                       <?php } ?>
                              <?php
                                    if($row['H_ID'])
                                           {
                                              $row3 = mysqli_fetch_array($result3); ?>
                                              <h2 style="font-family:veranda"><?php echo $row3['Name']; ?></h2>
                                <br>
                                <h3>About Us</h3><br>
                               
                                        <p><i><?php echo $row3['Description']; ?></i></p><br>
										
                                          <?php } ?>
                                        <?php
                                        if($row['M_ID'])
                                           {
                                              $row4 = mysqli_fetch_array($result4); ?>
                                              <h2 style="font-family:veranda"><?php echo $row4['Name']; ?></h2>
                                <br>
                                <h3>About Us</h3><br>
                               
                                        <p><i><?php echo $row4['Description']; ?></i></p><br>
									
                                         <?php } ?>
       
                                        <p>Tentative Price: Rs.<?php echo $row['Price']; ?></p><br>
                                			  <?php if(isset($_SESSION['login_user'])) { if(!strcmp($_SESSION['type'],'CU')){ ?>
										  <div>
										<form id="booking">
										<input type="date" name="bday">
										
										 <button type="button" class="btn btn-success" id="book" onclick="startAjax()">Book</button>
										 </form>
										 <div class="ajax_result">
                                        </div>
                                        </div>
										  <?php } } ?>
                                    </div>
									
                                   
                                </div>
                                </div>
                                </div>
								</div>

                                <!-- Meet the Team -->
                               
                              

                                <!-- End Meet the Team -->
                                <!-- Our Skills -->
   <footer class="footer-distributed">

			<div class="footer-left">

				<h3>Dream<span>Planner</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">Blog</a>
					·
					<a href="#">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">DreamPlanner &copy; 2015</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>21 Ring Street</span> Banglore</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+1 555 123456</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">support@dreamplanner.com</a></p>
				</div>

			</div>
<div class="footer-right">
				<p class="footer-company-about">
					<span>About the company</span>
				      An event planning and design firm.
				</p>
		<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

		</div>
</div>
</footer>
                               
        <!-- JS -->
        <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/scripts.js"></script>
        <!-- Isotope - Portfolio Sorting -->
        <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
        <!-- Mobile Menu - Slicknav -->
        <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
        <!-- Animate on Scroll-->
        <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
        <!-- Modernizr -->
        <script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
        <!-- End JS -->
    </body>
</html>
<!-- === END FOOTER === -->
