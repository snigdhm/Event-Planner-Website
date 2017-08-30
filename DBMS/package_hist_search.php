<?php
$db = mysqli_connect('localhost', 'root', 'root','test');
extract($_POST);
$q="SELECT H_ID, M_ID, C_ID, D_ID, Price FROM bumper WHERE ID=".$bookID;
$res = mysqli_query($db,$q);
$r = mysqli_fetch_array($res);
if($r['H_ID'])
$lst = $r['H_ID'];
if($r['M_ID'])
$lst=$lst.','. $r['M_ID'];
if($r['M_ID'])
$lst=$lst.','. $r['C_ID'];
if($r['M_ID'])
$lst=$lst.','. $r['H_ID'];
/*if($r['H_ID'])
$q1="SELECT COUNT(*) AS cnt FROM history WHERE Booked_date = '".$bdate."' AND E_BookedId ='".$r['H_ID']."'";
if($r['M_ID'])
$q2="SELECT COUNT(*) AS cnt FROM history WHERE Booked_date = '".$bdate."' AND E_BookedId ='".$r['M_ID']."'";
if($r['D_ID'])
$q3="SELECT COUNT(*) AS cnt FROM history WHERE Booked_date = '".$bdate."' AND E_BookedId ='".$r['D_ID']."'";
if($r['C_ID'])
$q4="SELECT COUNT(*) AS cnt FROM history WHERE Booked_date = '".$bdate."' AND E_BookedId ='".$r['C_ID']."'";*/
$query="SELECT COUNT(*) AS cnt FROM history WHERE Booked_date = '".$bdate."' AND E_BookedId IN (".$lst.")";
if($r['H_ID'])
$query2="INSERT INTO history (Booked_date,E_BookedId,C_ID,Type) VALUES ('".$bdate."',".$r['H_ID'].",".$id_.",'HA')";
if($r['M_ID'])
$query3="INSERT INTO history (Booked_date,E_BookedId,C_ID,Type) VALUES ('".$bdate."',".$r['M_ID'].",".$id_.",'MU')";
if($r['D_ID'])
$query4="INSERT INTO history (Booked_date,E_BookedId,C_ID,Type) VALUES ('".$bdate."',".$r['D_ID'].",".$id_.",'DE')";
if($r['C_ID'])
$query5="INSERT INTO history (Booked_date,E_BookedId,C_ID,Type) VALUES ('".$bdate."',".$r['C_ID'].",".$id_.",'CA')";

$all_row=$db->query($query);

		  date_default_timezone_set("Asia/Calcutta");
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
	if($r['H_ID'])
	$all_row2=$db->query($query2);
	if($r['M_ID'])
	$all_row3=$db->query($query3);
	if($r['D_ID'])
	$all_row4=$db->query($query4);
	if($r['C_ID'])
	$all_row5=$db->query($query5);
		
}
} ?>
<?php endif; ?>

