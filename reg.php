<?php  
	include_once("top.php"); 
?>
<?php  
	$act = !empty($_GET['act']) ? trim($_GET['act']) : ''; 
	if($act == 'add')
	{
		$name = !empty($_POST['usernc']) ? trim($_POST['usernc']) : ''; 
		$pwd = !empty($_POST['p2']) ? md5(md5(trim($_POST['p2']))) : ''; 
		$email = !empty($_POST['email']) ? trim($_POST['email']) : ''; 
		$truename = !empty($_POST['truename']) ? trim($_POST['truename']) : ''; 
		$dizhi = !empty($_POST['dizhi']) ? trim($_POST['dizhi']) : ''; 
		$tel = !empty($_POST['tel']) ? trim($_POST['tel']) : ''; 
		$dongjie=0; 
		$sql4=mysql_query("select * from usermember where name='".$name."'",$conn); 
		$getcount=@mysql_num_rows($sql4); 
		if($getcount>0){
			echo "<script language='javascript'>alert('用户名存在，请选用其它用户名！'); history.back(); </script>"; 
		}
		else
		{
			mysql_query("insert into usermember (name,pwd,dongjie,email,truename,tel,dizhi) values ('$name','$pwd','$dongjie','$email','$truename','$tel','$dizhi')",$conn); 
			$_SESSION['username'] = $name; 
			echo "<script>alert('恭喜，注册成功!'); window.location='usercenter.php'; </script>"; 
		}
	}
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script type="text/javascript" src="js/checkuser.js"></script>
<script language="javascript">
function checkuser11(){
get(document.getElementById("usernc").value); 
}

</script>
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
	if(document.getElementById("p2").value==""){
		alert("请输入确认密码"); 
		return false; 
	}
	if(document.getElementById("p1").value!=document.getElementById("p2").value){
		alert("两次输入密码不一致"); 
		return false; 
	}
	if(document.getElementById("email").value==""){
		alert("请输入email"); 
		return false; }
	if(document.getElementById("truename").value==""){
		alert("请输入姓名"); 
		return false; }
	if(document.getElementById("dizhi").value==""){
		alert("请输入送货地址"); 
		return false; }
	var mobile=document.getElementById("tel").value; 
		if(mobile.length==0) 
       { 
          alert('请输入手机号码！');  
          return false;  
       }     
       if(mobile.length!=11) 
       { 
           alert('请输入有效的手机号码！'); 
           return false;  
       } 
        
       var myreg = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;  
       if(!myreg.test(mobile)) 
       { 
           alert('请输入有效的手机号码！'); 
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
				<li><a href="reg.php">会员注册</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				
                <center><h3>会员注册</h3></center>
                
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=add" onSubmit="return check(); ">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">填用户名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="请输入您的用户名" onchange="checkuser11(); "><span id="usercheck" style="color:red; "></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">输入密码</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p1" id="p1" placeholder="请输入密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">重复密码</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p2" id="p2" placeholder="请输入密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="请输入E-mail">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">联系手机</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="请输入手机号">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">真实姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="truename" id="truename" placeholder="请输入姓名">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">送货地址</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dizhi" id="dizhi" placeholder="请输入地址">
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