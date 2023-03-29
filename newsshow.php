<?php  
include_once("top.php"); 
?>
<?php  
$id = !empty($_GET['id']) ? intval($_GET['id']) : ''; 
$sql=mysql_query("select * from news where id='".$id."'",$conn); 
$row=mysql_fetch_array($sql); 
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> 首页</a></li>
				<li><a href="news.php">商城公告</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
					<h2 class="title"><?php   echo $row['title']; ?></h2>
					<p><span class="glyphicon glyphicon-time"></span> <span><?=$row['addtime']?></span> </p>
					<div style="border:1px dotted #ddd;  margin-bottom:10px; "></div>
                    <p><?=$row['content']?></p>
				</div>
			</div>
		</div>
<?php  
include_once("left.php"); 
?>
	</div>
</div>
<?php  
	include_once("foot.php"); 
?>