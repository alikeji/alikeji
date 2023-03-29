<?php  
include_once("top.php"); 
include_once("conn/page.php"); 
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
			<div class="list-group">
			<?php  
			$countSql="select id from news"; //sql语句
			$pageSize="10";  //每页显示数
			$curPage= !empty($_GET['curPage']) ? intval($_GET['curPage']) :0; //通过GET传来的当前页数
			$urlPara= ""; //这是URL后面跟的参数，也就是问号传值
		    $pageid=""; 
			$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara,$pageid); 
			$pageOutStrArr=explode("||",$pageOutStr); 
			$rsStart=$pageOutStrArr[0]; //limit 后的第一个参数
			$pageStr=$pageOutStrArr[2]; //limit 后的第二个参数
			$pageCount=$pageOutStrArr[1]; //总页数
			$sql = mysql_query("select *  from news order by addtime desc limit $rsStart, $pageSize",$conn); 
			while($row=mysql_fetch_array($sql))
			{
			?>
				<div class="list-group-item">
					<h4><a href="newsshow.php?id=<?=$row['id']?>"><?=$row['title']?> <span class="badge"> <?=$row['addtime']?></span></a></a></h4>
				</div><input type="hidden" value="<?=$urlPara?>" name="url"><input type="hidden" value="<?=$curPage?>" name="curPage">
			<?php  
            }
			?>
			</div>
			<div class="pages">
				<ul class="pagination">
					 <?=$pageStr?>
				</ul>
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