		<div class="col-md-3 sm-hidden">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> 会员中心</div>
                <?php   if(isset($_SESSION['username']))
				{
				?>
				<div class="list-group">
					<a href="usercenter.php" class="list-group-item">资料修改</a>
					<a href="changeuserpwd.php" class="list-group-item">修改密码</a>
                    <a href="orders.php" class="list-group-item">我的订单</a>
                    <a href="logout.php" class="list-group-item">退出登录</a>
                    <a href="gouwu1.php" class="list-group-item">我的购物车</a>
				</div>
                <?php  
				}
				else
				{
				?>
                <div class="panel-body">
                <div class="height1"></div>
                <script language="javascript">
				function check1(){
					if(document.form2.usernc.value==""){
						alert("请输入帐号"); 
						return false; 
						}
					if(document.form2.p1.value==""){
						alert("请输入密码"); 
						return false; 
					}
				}
				</script>
                <form class="form-horizontal" method="post" role="form" name="form2" action="login.php?act=login" onSubmit="return check1(); ">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="请输入您的用户名">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p1" id="p1" placeholder="请输入密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">登录</button> <a href="reg.php"><button type="button" class="btn btn-link">注册</button></a>
                        </div>
                    </div>
                </form></div>
                <?php   } ?>
			</div>
			<div class="panel panel-default">
				<div class="search">
						<form action="shops.php" method="get">
							<input name="keywords" type="search" placeholder="本类商品搜索" required />
                            <input type="hidden" value="<?php   if(isset($typeid)){echo $typeid; } ?>" name="id">
							<input type="submit" value=" ">
						</form>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> 商品分类</div>
				<div class="list-group">
					<?php  
                      $sql=mysql_query("select * from fenlei order by id desc",$conn); 
					  while($row=mysql_fetch_array($sql))
                        {
                	?>
					<a href="shops.php?id=<?=$row['id']?>" class="list-group-item"><?=$row['fenleiname']?></a>
					<?php  
                        }
                    ?>
				</div>
			</div>
		</div>