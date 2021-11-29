<?php
	session_start();
?>
<html>
	<head>
		<title>
			Đặt vé thành công
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
    			margin: 0px 127px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styles.css"></link>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	</head>
	<body style="background: url('images/1.jpg'); ">
		<img class="logo" src="images/my-logo.png"/> 
		<h1 id="title">
			Phòng vé Đà Lạt PV	</h1>
		
		<div>
		<div class="topnav">
			<div class="col-md-7">
			<a class="fa fa-home" aria-hidden="true" href="customer_homepage.php" style="background-color: #04AA6D;">Cá nhân</a>
			<a class="fa fa-money" aria-hidden="true" href="index.html">Khuyến mãi</a>
			<a class="fa fa-phone" aria-hidden="true" href="index.html">Liên hệ</a>
			<a class="fa fa-sign-out" aria-hidden="true" href="index.html">Đăng xuất</a>
    		</div>
		</div>
		<br>
		<h2>Bạn đã đặt vé thành công</h2>
		<h3>Phí thanh toán đã nhận &#x20b9; <?php echo $_SESSION['total_amount']; ?><br><br> Mã PNR của bạn là <strong><?php echo $_SESSION['pnr'];?></strong></h3>
		<!--Following data fields were empty!
			...
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
		-->
	</body>
</html>