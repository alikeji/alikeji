<?php  
include("sessionuser.php"); 
include_once("top.php"); 
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> 首页</a></li>
				<li>我的订单</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
                    <table class="table table-bordered">
                      <caption>我的订单</caption>
                      <?php  
						  $username=$_SESSION['username']; 
						  $sql=mysql_query("select * from dingdan where xiadanren='".$username."'",$conn); 
						  $info=mysql_fetch_array($sql); 
						  if($info==false)
						   {
							  echo "<div algin='center'>对不起,没有查找到该订单!</div>";     
						   }
						   else
						   {
					  ?>
                      <thead>
                        <tr bgcolor="#FFEDBF">
                          <th height="35" align="center">订单号</th>
                          <th height="35" align="center">时间</th>
                          <th height="35" align="center">订货人</th>
                          <th height="35" align="center">金额总计</th>
                          <th height="35" align="center">付款方式</th>
                       
                          <th height="35" align="center">订单状态</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php  
						  do
						  {
						?>
                      	<tr>
                          <td height="35"><a href="orderlook.php?dd=<?php   echo $info['dingdanhao']; ?>"><?php   echo $info['dingdanhao']; ?></a></td>
                          <td height="35"><?php   echo $info['time']; ?></td>
                          <td height="35"><?php   echo $info['shouhuoren']; ?></td>
                          <td height="35"><?php   echo $info['total']; ?></td>
                          <td height="35"><?php   echo $info['zfff']; ?></td>
                         
                          <td height="35"><?php   echo $info['zt']; ?></td>
                        </tr>
                      <?php  
						   }while($info=mysql_fetch_array($sql)); 
						?>
                      </tbody>
                     <?php  
						 }
						?>
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