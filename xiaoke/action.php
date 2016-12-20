<html>
<form  action="shanchu.php" method="GET">
<body>
<h1 style="font-size:40px;font-family:kaiti">发言记录</h1>
<?php	
	$password="";			
	$conn= new mysqli("localhost","root",$password,"test");
	if($conn->connect_error)
	{
		die("连接失败:".$conn->connect_error);
	}
	$sql="SELECT * FROM c ORDER BY id DESC";
	mysqli_select_db($conn,"test");
	$retval=mysqli_query($conn,$sql);
	if(!$retval)
	{
		die('无内容!'.mysqli_error($conn));
		
	}
	while($row=mysqli_fetch_array($retval,MYSQL_BOTH))
	{?>
		<p style="text-align:center">
		<?php
			echo"{$row['id']}".
			"{$row['content']}</br>".
		
			"{$row['reg_date']}".
			"</br>";	
			if($row['name']===$_COOKIE["name"])
			{
				echo '<a href ="/shanchu.php?id='.$row['id'].'">删除</a>';
			}
			echo"</br>";
			?>
			</p>
	    <?php
	}
	echo"</br><a href='liao.html'>返回在线聊天室</a>";
	?>
	</body>
	</form>
	</html>
