<html>
	<head>
		<title>Thêm người dùng</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Submit']))
			{
				$user_name=trim($_POST['username']);
				$password=$_POST['password'];
				$email_id=trim($_POST['email']);
				$name=$_POST['name'];
				$phone_no=trim($_POST['phone_no']);
				$address=$_POST['address'];
				
				
				require_once('Database Connection file/mysqli_connect.php');
				$query="INSERT INTO KHACHHANG (MAKHACHHANG,PWD,HOTEN,EMAIL,SDT,DIACHI) VALUES (?,?,?,?,?,?)";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"ssssss",$user_name,$password,$name,$email_id,$phone_no,$address);
				mysqli_stmt_execute($stmt);
				$affected_rows=mysqli_stmt_affected_rows($stmt);
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				
				if($affected_rows==1)
				{
					header('location:user_reg_success.php');
				}
				else
				{
					header('location:new_user.php?msg=failed');
					
				}
			
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>