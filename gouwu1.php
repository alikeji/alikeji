<?php  
session_start(); 
include_once("top.php"); 
?>
<?php  
$id = !empty($_GET['id']) ? intval($_GET['id']) : ''; 
$typeid=!empty($_GET['typeid']) ? intval($_GET['typeid']) : ''; 
$sqlss=mysql_query("update shangpin set dianji=dianji+1 where id='$id'",$conn); 
$sql=mysql_query("select * from shangpin where id='$id'",$conn); 
$row=mysql_fetch_object($sql); 
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
				<li>我的购物车</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                    <form name="form1" method="post" action="gouwu1.php">
                      <caption>我的购物车</caption>
                      <?php  
					  $_SESSION['total'] = null; 
					  $qk = !empty($_GET['qk']) ? trim($_GET['qk']) : ''; 
					  if($qk=="yes"){
						 $_SESSION['producelist']=""; 
						 $_SESSION['quatity']="";  
					  }
					  $sessionproducelist = !empty($_SESSION['producelist']) ? trim($_SESSION['producelist']) : ''; 
					  if(!isset($_SESSION['producelist'])){
					echo "<tr>"; 
						   echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>您的购物车为空!</td>"; 
						   echo"</tr>"; 
					
					}else{
					   $arraygwc=explode("@",$_SESSION['producelist']); 
					   $s=0; 
					   for($i=0; $i<count($arraygwc); $i++){
						   $s+=intval($arraygwc[$i]); 
					   }
					  if($s==0 ){
						   echo "<tr>"; 
						   echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>您的购物车为空!</td>"; 
						   echo"</tr>"; 
						}
					  else{ 
					?>
                      <thead>
                        <tr bgcolor="#FFEDBF">
                          <th height="35" align="center">商品名称</th>
                          <th height="35" align="center">数量</th>
                          <th height="35" align="center">市场价</th>
                          <th height="35" align="center">会员价</th>
                          <th height="35" align="center">折扣</th>
                          <th height="35" align="center">小计</th>
                          <th height="35" align="center">操作</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php  
						$total=0; 
						$array=explode("@",$_SESSION['producelist']); 
						$arrayquatity=explode("@",$_SESSION['quatity']); 
						 while(list($name,$value)=each($_POST)){
							  for($i=0; $i<count($array)-1; $i++){
								if(($array[$i])==$name){
								  $arrayquatity[$i]=$value;   
								}
							}
						}
						$_SESSION['quatity']=implode("@",$arrayquatity); 
						
						for($i=0; $i<count($array)-1; $i++){ 
						   $id=$array[$i]; 
						   $num=$arrayquatity[$i]; 
						  
						  if($id!=""){
						   $sql=mysql_query("select * from shangpin where id='".$id."'",$conn); 
						   $info=mysql_fetch_array($sql); 
						   $total1=$num*$info['huiyuanjia']; 
						   $total+=$total1; 
						   $_SESSION["total"]=$total; 
					?>
                      	<tr>
                          <td height="35"><?php   echo $info['mingcheng']; ?></td>
                          <td height="35"><input type="text" name="<?php   echo $info['id']; ?>" size="2" class="inputcss" value=<?php   echo $num; ?>></td>
                          <td height="35"><?php   echo $info['shichangjia']; ?>元</td>
                          <td height="35"><?php   echo $info['huiyuanjia']; ?>元</td>
                          <td height="35"><?php   echo @(ceil(($info['huiyuanjia']/$info['shichangjia'])*100))."%"; ?></td>
                          <td height="35"><?php   echo $info['huiyuanjia']*$num."元"; ?></td>
                          <td height="35"><a href="removegwc.php?id=<?php   echo $info['id']?>">移除</a></td>
                        </tr>
                     <?php  
						  }
						 }
					 ?>
                      </tbody>
                     <tbody>
                      	<tr>
                      	  <td colspan="7" align="center">
                        <table class="table" style="margin-bottom: 0px; " height="25" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center"><button name="submit2" type="submit" class="btn btn-default">更改商品数量</button></td>
                          <td align="center"><a href="gouwu2.php">去收银台</a></td>
                          <td align="center"><a href="gouwu1.php?qk=yes">清空购物车</a></td>
                          <td align="center">总计：<?php   echo $total; ?>元</td>
                        </tr>
                      </table>
                        </td>
                       </tr>
                      </tbody>
                     <?php  
						 }}
						?></form>
                    </table>
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