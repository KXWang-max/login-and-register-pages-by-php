<html>
<?php
	$id=$_POST['name'];
	$pass=md5($_POST['password']);	
	$password = "";	
	$conn = new mysqli("localhost","root",$password,"test");
	if($conn->connect_error)
	{
		$response="错误";
	}
	$sql="SELECT * FROM c
		WHERE name='$id'";
	mysqli_select_db($conn,"test");
	$retval=mysqli_query($conn,$sql);


	if($row=mysqli_fetch_array($retval,MYSQLI_BOTH))	
	{
			if($row['password']==$pass)
			{
				setcookie("name",$id,time()+3600*24*365);
				setcookie("password",$pass,time()+3600*24*365);
				echo"<script>alert('登录成功')</script>";
				echo"<script>location.href='liao.html';</script>";
			}
			else 
			{
				echo"<script>alert('用户名或密码不正确')</script>";
				echo"<script>location.href='login.html';</script>";
			}
	}
		
	else
	{
		echo"<script>alert('用户名或密码不正确')</script>";
		echo"<script>location.href='login.html';</script>";
	}
	$conn->close();
	?>
</html>

