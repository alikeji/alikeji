﻿<?php  
session_start(); 
$id=$_GET['id']; 
$arraysp=explode("@",$_SESSION['producelist']); 
$arraysl=explode("@",$_SESSION['quatity']); 
for($i=0; $i<count($arraysp); $i++){
   if($arraysp[$i]==$id){
	  $arraysp[$i]=""; 
	  $arraysl[$i]=""; 
	}
 }
$_SESSION['producelist']=implode("@",$arraysp); 
$_SESSION['quatity']=implode("@",$arraysl); 
header("location:gouwu1.php"); 
?>
