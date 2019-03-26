<?php
$date=date("m-d",time()+86400*1);
$date2=date('m-d',time()+86400*2);
$date3=date('m-d',time()+86400*3);
?>
<script>
cur=1;	
function day_onclick(i){
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
	if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById('r_item'+i).innerHTML=xmlhttp.responseText;
		var curTab=document.getElementById('r_item'+cur);
		var goTab=document.getElementById('r_item'+i);
		curTab.classList.remove('mui-active');
		goTab.classList.add('mui-active');
		cur=i;
	}
	}
		xmlhttp.open('POST','subpage/daylist.php?',true);
		xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xmlhttp.send('i='+i);
}
day_onclick(1);
</script>
<div class='mui-segmented-control'>
	<a class='mui-control-item mui-active' href='#item1' id='tab_item1' onclick='day_onclick(1);'><?php echo $date;?></a>
	<a class='mui-control-item' href='#item2' id='tab_item2'  onclick='day_onclick(2);'><?php echo $date2;?></a>
	<a class='mui-control-item' href='#item3' id='tab_item3' onclick='day_onclick(3);'><?php echo $date3;?></a>
</div>

<div class='mui-content mui-card'>
		<div id='r_item1' class='mui-control-content'>
			
		</div>
		<div id='r_item2' class='mui-control-content'>
		2
		</div>
		<div id='r_item3' class='mui-control-content '>
		3
		</div>
	</div>