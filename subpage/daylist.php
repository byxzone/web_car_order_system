<script>
</script>
<ul class="mui-table-view">
<?php
session_start();
include_once '../api/mysql.php';
function itemAdd($content,$id){
	echo "<li class='mui-table-view-cell' onclick='r_item_onclick($id);'>
		<a class='mui-navigate-right'>
			$content
		</a>
	</li>";
}

	$date=date("m-d",time()+86400*$_POST['i']);
	//echo $date;
	$row=db_query('user','username',$_SESSION['user']);
	$coachid=$row['coach'];
	$con=db_connect();
	mysqli_query($con,"SET NAMES 'utf8'");
    $sql="SELECT * FROM reserve_list
          WHERE date = '$date' and coach='$coachid'";
    $result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($result))
{
	$row_b=db_query('class','id',$row['template']);
	$time_begin=$row_b['time_begin'];
	$time_end=$row_b['time_end'];
	$users=json_decode($row['users']);
	$stat='';
	if(count($users)>=$row_b['number']) $stat='(已满)';
	itemAdd("$time_begin-$time_end $stat",'');
}

?>

</ul>