<?php  
if(!session_id())
{
	session_start(); 
}
$username = !empty($_SESSION['username']) ? $_SESSION['username'] : ''; 
if(empty($username)){
echo "<script>alert('请登录后操作!'); top.location='login.php'</script>"; 
exit(); 
}
?>