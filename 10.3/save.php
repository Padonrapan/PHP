<?php
//检查数据是否发送到服务器端
//var_dump($_POST);

//引入外部php
include("input_class.php");
$input=new input();

//连接到数据库
include("db.php");	


$msg=$input->post("msg");
$user=$input->post("user");


if($msg==""){
	echo "留言内容不能为空";
	exit;
}
if($user==""){
	echo "用户名不能为空";
	exit;
}
$mysqli->query("SET NAMES UTF8");//防止乱码

$t=time();
$sql="INSERT INTO msg (`username`,`content`,`intime`) values ('{$user}','{$msg}','$t')";
$is=$mysqli->query($sql);
if($is){
	header("Location:test.php");
}else{
	echo "插入失败";
}

	/*
		if($msg=="" or $user ==""){
				echo "留言内容和用户名不能为空";
				exit;
			}
	*/
	/*
	post();
	function post(){
		global $user;
		echo $user;
	}
	*/

?>