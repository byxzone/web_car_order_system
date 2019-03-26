<?php 
if(isset($_SESSION['user'])==false)echo("<script>
alert('请先登录');
mui.openWindow('#self')
</script><p class='mui-card'>您还未登录，登录后才可进行预约<br>请点击右下角个人中心登录!</p>");
else include 'subpage/reserve_list.php';
?>
