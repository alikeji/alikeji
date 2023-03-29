<?php  
include_once("sessionuser.php"); 
include_once("top.php"); 
?>
<?php  
$act = !empty($_GET['act']) ? trim($_GET['act']) : ''; 
if($act == 'zhifu')
{
	$dingdanhao=!empty($_GET['dingdanhao']) ? trim($_GET['dingdanhao']) : ''; 
	$sqlss=mysql_query("update dingdan set zt='已收款' where dingdanhao='".$dingdanhao."'",$conn); 
	echo "<script>alert('支付成功！'); location.href='orders.php'; </script>"; 
}
  $dingdanhao=!empty($_GET['dd']) ? trim($_GET['dd']) : ''; 
  $sql2=mysql_query("select * from dingdan where dingdanhao='".$dingdanhao."'",$conn); 
  $info2=mysql_fetch_array($sql2); 
  $spc=$info2['spc']; 
  $slc=$info2['slc']; 
  $arraysp=explode("@",$spc); 
  $arraysl=explode("@",$slc); 
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> 首页</a></li>
				<li>查看订单</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                      <caption><?php   echo $_SESSION['username']; ?>，您的订单号为：<font color="#FF0000"><?php   echo $dingdanhao; ?></font>!详细信息如下:</caption>
                      <thead>
                        <tr bgcolor="#FFEDBF">
                          <th height="35" align="center">商品名称</th>
                          <th height="35" align="center">数量</th>
                          <th height="35" align="center">市场价</th>
                          <th height="35" align="center">会员价</th>
                          <th height="35" align="center">小计</th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php  
					  $total=0; 
					  for($i=0; $i<count($arraysp)-1; $i++){
						 if($arraysp[$i]!=""){
						 $sql1=mysql_query("select * from shangpin where id='".$arraysp[$i]."'",$conn); 
						 $info1=mysql_fetch_array($sql1); 
						 $total=$total+=$arraysl[$i]*$info1['huiyuanjia']; 
					  ?>
                      	<tr>
                          <td height="35"><?php   echo $info1['mingcheng']; ?></td>
                          <td height="35"><?php   echo $arraysl[$i]; ?></td>
                          <td height="35"><?php   echo $info1['shichangjia']; ?>元</td>
                          <td height="35"><?php   echo $info1['huiyuanjia']; ?>元</td>
                          <td height="35"><?php   echo $arraysl[$i]*$info1['huiyuanjia']; ?>元</td>
                        </tr>
                     <?php  
						  }
						 }
					 ?>
                      </tbody>
                     <tbody>
                      	<tr>
                          <td align="center" colspan="5">总计：<?php   echo $total; ?>元</td>
                        </td>
                       </tr>
                      </tbody>
                    </table>
                    <div class="height1"></div>
                    <table class="table table-bordered">
                      <tbody>
                      	<tr>
                          <td height="35">下单人</td>
                          <td height="35"><?php   echo $_SESSION['username']; ?></td>
                        </tr>
                        <tr>
                          <td height="35">收货人</td>
                          <td height="35"><?php   echo $info2['shouhuoren']; ?></td>
                        </tr>
                        <tr>
                          <td height="35">收货人地址</td>
                          <td height="35"><?php   echo $info2['dizhi']; ?></td>
                        </tr>
                        <tr>
                          <td height="35">手机号</td>
                          <td height="35"><?php   echo $info2['tel']; ?></td>
                        </tr>
                        <tr>
                          <td height="35">E-mail</td>
                          <td height="35"><?php   echo $info2['email']; ?></td>
                        </tr>
                     	
                        <tr>
                          <td height="35">支付方式</td>
                          <td height="35"><?php   echo $info2['zfff']; ?></td>
                        </tr>
                      </tbody>
                     <tbody>
                      	<tr>
                          <td align="center" colspan="5">创建时间：<?php   echo $info2['time']; ?></td>
                        </td>
                       </tr>
                       <?php  
					   $_SESSION['producelist']=""; 
						$_SESSION['quatity']=""; 
					    ?>
                       <tr>
                          <td align="center" colspan="5"><a href="?act=zhifu&dingdanhao=<?=$dingdanhao?>" class="details"><button type="button" class="btn btn-danger">点击支付</button></a></td>
                        </td>
                       </tr>
                      </tbody>
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