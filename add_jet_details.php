<?php
	session_start();
?>
<html>
	<head>
		<title>
			Thêm chi tiết máy bay
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
			<a class="fa fa-home" aria-hidden="true" href="admin_homepage.php" style="background-color: #04AA6D;"> Cá nhân</a>
			<a class="fa fa-sign-out" aria-hidden="true" href="index.html"> Đăng xuất</a>
    		</div>
		</div>
		<br>
		<div class="col-md-4 col-md-offset-5">
		<form action="add_jet_details_form_handler.php" method="post">
			<h2>Nhập chi tiết chuyến bay</h2>
			<div>
			<?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color: green'>Thêm chi tiết may bay thành công.</strong>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red'>Mã máy bay đã tồn tại.</strong>";
				}
			?>
			<br>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Mã máy bay</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="text" name="jet_id" required></td>
				</tr>
			</table>
			<br>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Nhập loại máy bay</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="text" name="jet_type" required></td>
				</tr>
			</table>
			<br>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Nhập tổng số ghế</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="number" name="jet_capacity" required></td>
				</tr>
			</table>
			<br>
			<br>
			<input type="submit" value="Đồng ý" name="Submit">
			</div>
		</form>
		</div>
	</body>
</html>