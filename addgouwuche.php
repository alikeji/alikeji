<?php  
session_start(); 
include_once("conn/conn.php"); 
$id = !empty($_GET['id']) ? intval($_GET['id']) : ''; 
$sql=mysql_query("select * from shangpin where id='".$id."'",$conn);  
$info=mysql_fetch_array($sql); 
if($info['shuliang']<=0){
   echo "<script>alert('该商品已经售完!'); history.back(); </script>"; 
   exit; 
 }
  $array=explode("@",$_SESSION['producelist']); 
  for($i=0; $i<count($array)-1; $i++){
	 if($array[$i]==$id){
	     echo "<script>alert('该商品已经在您的购物车中!'); history.back(); </script>"; 
		 exit; 
	  }
	}
  $_SESSION['producelist']=$_SESSION['producelist'].$id."@"; 
  $_SESSION['quatity']=$_SESSION['quatity']."1@"; 
  header("location:gouwu1.php"); 
?>