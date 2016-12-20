<html>
<?php
	
	$password="";		
	$conn= new mysqli("localhost","root",$password,"test");
	if($conn->connect_error)
	{
		die("连接失败:".$conn->connect_error);
	}
	$wh=$_GET['id']; 
	mysqli_query($conn,"DELETE FROM c WHERE id='$wh'");
	echo"删除成功";
	mysqli_close($conn);	
	echo"<script>location.href='action.php';</script>";	
?>
</html>
