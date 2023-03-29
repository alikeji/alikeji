<?php  
if(!session_id())
{
	session_start(); 
}
include("conn/conn.php"); 
?>
<!DOCTYPE html>
<html>
<head>
<title><?php   echo $title; ?></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href="css/body.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/head.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html;  charset=utf-8" />
<script>
$(function() {
	var pull= $('#pull'); 
		menu = $('nav ul'); 
		menuHeight	= menu.height(); 
	$(pull).on('click', function(e) {
		e.preventDefault(); 
		menu.slideToggle(); 
	}); 
	$(window).resize(function(){
		var w = $(window).width(); 
		if(w > 320 && menu.is(':hidden')) {
			menu.removeAttr('style'); 
		}
	}); 
}); 
</script>
</head>
<body>
<div class="top-bar">
		<div class="container">
			<div class="logo"><a href=""><img src="images/logo.png" title="logo" /></a></div>
			<div class="header-right">
				<a href="gouwu1.php"><img src="images/gouwuche.jpg" title="" /></a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<div id="home" class="header">
	<div class="container">
		<div style="float: left; "><img src="images/index.png" title="" /></div>
		<nav class="topnav">
			<ul class="topnav">
				<li class="active"><a href="index.php">网站首页</a></li>
				<li><a href="shops.php">商品中心</a></li>
                <li><a href="paiming.php">销售排名</a></li>
				<li><a href="news.php">商城公告</a></li>
                <li><a href="gouwu1.php">我的购物车</a></li>
				<?php  
                	if(isset($_SESSION["username"])){?><li><a href="usercenter.php">会员中心</a></li><li><a href="logout.php">注销</a><?php   } else{?><li><a href="reg.php">注册</a></li><li><a href="login.php">登录</a></li>
				<?php   }?>
				<li style="text-align:center; "><div class="search">
						<form name="form2" action="search.php" method="get">
							<input type="search" placeholder="请输入产品名称" required  name="keywords"/>
							<input type="submit" value=" ">
						</form>
				</div>
				 <li><a href="admin/index.php">后台管理</a></li>
					<div class="clearfix"></div></li>
			</ul>
			<a href="" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
		</nav>
		<div class="clearfix"> </div>
	</div>
</div>