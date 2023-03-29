<?php  
include("conn/conn.php"); 
$nc = !empty($_GET['nc']) ? trim($_GET['nc']) : ''; 
if($nc=="")
	  {
	    echo "请输入用户名!"; 
	  
	  }
	  else
	  {
	    $sql=mysql_query("select * from usermember where name='".$nc."'",$conn);   
	    $info=mysql_fetch_array($sql); 
		if($info==true)
		{
		  echo "对不起,该用户名已被占用!"; 
		}
		else
		{
		   echo "恭喜,该用户名可用!"; 
		} 
	  }
 exit; 	  
?>