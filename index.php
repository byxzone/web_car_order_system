<!DOCTYPE html>
<?php 
session_start(); 
include 'api/mysql.php';
header("Content-type: text/html; charset:utf-8");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>晨曦学车</title>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8">
      	mui.init();
		var login=false;
    </script>
	<?
	$user="";
	if(isset($_SESSION['user'])) {
		$user=$_SESSION['user'];
		$row=db_query('user','username',$user);
		
	echo "<script>
		login=true;
	</script>";
	}
?>
</head>
<body>
<!-- 底部tab开始 -->
	<nav class="mui-bar mui-bar-tab">
		<a class="mui-tab-item mui-active" href="#main" id='tab_main'>
			<span class="mui-icon mui-icon-home"></span>
			<span class="mui-tab-label">我要报名</span>
		</a>
		<a class="mui-tab-item" href="#freetry" id='tab_freetry'>
			<span class="mui-icon mui-icon-phone"></span>
			<span class="mui-tab-label">我要试学</span>
		</a>
		<a class="mui-tab-item"  href="#reserve" id='tab_reserve'>
			<span class="mui-icon mui-icon-map"></span>
			<span class="mui-tab-label">我要约车</span>
		</a>
		<a class="mui-tab-item"  href="#self" id='tab_self'>
			<span class="mui-icon mui-icon-gear"></span>
			<span class="mui-tab-label">个人中心</span>
		</a>
	</nav>
	<!-- 底部tab结束 -->
	<div class="mui-content">
		<div id="main" class="mui-control-content mui-active">
		<?php include 'subpage/tab/main.html';?>
		</div>
		<div id="freetry" class="mui-control-content">
		<?php include 'subpage/tab/freetry.html';?>
		</div>
		<div id="reserve" class="mui-control-content">
		<?php include 'subpage/tab/reserve.php';?>
		</div>
		<div id="self" class="mui-control-content">
		<?php include 'subpage/tab/self.php';?>
		</div>
	</div>
	<script>
	function refreshHash(){
		var select=location.hash.replace("#","");
		if(select=="") select='main';
		var current=document.getElementById(select);
		var defaultTab=document.getElementById('main');
		defaultTab.classList.remove('mui-active');
		current.classList.add('mui-active');
		current=document.getElementById('tab_'+select);
		defaultTab=document.getElementById('tab_main');
		defaultTab.classList.remove('mui-active');
		current.classList.add('mui-active');
	}
	refreshHash();
　　window.addEventListener("hashchange",refreshHash, false);

	</script>
</body>
</html>