<?php  
include_once("sessionuser.php"); 
include_once("top.php"); 
?>
<?php  
	$act = !empty($_GET['act']) ? trim($_GET['act']) : ''; 
	if($act == 'edit')
	{
		$tel = !empty($_POST['tel']) ? trim($_POST['tel']) : ''; 
		$truename = !empty($_POST['truename']) ? trim($_POST['truename']) : ''; 
		$dizhi = !empty($_POST['dizhi']) ? trim($_POST['dizhi']) : ''; 
		$email = !empty($_POST['email']) ? trim($_POST['email']) : ''; 
		mysql_query("update usermember set email='$email',truename='$truename',tel='$tel',dizhi='$dizhi'",$conn); 
		echo "<script>alert('修改成功！'); location.href='usercenter.php'; </script>"; 
	}
	$sql=mysql_query("select * from usermember where name='".$_SESSION['username']."'",$conn); 
	$row=mysql_fetch_array($sql); 
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script language="javascript">
function check(){
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

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> 首页</a></li>
				<li>会员中心</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				
                <center><h3>会员信息修改</h3></center>
                
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=edit" onSubmit="return check(); ">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">填用户名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="用户名不能修改" value="<?php   echo $row['name']; ?>"  readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="请输入E-mail" value="<?php   echo $row['email']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">联系手机</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="请输入手机号" value="<?php   echo $row['tel']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">真实姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="truename" id="truename" placeholder="请输入姓名" value="<?php   echo $row['truename']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">送货地址</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dizhi" id="dizhi" placeholder="请输入地址" value="<?php   echo $row['dizhi']; ?>">
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