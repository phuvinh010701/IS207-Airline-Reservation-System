<?php
	session_start();
?>
<html>
	<head>
		<title>
			Đăng nhập
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 60px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="styles.css"></link>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	</head>
	<body style="background: url('images/1.jpg'); ">
		<img class="logo" src="images/my-logo.png"/> 
		<h1 id="title">
			Phòng vé Đà Lạt PV	</h1>
		<div>
		<div class="topnav">
			<div class="col-md-7">
			<a class="fa fa-home" aria-hidden="true" href="index.html" style="background-color: #04AA6D;"> Trang chính</a>
			<a class="fa fa-ticket" aria-hidden="true" href="login_page.php"> Đặt vé</a>
			<a class="fa fa-home" aria-hidden="true" href="index.html"> Khuyến mãi</a>
			<a class="fa fa-sign-in" aria-hidden="true" href="login_page.php"> Đăng nhập</a>
			<a class="fa fa-user-plus" aria-hidden="true" href="new_user.php"> Đăng ký</a>
			<a class="fa fa-phone" aria-hidden="true" href="index.html"> Liên hệ</a>
    		</div>
		</div>
		<br>
		<br>
		<br>
		<div class="col-md-4 col-md-offset-4">
		<form class="float_form" action="login_handler.php" method="POST" style="text-align: center;">
			<fieldset>
				<legend>Đăng nhập:</legend>
				<strong>Tài khoản:</strong><br>
				<input type="text" name="username" placeholder="Nhập tên tài khoản" required><br><br>
				<strong>Mật khẩu:</strong><br>
				<input type="password" name="password" placeholder="Nhập mật khẩu" required><br><br>
				<strong>Loại đăng nhập:</strong><br>
				Khách hàng <input type='radio' name='user_type' value='Customer' checked/> Nhân viên <input type='radio' name='user_type' value='Administrator'/>
				<br>
				<?php
					if(isset($_GET['msg']) && $_GET['msg']=='failed')
					{
						echo "
						<strong style='color:red'>Sai tên đăng nhập hoặc mật khẩu</strong>
						";
					}
				?>
				<br>
				
				<input type="submit" name="Login" value="Đăng nhập">
			</fieldset>
			<br>
			<a href="new_user.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng ký tài khoản mới</a>
		</form>
		</div>
	</body>
</html>