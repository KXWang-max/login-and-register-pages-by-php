<html>
<body>
<?php
	
	$id=$_COOKIE["name"];
	$chat=$_POST['content'];
	$password="";	
	$conn= new mysqli("localhost","root",$password,"test");
	if($conn->connect_error)
	{
		die("连接失败:".$conn->connect_error);
	}
	$sql="CREATE  TABLE c
		(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(20) NOT NULL,
			chat VARCHAR(100) NOT NULL,
			reg_date TIMESTAMP
		)";
	$sql="INSERT INTO c VALUES('$id','$chat')";
?>
<?php
		if ($conn->query($sql) === TRUE)
		{
			echo"</br><script>alert('成功');</script>";
			echo"<script>location.href='liao.html';</script>";
			
		} 
		else 
		{
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	$conn->close();
?>
</body>
</html>