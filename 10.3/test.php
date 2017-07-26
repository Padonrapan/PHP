<?php
session_start();
include("db.php");
$mysqli->query("SET NAMES UTF8");//防止乱码

$sql="SELECT *FROM msg ORDER BY id DESC";
$mysqli_result=$mysqli->query($sql);
$rows=array();
while($row=$mysqli_result->fetch_array(MYSQLI_ASSOC)){
	//$row=$mysqli_result->fetch_array(MYSQLI_ASSOC);//每次只能取得一条数据
	$rows[]=$row;
}
//var_dump($rows);

?>

<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <link style="text/css" rel="stylesheet" href="style.css"/> 
  <title>留言板</title>
 </head>
 <body>
	<div class="add">
		<form action="save.php" method="post">
			<textarea name="msg">留言内容</textarea>
			<input type="text" name="user" class="user"/>
			<input type="submit" class="btn" value="发表"/>
			<a href="login.php" class="btn">登录</>
		</form>
	</div>

	<div class="msg">
	<?php
		foreach($rows as $row){
			$t=date("Y-m-d H:i:s",$row['intime']);
	?>
		<div class="item">
			<span class="user"><?php echo $row['username'];?></span>
			<span class="time">
				<?php echo $t;?>

				<?php if(isset($_SESSION['username'])){?>				
					<a onclick="return confirm('确认删除吗?')" href="delete.php?id=<?php echo $row['id']; ?>">删除</a>
				<?php } ?>

			</span>
			<div style="clear:both"></div>
			<p>
			<?php echo $row['content'];?>
			</p>
		</div>
	<?php 
		}
	?>

	</div>
 </body>
</html>
