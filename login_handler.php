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
				$data_missing=array();
				$_SESSION['user_type'] = $user_type
				if(empty($data_missing))
				{
					if($user_type=='Customer')
					{
						require_once('Database Connection file/mysqli_connect.php');
						$query="SELECT count(*) FROM Customer where customer_id=? and pwd=?";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"ss",$user_name,$pass_word);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$cnt);
						mysqli_stmt_fetch($stmt);
						mysqli_stmt_close($stmt);
						mysqli_close($dbc);
						
						if($cnt==1)
						{
							echo "Logged in <br>";
							$_SESSION['login_user']=$user_name;
							echo $_SESSION['login_user']." is logged in";
							header("location: customer_homepage.php");
						}
						else
						{
							echo "Login Error";
							session_destroy();
							header('location:login_page.php?msg=failed');
						}
					}
					else if($user_type=='Administrator')
					{
						require_once('Database Connection file/mysqli_connect.php');
						$query="SELECT count(*) FROM Admin where admin_id=? and pwd=?";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"ss",$user_name,$pass_word);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$cnt);
						mysqli_stmt_fetch($stmt);
						mysqli_stmt_close($stmt);
						mysqli_close($dbc);
						
						if($cnt==1)
						{
							echo "Logged in <br>";
							$_SESSION['login_user']=$user_name;
							echo $_SESSION['login_user']." is logged in";
							header('location:admin_homepage.php');
						}
						else
						{
							echo "Login Error";
							session_destroy();
							header('location:login_page.php?msg=failed');
						}
					}
				}
				
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>