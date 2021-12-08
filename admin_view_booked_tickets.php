<?php
	session_start();
?>
<html>
	<head>
		<title>
			Xem các vé đã đặt
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
    			margin: 0% 15.8%
			}
			input[type=date] {
				border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 5.5px 44.5px;
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
		<div class="col-md-7 col-md-offset-4">
		<form action="admin_view_booked_tickets_form_handler.php" method="post">
			<h2>Danh sách các vé đã đặt</h2>
			<div>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Nhập mã chuyến bay</td>
					<td class="fix_table">Nhập ngày bay</td>
				</tr>
				<tr>
					<td class="fix_table">
					<select name="flight_no">
						<?php
							require_once('Database Connection file/mysqli_connect.php');

							$query = "SELECT MACHUYENBAY FROM CHUYENBAY";
							$result = mysqli_query($dbc, $query);
							while ($row = mysqli_fetch_row($result)){
								echo "<option value=\"". $row[0]. "\">";
								echo $row[0] . "</option>";
							}

						?>
					</select>
					</td>
					<td class="fix_table"><input type="date" name="departure_date" required></td>
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