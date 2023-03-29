<?php  
include_once("sessionuser.php"); 
include_once("top.php"); 

?>
<?php  
	$act = !empty($_GET['act']) ? trim($_GET['act']) : ''; 
	if($act == 'add')
	{
		$sql=mysql_query("select * from usermember where name='".$_SESSION['username']."'",$conn); 
		$row=mysql_fetch_array($sql); 
		$dingdanhao=date("YmjHis").$row['id']; 
		$spc=$_SESSION['producelist']; 
		$slc= $_SESSION['quatity']; 
		$shouhuoren= !empty($_POST['truename']) ? trim($_POST['truename']) : ''; 
		$sex= !empty($_POST['sex']) ? trim($_POST['sex']) : ''; 
		$dizhi = !empty($_POST['dizhi']) ? trim($_POST['dizhi']) : ''; 
		$youbian = !empty($_POST['yb']) ? trim($_POST['yb']) : ''; 
		$tel = !empty($_POST['tel']) ? trim($_POST['tel']) : ''; 
		$email = !empty($_POST['email']) ? trim($_POST['email']) : ''; 
		$shff = !empty($_POST['shff']) ? trim($_POST['shff']) : ''; 
		$zfff = !empty($_POST['zfff']) ? trim($_POST['zfff']) : ''; 
		$leaveword = !empty($_POST['ly']) ? trim($_POST['ly']) : ''; 
 		$xiadanren=$_SESSION['username']; 
 		$zt="未作任何处理"; 
 		$total=$_SESSION['total']; 
		 mysql_query("insert into dingdan(dingdanhao,spc,slc,shouhuoren,sex,dizhi,tel,email,zfff,leaveword,xiadanren,zt,total) values ('$dingdanhao','$spc','$slc','$shouhuoren','$sex','$dizhi','$tel','$email','$zfff','$leaveword','$xiadanren','$zt','$total')",$conn);  
		 header("location:gouwu2.php?dingdanhao=$dingdanhao"); 
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
	if(document.getElementById("tsda").value==""){
		alert("请输入密码提示答案"); 
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
				<li>填写收货信息</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				<div class="height2"></div>
                <center><h3>填写收货信息</h3></center>
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=add" onSubmit="return check(); ">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">收货姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="truename" id="truename" placeholder="收货姓名" value="<?php   echo $row['truename']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">性别</label>
                        <div class="col-sm-10">
                            <select name="sex" class="form-control">
                              <option selected value="男">男</option>
                              <option value="女">女</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">联系手机</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="请输入手机号" value="<?php   echo $row['tel']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="请输入E-mail" value="<?php   echo $row['email']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">送货地址</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dizhi" id="dizhi" placeholder="请输入地址" value="<?php   echo $row['dizhi']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">支付方式</label>
                        <div class="col-sm-10">
                            <select name="zfff" class="form-control">
                              <option selected value="银行汇款">银行汇款</option>
                              <option value="支付宝">支付宝</option>
                              <option value="邮局汇款">邮局汇款</option>
                              <option value="微信支付">微信支付</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">简单留言</label>
                        <div class="col-sm-10">
                            <textarea name="ly" cols="70" rows="5" class="form-control"></textarea>
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
<?php  
 $dingdanhao = !empty($_GET['dingdanhao']) ? trim($_GET['dingdanhao']) : ''; 
 if($dingdanhao!="")
  {  $dd=$dingdanhao; 
	if(!session_id()) session_start(); 
	$array=explode("@",$_SESSION['producelist']); 
	 $sum=count($array)*20+260; 
    echo "<script>alert('订购成功！'); location.href='showorder.php?dd='+'".$dd."'; </script>"; 
  }
?>