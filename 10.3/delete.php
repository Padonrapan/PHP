<?php
	//启用session
	session_start();

	if(isset($_SESSION['username'])==false){
		echo "需要管理员登录";
		exit;
	}

	//引入外部php
	include("input_class.php");
	$input=new input();

	//连接到数据库
	include("db.php");

	$id=$input->get('id');
	$sql="DELETE FROM msg WHERE id='{$id}'";
	$is=$mysqli->query($sql);
	if($is==true){
		header("Location:test.php");
	}else{
		echo "删除失败";
	}

?>