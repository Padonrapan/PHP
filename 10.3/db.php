<?php
//连接到数据库
$mysqli=new mysqli("localhost","root","","php10.3");
if($mysqli->connect_errno>0){
	echo "连接错误";
	echo $mysqli->connect_error;
	exit;
}


/*
$mysqli=new mysqli("localhost","root","","php10.3");
if($mysqli->connect_errno>0){
	echo "连接错误";
	echo $mysqli->connect_error;
	exit;
}
$sql="INSERT INTO msg (`username`,`content`,`intime`) VALUES ('a','b','c')";
$is=$mysqli->query($sql);

if($is==true){
	echo "ok";
}else{
	echo "no";
}
*/
?>