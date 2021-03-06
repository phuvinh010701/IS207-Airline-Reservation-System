<html>
	<head>
		<title>Xử lý đăng nhập</title>
	</head>
	<body>
		<?php
			session_start();
			session_destroy();
			session_start();
			if(isset($_POST['Login']))
			{
				$user_type = $_POST['user_type'];
				$user_name=$_POST['username'];
				$pass_word=$_POST['password'];
				$_SESSION['user_type'] = $user_type;
				if($user_type=='Customer')
				{
					require_once('Database Connection file/mysqli_connect.php');
					$query="SELECT count(*) FROM KHACHHANG where MAKHACHHANG=? and PWD=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$user_name,$pass_word);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$cnt);
					mysqli_stmt_fetch($stmt);
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					
					if($cnt==1)
					{
						$_SESSION['login_user']=$user_name;
						header("location: customer_homepage.php");
					}
					else
					{
						session_destroy();
						header('location:login_page.php?msg=failed');
					}
				}
				else if($user_type=='Administrator')
				{
					require_once('Database Connection file/mysqli_connect.php');
					$query="SELECT count(*) FROM NHANVIEN where MANHANVIEN=? and PWD=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$user_name,$pass_word);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$cnt);
					mysqli_stmt_fetch($stmt);
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					
					if($cnt==1)
					{
						$_SESSION['login_user']=$user_name;
						header('location:admin_homepage.php');
					}
					else
					{
						session_destroy();
						header('location:login_page.php?msg=failed');
					}
				}
			}
		?>
	</body>
</html>