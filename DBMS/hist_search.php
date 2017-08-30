<?php
$db = mysqli_connect('localhost', 'root', 'root','test');
extract($_POST);
$query="SELECT COUNT(*) AS cnt FROM history WHERE Booked_date = '".$bdate."' AND E_BookedId = ".$bookID;
$query2="INSERT INTO history (Booked_date,E_BookedId,C_ID,Type) VALUES ('".$bdate."',".$bookID.",".$id_.",'".$type."')";
  date_default_timezone_set("Asia/Calcutta");
$all_row=$db->query($query);
?>
<?php if(isset($all_row) && is_object($all_row) && count($all_row)):?>
<br>
<?php foreach ($all_row as $key => $product) { 
if (date("Y-m-d") > ($bdate))
{
   echo "Invalid date";
}
else if($product['cnt']>0)
{
	echo "Sorry! The service is already booked for this day";
}
else
{
	echo "Successfully booked";
	$all_row2=$db->query($query2);
}
} ?>
<?php endif; ?>

