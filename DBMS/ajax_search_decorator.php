
<?php
$db = mysqli_connect('localhost', 'root', 'root','test');
//mysql_connect('localhost','root', 'root');
//@mysql_select_db('test') or die( "Unable to select database");
$query="SELECT decorator_.ID, decorator_.Name, decorator_.State, deco_pic.Picture FROM decorator_ INNER JOIN deco_pic ON decorator_.ID = deco_pic.ID INNER JOIN type_deco ON decorator_.ID = type_deco.ID WHERE deco_pic.pic_no=1";
extract($_POST);
    if(isset($dec))
	{
		$prefix = $lst = '';
			foreach ($dec as $c)
			{
				$lst .= $prefix . '"' . $c . '"';
				$prefix = ', ';
			}
		$query.=" AND type_deco.Type IN (".$lst.")";
	}
	if(isset($place))
	{
		$prefix_ = $lst_ = '';
			foreach ($place as $p)
			{
				$lst_ .= $prefix_ . '"' . $p . '"';
				$prefix_ = ', ';
			}
		$query.=" AND decorator_.State IN (".$lst_.")";
	}
	
	$query.=" GROUP BY decorator_.ID";
	
//$result = mysqli_query($db,$query);
//echo $query;
$all_row=$db->query($query);
$num=mysqli_num_rows($all_row);
//mysqli_close($db);
?>
<header>
<div class="images" style="margin-top:20px;margin-left:5px;">
<div class="title1">
<div class="catalog-product-info">
<h1>Decorators</h1>
<span class="product-count"><h5><?php echo $num ?> products</h5></span>

</div>
</div>
</div>
</header>

<?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
    <?php foreach ($all_row as $key => $product) { ?>
<?php if(isset($_SESSION['login_user'])){$uid=$_SESSION['id'];}else{$uid='';} ?>
<?php echo '<a href="deco_desc.php?id='.$product['ID'].'&uid='.$uid.'" >';?><div class="container1" style="margin:4px">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $product['Picture'] ).'" alt="Norway" style="height:350px;width:auto;max-width:350px;" class="w3-hover-opacity"/>'; ?>
      <div class="container" style="background-color:white;width:350px">
        <div class="names"><h4><b><?php echo $product['Name']; ?></b></h4></div>
      </div>
</div>
  <?php } ?>
<?php endif; ?>
