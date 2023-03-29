<?php  
include_once("top.php"); 
?>
<?php  
	$act = !empty($_GET['act']) ? trim($_GET['act']) : ''; 
	if($act == 'login')
	{
		$name = !empty($_POST['usernc']) ? trim($_POST['usernc']) : ''; 
		$pwd = !empty($_POST['p1']) ? md5(md5(trim($_POST['p1']))) : ''; 
		$sql=mysql_query("select * from usermember where name='".$name."'",$conn); 
		$row=mysql_fetch_array($sql); 
		 if($row==false){
			  echo "<script language='javascript'>alert('不存在此用户！'); history.back(); </script>"; 
			  exit; 
		   }
		  else{
			  if($row['dongjie']==1){
				   echo "<script language='javascript'>alert('该用户已经被冻结！'); history.back(); </script>"; 
				   exit; 
				}
			  //echo $pwd; 
			  //echo "<br>"; 
			  //echo $row['pwd']; 
			 // die; 
			  if($row['pwd']==$pwd)
				{
				   $_SESSION['username']=$row['name']; 
				   echo "<script>alert('登录成功！'); location.href='usercenter.php'; </script>"; 
				}
			  else {
				 echo "<script language='javascript'>alert('密码输入错误！'); history.back(); </script>"; 
				 exit; 
			   }
	
		  } 
	}
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script language="javascript">
function check(){
	if(document.getElementById("usernc").value==""){
		alert("请输入帐号"); 
		return false; 
		}
	if(document.getElementById("p1").value==""){
		alert("请输入密码"); 
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
				<li>会员登录</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				<div class="height2"></div>
                <center><h3>会员登录</h3></center>
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=login" onSubmit="return check(); ">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">填用户名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="请输入用户名">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">输入密码</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p1" id="p1" placeholder="请输入密码">
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