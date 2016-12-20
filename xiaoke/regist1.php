<?php
	
	$id=$_POST['name'];
	$pass=md5($_POST['password']);
	if(empty($id)||empty($pass))
	{
		echo "<script>alert('用户名和密码不能为空！')</script>";
		echo"<script>location.href='regist.html';</script>";
	}
	else 
	{
		
		$password="";		
		$conn= mysqli_connect("localhost","root",$password,"test");
		if($conn->connect_error)
		{
			die("连接失败:".$conn->conn_error);
		}
		$sql="CREATE TABLE c
		(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(16) NOT NULL,
			password VARCHAR(32) NOT NULL,
			reg_date TIMESTAMP
		)";
		$sql="SELECT * FROM c
		WHERE name='$id'";
		mysqli_select_db($conn,"test");
		$retval=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($retval,MYSQLI_BOTH))	
		{
			if($row['name']==$id)
			{
				echo"<script>alert('该用户名已被占用')</script>";
				echo"<script>location.href='regist.html';</script>";
			}
		}
		else
		{
				$sql="INSERT INTO c(name,password) VALUES('$id','$pass')";
				echo
				"<script>alert('注册成功！')</script>";
				if($conn->query($sql)===TRUE)
				{
						echo"成功!";
						echo
						"<script>location.href='login.html';</script>";
				}
				else
				{
					echo"错误:",$conn->error;
					$conn->close();
				}
		}		
		$conn->close();
		}
	?>