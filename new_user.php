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
    			margin: 0px 60px;
				text-align: center;
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
			<a class="fa fa-user-plus" aria-hidden="true" href="new_user.php.html"> Đăng ký</a>
			<a class="fa fa-phone" aria-hidden="true" href="index.html"> Liên hệ</a>
    		</div>
		</div>
		<br>
		<br>
		<br>
		<div class="col-md-4 col-md-offset-4">
		<form class="center_form" action="new_user_form_handler.php" method="POST" id="new_user_from">
			<h2><i class="fa fa-user-plus" aria-hidden="true"></i> TẠO TÀI KHOẢN MỚI</h2>
			<br>
			<?php
					if(isset($_GET['msg']) && $_GET['msg']=='failed')
					{
						echo "
						<strong style='color:red'>Tài khoản này đã tồn tại.</strong>
						";
					}
			?>
			<br>
			<table cellpadding='10'>
				<strong>Thông tin đăng nhập</strong>
				<tr>
					<td>Tên đăng nhập:  </td>
					<td><input type="text" name="username" required><br><br></td>
				</tr>
				<tr>
					<td>Mật khẩu  </td>
					<td><input type="password" name="password" required><br><br></td>
				</tr>
				<tr>
					<td>Nhập email</td>
					<td><input type="text" name="email" required><br><br></td>
				</tr>
			</table>
			<br>
			<table cellpadding='10'>
				<strong>Nhập thông tin cá nhân</strong>
				<tr>
					<td>Họ và tên: </td>
					<td><input type="text" name="name" required><br><br></td>
				</tr>
				<tr>
					<td>Số điện thoại</td>
					<td><input type="text" name="phone_no" required><br><br></td>
				</tr>
				<tr>
					<td>Địa chỉ cá nhân</td>
					<td><input type="text" name="address" required><br><br></td>
				</tr>
			</table>
			<br>
			<center>
			<input type="submit" value="Đồng ý" name="Submit">
			<br>
		</form>
		</div>
	</body>
</html>