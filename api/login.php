<?php
	session_start();
	include 'mysql.php';
	$row=db_query('user','username',$_POST['username']);
	if(count($row)==0) die('error');
	if($row['password']==$_POST['password']){
		$_SESSION['user']=$_POST['username'];
		die('ok');
	}
	die('error');

?>