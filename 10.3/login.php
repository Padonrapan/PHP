<?php
	//启用session
	session_start();

	//引入外部php
	include("input_class.php");
	$input=new input();

	//连接到数据库
	include("db.php");


	$act=$input->get('act');
	if($act!==false){
		$username=$input->post('username');
		$password=$input->post('password');

		$sql="SELECT * FROM adm WHERE username='{$username}' AND password='{$password}'";
		$mysqli_result=$mysqli->query($sql);

		if($row=$mysqli_result->fetch_array()){
			$_SESSION['username']=$row['username'];
			header("Location:test.php");
		}else{
			echo "登录失败";
			exit;
		}
	}
	

?>


<!doctype html>
<html>
	<head>
		<meta charset='utf-8'/>
		<title>管理员登录</title>
	</head>
	<body>
		<form action='login.php?act=chk' method='post'>
			<input type='text' name='username'/>
			<input type='password' name='password'/>
			<input type='submit' value='登录'/>
		</form>
	</body>

</html>