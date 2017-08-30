<!DOCTYPE html>
<?php 
include('login.php');
//echo $_SESSION['login_user'].$_SESSION['id'].$_SESSION['type']; 
?>
<html>
<title>History</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="http://static1.jabong.com/live/css/bootstrap1473748707392.css">-->

<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />

	

	<link rel="stylesheet" type="text/css" href="footer.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel='stylesheet' id='dt-main-css' href='http://www.myweddingplanning.in/wp-content/themes/dt-the7/css/main.min.css?ver=3.7.1' type='text/css' media='all'/>
<link rel='stylesheet' id='dt-custom.less-css' href='http://www.myweddingplanning.in/wp-content/uploads/wp-less/dt-the7/css/custom-be9cbc0534.css?ver=3.7.1' type='text/css' media='all'/>
<link rel="stylesheet" type="text/css" href="product_list.css">
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
<?php
$db = mysqli_connect('localhost', 'root', 'root','test');
//mysql_connect('localhost','root', 'root');
//@mysql_select_db('test') or die( "Unable to select database");
$q1="SELECT E_BookedId, Type from history WHERE C_ID=".$_SESSION['id'];
$result1 = mysqli_query($db,$q1);
$num=0;
//mysqli_close($db);
?>
<?php
$p1=""; $p2=""; $p3=""; $p4=""; $lstca="";$lstmu="";$lstde="";$lstha="";
while ($row1 = mysqli_fetch_array($result1)){
	if($row1['Type']=='CA'){
		$lstca .= $p1 .$row1['E_BookedId'];
				$p1 = ', ';
	}
	else if($row1['Type']=='MU'){
		$lstmu .= $p2. $row1['E_BookedId'];
				$p2 = ', ';
	}
	else if($row1['Type']=='DE'){
		$lstde .= $p3 .$row1['E_BookedId'];
				$p3 = ', ';
	}
	else if($row1['Type']=='HA'){
		$lstha .= $p4 .$row1['E_BookedId'];
				$p4 = ', ';
	}
} ?>
<?php 
		$q="SELECT caterer.ID, caterer.Name, caterer_pic.Picture FROM caterer INNER JOIN caterer_pic ON caterer.ID = caterer_pic.ID WHERE caterer_pic.pic_no=1 AND caterer.ID IN (".$lstca.")";
	    $ca= mysqli_query($db,$q);
		if($ca)
		$num=$num + mysqli_num_rows($ca);

		$q="SELECT musician_.ID, musician_.Name, musician_pic.Picture FROM musician_ INNER JOIN musician_pic ON musician_.ID = musician_pic.ID WHERE musician_pic.pic_no=1 AND musician_.ID IN (".$lstmu.")";
	    $mu= mysqli_query($db,$q);
		if($mu)
		$num=$num + mysqli_num_rows($mu);

		$q="SELECT decorator_.ID, decorator_.Name, deco_pic.Picture FROM decorator_ INNER JOIN deco_pic ON decorator_.ID = deco_pic.ID WHERE deco_pic.pic_no=1 AND decorator_.ID IN (".$lstde.")";
	    $de= mysqli_query($db,$q);
		if($de)
		$num=$num + mysqli_num_rows($de);

		$q="SELECT hall.ID, hall.Name, hall_pic.Picture FROM hall INNER JOIN hall_pic ON hall.ID = hall_pic.ID WHERE hall_pic.pic_no=1 AND hall.ID IN (".$lstha.")";
	    $ha= mysqli_query($db,$q);
		if($ha)
		$num=$num + mysqli_num_rows($ha);
?>
<body class="w3-light-grey w3-content home page page-id-9537 page-template-default slideshow-on large-hover-icons click-effect-on-img overlay-cursor-on accent-gradient srcset-enabled btn-flat custom-btn-color custom-btn-hover-color footer-overlap filter-style-ios contact-form-ios small-fancy-datas semitransparent-bullets light-icons phantom-fade phantom-shadow-decoration phantom-custom-logo-on floating-mobile-menu-icon top-header first-switch-logo-left first-switch-menu-right second-switch-logo-left second-switch-menu-right right-mobile-menu layzr-loading-on wpb-js-composer js-comp-ver-4.11.1 vc_responsive outlined-portfolio-icons album-minuatures-style-2" style="max-width:1600px;">
<div id="page">

<div class="masthead inline-header center widgets surround shadow-decoration show-device-logo show-mobile-logo" role="banner">
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
<header>
<div class="images" style="margin-top:20px;margin-left:5px;">
<div class="title1">
<div class="catalog-product-info">
<h1>Booking History:</h1>

</div>
</div>
</div>
</header>
<?php if($ca){
while ($row = mysqli_fetch_array($ca)){?>
<div class="container1" style="margin:4px">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Picture'] ).'" alt="Norway" style="height:350px;width:auto;max-width:350px;" class="w3-hover-opacity"/>'; ?>
      <div class="container" style="background-color:white;width:350px">
        <div class="names"><h4><b><?php echo $row['Name']; ?></b></h4></div>
      </div>
</div>
<?php } } ?>
<?php if($mu){
while ($row = mysqli_fetch_array($mu)){?>
<div class="container1" style="margin:4px">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Picture'] ).'" alt="Norway" style="height:350px;width:auto;max-width:350px;" class="w3-hover-opacity"/>'; ?>
      <div class="container" style="background-color:white;width:350px">
        <div class="names"><h4><b><?php echo $row['Name']; ?></b></h4></div>
      </div>
</div>
<?php } } ?>
<?php if($de){
while ($row = mysqli_fetch_array($de)){?>
<div class="container1" style="margin:4px">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Picture'] ).'" alt="Norway" style="height:350px;width:auto;max-width:350px;" class="w3-hover-opacity"/>'; ?>
      <div class="container" style="background-color:white;width:350px">
        <div class="names"><h4><b><?php echo $row['Name']; ?></b></h4></div>
      </div>
</div>
<?php } } ?>
<?php if($ha){
while ($row = mysqli_fetch_array($ha)){?>
<div class="container1" style="margin:4px">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Picture'] ).'" alt="Norway" style="height:350px;width:auto;max-width:350px;" class="w3-hover-opacity"/>'; ?>
      <div class="container" style="background-color:white;width:350px">
        <div class="names"><h4><b><?php echo $row['Name']; ?></b></h4></div>
      </div>
</div>
<?php } } ?>
</div>
</div>
</div>
</div>
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
</div>
</body>


</html>
