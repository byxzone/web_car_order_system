<script>
	function username_onclick(){
		$user='<?php echo $user; ?>';
		if($user!=""){
			mui.confirm('是否要退出登录？', '提示',["是","否"], function(e) {
								if(e.index==0) {
									xmlhttp=new XMLHttpRequest();
									xmlhttp.onreadystatechange=function(){
									if (xmlhttp.readyState==4 && xmlhttp.status==200){
										mui.toast(xmlhttp.responseText,{ duration:'long', type:'div' });
										var t=setTimeout("location.reload();",1000);
									}
								}
								xmlhttp.open("POST","api/session.php?",true);
								//$name=document.getElementById("name").value;
								//$phone=document.getElementById("phone").value;
								xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
								xmlhttp.send('m=empty');
								}
							}
							);
		}
	}
</script>
<div class="mui-card">
	<ul class="mui-table-view">
			<li class="mui-table-view-cell">
				<a class="mui-navigate-right" <?php if($user=="") echo "href='subpage/login.html'"?> onclick="username_onclick();" >
					<?php if($user!="") echo $row['name']; else echo "登录";?>
				</a>
			</li>
			</ul>
			</div>
			<div class="mui-card">
			 <ul class="mui-table-view"> 
			 
			 <li class="mui-table-view-cell mui-collapse">
			     <a class="mui-navigate-right" href="#">理论学习</a>
			     <div class="mui-collapse-content">
			 	                <ul class="mui-table-view">
			 			<li class="mui-table-view-cell">
			 				<a class="mui-navigate-right">
			 					科目一学习
			 				</a>
			 			</li>
			 			<li class="mui-table-view-cell">
			 				<a class="mui-navigate-right">
			 					 科目四学习
			 				</a>
			 			</li>
			 		</ul>
			     </div>
			 </li>
			 
			 <li class="mui-table-view-cell mui-collapse">
		    <a class="mui-navigate-right" href="#">我的教练</a>
		    <div class="mui-collapse-content">
			<?php if($user=="") echo "<p>您还未登录</p>";
				else include_once'subpage/mycoach.php';
			?>
			<!--
		        <p>面板2子内容</p>-->
		    </div>
		</li>
		
		
        <li class="mui-table-view-cell mui-collapse">
            <a class="mui-navigate-right" href="#">我的预约</a>
            <div class="mui-collapse-content">
				<?php if($user=="") echo "<p>您还未登录</p>";
					else include_once 'subpage/myreserve.php';
				?>
				<!--
                <ul class="mui-table-view">
                		<li class="mui-table-view-cell">
                			<a class="mui-navigate-right">
                				Item 1
                			</a>
                		</li>
                		<li class="mui-table-view-cell">
                			<a class="mui-navigate-right">
                				 Item 2
                			</a>
                		</li>
                		<li class="mui-table-view-cell">
                			<a class="mui-navigate-right">
                				 Item 3
                			</a>
                		</li>
                	</ul>
					-->
            </div>
        </li>
		
		<li class="mui-table-view-cell mui-collapse">
		    <a class="mui-navigate-right" href="#">学车顾问</a>
		    <div class="mui-collapse-content">
			<?php if($user=="") echo "<p>您还未登录</p>";
				else echo '您的专属学车顾问:';
			?>
			<!--
		        <p>面板2子内容</p>-->
		    </div>
		</li>
			 
		<li class="mui-table-view-cell mui-collapse">
		    <a class="mui-navigate-right" href="#">意见反馈</a>
		    <div class="mui-collapse-content">
			<?php if($user=="") echo "<p>您还未登录</p>"; 
				else include_once 'subpage/feedback.html'; 
			?>
			<!--
		        <p>面板3子内容</p>-->
		    </div>
		</li>
    </ul>
	</div>