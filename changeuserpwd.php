<?php  
include_once("sessionuser.php"); 
include_once("top.php"); 
?>
<?php  
	$act = !empty($_GET['act']) ? trim($_GET['act']) : ''; 
	if($act == 'edit')
	{
		$pwd = !empty($_POST['p2']) ? md5(md5(trim($_POST['p2']))) : ''; 
		if($pwd==""){
			echo "<script>alert('密码未修改，请使用原来密码！'); location.href='usercenter.php'; </script>"; 
			}
		else
		{
			mysql_query("update usermember set pwd='$pwd'",$conn); 
			echo "<script>alert('修改成功！'); location.href='usercenter.php'; </script>"; 
			}
	}
	$sql=mysql_query("select * from usermember where name='".$_SESSION['username']."'",$conn); 
	$row=mysql_fetch_array($sql); 
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script language="javascript">
function check(){
	if(document.getElementById("p1").value!=document.getElementById("p2").value){
		alert("两次输入密码不一致"); 
		return false; 
	}
}
</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> 首页</a></li>
				<li>会员中心</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				<div class="height2"></div>
                <center><h3>会员密码修改</h3></center>
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=edit" onSubmit="return check(); ">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">填用户名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="用户名不能修改" value="<?php   echo $row['name']; ?>"  readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">输入密码</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p1" id="p1" placeholder="不改请留空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">重复密码</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p2" id="p2" placeholder="不改请留空">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">提交</button>
                        </div>
                    </div>
                </form>
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