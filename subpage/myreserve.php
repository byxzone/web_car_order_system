<?php
	function getDetail($id,$item){
		if(isset($detail[$id][$item])){
			echo $detail[$id][$item];
		}
		else die('no this item');
	}
?>
<script>

function reverse_onclick($id){
	var coachname='<?php echo $coachname; ?>';
	var detail = JSON.parse(window.atob(document.getElementById($id).innerHTML));
	var msg="预约日期:"+detail['date'];
	msg=msg+"<br>时间:"+detail['time_begin']+"-"+detail['time_end'];
	msg=msg+"<br>教练:"+coachname;
	var stat="";
	if(detail['stat']==1) stat="已进行学习"; else stat="未进行学习";
	msg=msg+"<br>预约状态:"+stat; 
	mui.alert(msg); 
}
</script>

 <ul class="mui-table-view">
  <?php
 $con=db_connect();
 $row=db_query("user","username",$user);
 $userid=$row['id'];
 $detail=array();
 mysqli_query($con,"SET NAMES 'utf8'");
    $sql="SELECT * FROM reserve
          WHERE user = '$userid' and stat='0'";
    $result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($result))
{
	$content=$coachname."，".$row['date'];
	$id=$row['id']; //预约订单Id
    listItemAdd($id,$content);
	$detail[$id]=array();
	$datail[$id]=arrayCopy($row);
	$row_b=db_query('class','id',$row['template']);
	$datail[$id]['time_begin']=$row_b['time_begin'];
	$datail[$id]['time_end']=$row_b['time_end'];
	$json=base64_encode(json_encode($datail[$id]));
	echo "<p id='$id' hidden>$json</p>";
}
$sql="SELECT * FROM reserve
          WHERE user = '$userid' and stat='1'";
    $result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($result))
{
	$content=$coachname."，".$row['date'];
	$id=$row['id']; //预约订单Id
    listItemAdd($id,$content);
	$detail[$id]=array();
	$datail[$id]=arrayCopy($row);
	$row_b=db_query('class','id',$row['template']);
	$datail[$id]['time_begin']=$row_b['time_begin'];
	$datail[$id]['time_end']=$row_b['time_end'];
	$json=base64_encode(json_encode($datail[$id]));
	echo "<p id='$id' hidden>$json</p>";
}
function listItemAdd($id,$content){
	echo "<li class='mui-table-view-cell' onclick='reverse_onclick($id);'>
                			<a class='mui-navigate-right'>
                				$content
                			</a>
                		</li>";
}
function arrayCopy(array $array) {
        $result = array();
        foreach( $array as $key => $val ) {
            if( is_array( $val ) ) {
                $result[$key] = arrayCopy( $val );
            } elseif ( is_object( $val ) ) {
                $result[$key] = clone $val;
            } else {
                $result[$key] = $val;
            }
        }
        return $result;
}
 ?>
 
                	</ul>
					