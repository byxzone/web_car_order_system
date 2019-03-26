<?php
	$row=db_query('user','username',$user);
	$temp=$row['coach'];
	//echo "<script>alert('')</script>";
	$coachid=$row['coach'];
	$row=db_query('user','id',$coachid);
	$coachname=$row['name'];
	$imgsrc='default';
	if(file_exists('\img\coach\$coachid.png')==1) $imgsrc=$coachid;
?>
	<ul class="mui-table-view">
    <li class="mui-table-view-cell mui-media">
        <a href="javascript:;">
            <img class="mui-media-object mui-pull-left" src='img\coach\<?php echo $imgsrc;?>.png'>
            <div class="mui-media-body">
			<?php echo $coachname; ?>
            </div>
        </a>
    </li>
</ul>