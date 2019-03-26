<?php
	include 'mysql.php';
	$table="signup";
	$_POSTDATA=array();
	array_push($_POSTDATA,"name","phone");
	$amount=count($_POSTDATA);
	for($i=0;$i<$amount;$i++)
	{
		if(isset($_POST[$_POSTDATA[$i]])==false) die("not valid param");
		if($_POST[$_POSTDATA[$i]]=="")  die("not valid param");
		if($i==0) db_insert($table,$_POSTDATA[$i],$_POST[$_POSTDATA[$i]]);
		else db_update($table,$_POSTDATA[0],$_POST[$_POSTDATA[0]],$_POSTDATA[$i],$_POST[$_POSTDATA[$i]]);
	}
	db_update($table,$_POSTDATA[0],$_POST[$_POSTDATA[0]],"time",time());
	echo '报名成功，我们将很快与您联系!'
?>
