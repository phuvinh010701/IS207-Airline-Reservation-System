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
			<a class="fa fa-home" aria-hidden="true" href="customer_homepage.php" style="background-color: #04AA6D;"> Cá nhân</a>
			<a class="fa fa-money" aria-hidden="true" href="index.html"> Khuyến mãi</a>
			<a class="fa fa-phone" aria-hidden="true" href="index.html"> Liên hệ</a>
			<a class="fa fa-sign-out" aria-hidden="true" href="logout_handler.php"> Đăng xuất </a>
    		</div>
		</div>
		<br>
		<?php
			echo "<h2>Chào bạn " .$_SESSION['login_user'].", chúng tôi có thể giúp gì cho bạn? </h2>";
		?>
		<table cellpadding="5" style="font-size: 30px">
			<tr>
				<td class="admin_func"><a href="book_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Đặt vé máy bay</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="view_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Xem các vé máy bay đã đặt</a>
				</td>
			</tr>
<tr>
				<td class="admin_func"><a href="pnr.php"><i class="fa fa-plane" aria-hidden="true"></i> In vé máy bay</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="cancel_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Hủy chuyến</a>
				</td>
			</tr>
		</table>
	</body>
</html>