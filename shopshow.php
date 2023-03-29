<?php  
	include_once("top.php"); 
	include_once("conn/page.php"); 
?>
<?php  
$act = !empty($_GET['act']) ? trim($_GET['act']) : ''; 
if($act == 'add')
{
	$username = !empty($_SESSION['username']) ? $_SESSION['username'] : ''; 
	if(empty($username)){
	echo "<script>alert('请登录后操作!'); top.location='login.php'</script>"; 
	}
	$spid = !empty($_GET['pid']) ? intval($_GET['pid']) : ''; 
	$sql4=mysql_query("select * from dingdan where  xiadanren='".$_SESSION['username']."' and zt='已收货' and spc like '%$spid%'",$conn); 
	$getcount=@mysql_num_rows($sql4); 
	if($getcount>0){
		$content = !empty($_POST['content_desc']) ? trim($_POST['content_desc']) : ''; 
		$sql=mysql_query("select * from usermember where name='".$_SESSION['username']."'",$conn); 
		$info=mysql_fetch_array($sql); 
		$userid=$info['id']; 
		mysql_query("insert into pinglun (userid,spid,content) values ('$userid','$spid','$content') ",$conn); 
		echo "<script>alert('评论发表成功!'); location.href='shopshow.php?id=$spid'; </script>"; 
	}
	else
	{
		echo "<script>alert('您未购买过此商品或订单未完成!'); location.href='shopshow.php?id=$spid'; </script>"; 
	}
	
}
$id = !empty($_GET['id']) ? intval($_GET['id']) : ''; 
$typeid=!empty($_GET['typeid']) ? intval($_GET['typeid']) : ''; 


$sqlss=mysql_query("update shangpin set dianji=dianji+1 where id='$id'",$conn); 
$sql11=mysql_query("select * from shangpin where id='$id'",$conn); 
$row11=mysql_fetch_array($sql11); 
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script type="text/javascript"> 
function check(){
    if(document.form1.content_desc.value==""){
		alert("请输入评论内容"); 
		document.form1.content_desc.focus(); 
		return false; }
}
</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> 首页</a></li>
				<li><a href="shops.php">商品展示</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-6"><img class="img-responsive" src="<?php   echo __BASE__; ?>/upimages/<?php   echo $row11["tupian"]; ?>" alt="" /></div>
                        <div  class="col-md-6">
                            <h2><?=$row11['mingcheng']?></h2>
                            <p>商品编号：<?=$row11['xinghao']?></p>
                            <p>商品数量：<?=$row11['shuliang']?></p>
                            <p>市场价：<s>￥<?=$row11['shichangjia']?></s>元</p>
    						<p>会员价：<font color="#FF0000">￥<?=$row11['huiyuanjia']?>元</font></p>
                            <p>商品点击：<?=$row11['dianji']?></p>
                            <div class="details-in">
                                <a href="addgouwuche.php?id=<?=$row11['id']?>" class="details"><button type="button" class="btn btn-danger">我要购买</button></a>
                            </div>
                        </div>
						<div class="clearfix"></div>
                        <div class="height2"></div>
                        <p> <?=$row11['jianjie']?></p>
                        <div class="height2"></div>
				</div>
			</div>
            <div class="list-group">
			<?php  
			$countSql="select id from pinglun where spid='$id'"; //sql语句
			$pageSize="10";  //每页显示数
			$curPage= !empty($_GET['curPage']) ? intval($_GET['curPage']) :0; //通过GET传来的当前页数
			$urlPara= ""; //这是URL后面跟的参数，也就是问号传值
		    $pageid=""; 
			$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara,$pageid); 
			$pageOutStrArr=explode("||",$pageOutStr); 
			$rsStart=$pageOutStrArr[0]; //limit 后的第一个参数
			$pageStr=$pageOutStrArr[2]; //limit 后的第二个参数
			$pageCount=$pageOutStrArr[1]; //总页数
			$sql = mysql_query("select * from pinglun where spid='$id' order by id desc limit $rsStart, $pageSize",$conn); 
			while($row=mysql_fetch_array($sql))
			{
			?>
				<div class="list-group-item">
					<h4>评论人：<font color="#FF0000"><?php   
			  $spid=$row['userid']; 
			  $sql1 =  mysql_query("select * from usermember where id='$spid'",$conn); 
				$row1=mysql_fetch_object($sql1); 
                 echo $row1->name; 
              ?></font> 提交时间：<span class="badge"> <?=$row['addtime']?></span></a> </h4>
				</div>
                <div class="alert alert-info">
				<?=$row['content']?>
				</div>
            <?php   } ?>
			</div>
			<div class="pages">
				<ul class="pagination">
					 <?=$pageStr?>
				</ul>
			</div>
            
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1" action="?act=add&pid=<?=$id?>&typeid=<?=$typeid?>" onSubmit="return check(); ">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">发表评论</label>
                        <div class="col-sm-10">
                          <textarea name="content_desc" rows="4" class="form-control" placeholder="请输入评论内容"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">提交</button>
                        </div>
                    </div>
                </form>
            
		</div>
<?php  
include_once("left.php"); 
?>
	</div>
</div>
<?php  

include_once("foot.php"); 
?>
