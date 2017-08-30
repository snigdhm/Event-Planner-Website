
<?php
$db = mysqli_connect('localhost', 'root', 'root','test');
//mysql_connect('localhost','root', 'root');
//@mysql_select_db('test') or die( "Unable to select database");
$query="SELECT hall.ID, hall.Name, hall.State, hall_pic.Picture FROM hall INNER JOIN hall_pic ON hall.ID = hall_pic.ID WHERE hall_pic.pic_no=1";
extract($_POST);
    if(isset($cap))
	{
		if($cap==1)
		$query.=" AND hall.Capacity < 1000";
		else if($cap==2)
		$query.=" AND hall.Capacity >= 1000 AND hall.Capacity <= 2000";
		else if($cap==3)
		$query.=" AND hall.Capacity > 2000";
	}
	if(isset($pri))
	{
		if($pri==1)
		$query.=" AND hall.Price <= 7000";
		else if($pri==2)
		$query.=" AND hall.Price > 7000 AND hall.Price <= 10000";
		else if($pri==3)
		$query.=" AND hall.Capacity > 10000";
	}
	if(isset($ac))
	{
		if($ac==1)
		$query.=" AND hall.AC = True";
		else if($ac==0)
		$query.=" AND hall.AC = False";
		
	}
	if(isset($place))
	{
		$prefix_ = $lst_ = '';
			foreach ($place as $p)
			{
				$lst_ .= $prefix_ . '"' . $p . '"';
				$prefix_ = ', ';
			}
		$query.=" AND hall.State IN (".$lst_.")";
	}
	
	$query.=" GROUP BY hall.ID";
	
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
<h1>Halls</h1>
<span class="product-count"><h5><?php echo $num ?> products</h5></span>

</div>
</div>
</div>
</header>

<?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
    <?php foreach ($all_row as $key => $product) { ?>
<?php if(isset($_SESSION['login_user'])){$uid=$_SESSION['id'];}else{$uid='';} ?>
<?php echo '<a href="hall_desc.php?id='.$product['ID'].'&uid='.$uid.'" >';?><div class="container1" style="margin:4px">    
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $product['Picture'] ).'" alt="Norway" style="height:350px;width:auto;max-width:350px;" class="w3-hover-opacity"/>'; ?>
      <div class="container" style="background-color:white;width:350px">
        <div class="names"><h4><b><?php echo $product['Name']; ?></b></h4></div>
      </div>
</div>
  <?php } ?>
<?php endif; ?>
