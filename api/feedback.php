<?php
	include 'mysql.php';
	$table="feedback";
	$_POSTDATA=array();
	array_push($_POSTDATA,"time","user","content");
	$amount=count($_POSTDATA);
	$curtime=time();
	db_insert($table,$_POSTDATA[0],$curtime);
	for($i=1;$i<$amount;$i++)
	{
		if(isset($_POST[$_POSTDATA[$i]])==false) die("not valid param");
		if($_POST[$_POSTDATA[$i]]=="")  die("not valid param");
		else db_update($table,$_POSTDATA[0],$curtime,$_POSTDATA[$i],$_POST[$_POSTDATA[$i]]);
	}
	echo '提交成功'
?>
