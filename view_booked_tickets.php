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
    			margin: 0px 390px
			}
			table {
			 border-collapse: collapse; 
			 margin-left: 10%;
			 margin-right: 10%;
			}
			tr/*:nth-child(3)*/ {
			 border: solid thin;
			}
			.set_nice_size{
				font-size: 17pt;
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
			<a class="fa fa-home" aria-hidden="true" href="customer_homepage.php" style="background-color: #04AA6D;"> Cá nhân</a>
			<a class="fa fa-money" aria-hidden="true" href="index.html"> Khuyến mãi</a>
			<a class="fa fa-phone" aria-hidden="true" href="index.html"> Liên hệ</a>
			<a class="fa fa-sign-out" aria-hidden="true" href="index.html"> Đăng xuất</a>
    		</div>
		</div>
		<br>
		<h2>Xem các vé đã đặt</h2>
		<?php
			$todays_date=date('Y-m-d');
			$thirty_days_before_date=date_create(date('Y-m-d'));
			date_sub($thirty_days_before_date,date_interval_create_from_date_string("30 days")); 
			$thirty_days_before_date=date_format($thirty_days_before_date,"Y-m-d");
			
			$customer_id=$_SESSION['login_user'];
			require_once('Database Connection file/mysqli_connect.php');
			$query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY  journey_date";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"ss",$customer_id,$todays_date);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt,$pnr,$date_of_reservation,$flight_no,$journey_date,$class,$booking_status,$no_of_passengers,$payment_id);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt)==0)
			{
				echo "<h3><center>Không có chuyến bay</center></h3>";
			}
			else
			{	
				echo "<div class=\" col-md-10 col-md-offset-2 \">";
				echo "<table cellpadding=\"10\"";
				echo "<tr><th>PNR </th>
				<th>Ngày đặt </th>
				<th >Chuyến bay số &nbsp;</th>
				<th>Ngày bay </th>
				<th>Loại ghế </th>
				<th>Trạng thái </th>
				<th>Số lượng hành khách &nbsp;</th>
				<th>ID thanh toán &nbsp;</th>
				</tr>";
				while(mysqli_stmt_fetch($stmt)) {
        			echo "<tr>
        			<td>".$pnr." &nbsp;</td>
        			<td>".$date_of_reservation." &nbsp;</td>
					<td>".$flight_no." &nbsp;</td>
					<td>".$journey_date." &nbsp;</td>
					<td>".$class." &nbsp;</td>
					<td>".$booking_status." &nbsp;</td>
					<td style=\"text-align: center\">".$no_of_passengers." &nbsp;</td>
					<td style=\"text-align: center\">".$payment_id." &nbsp;</td>
        			</tr>";
    			}
    			echo "</table> <br>";
				echo "</div>";
			}
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		?>
	</body>
</html>