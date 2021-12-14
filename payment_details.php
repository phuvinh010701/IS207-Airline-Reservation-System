<?php
	session_start();
?>
<html>
	<head>
		<title>
			Thanh toán hóa đơn
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
    			margin: 0px 357px
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
		<form action="payment_details_form_handler.php" method="post">
			<h2>Hóa đơn</h2>
			<h3 style="margin-left: 30px"><u>Chi tiết hóa đơn</u></h3>
			<?php
				$flight_no=$_SESSION['flight_no'];
				$journey_date=$_SESSION['journey_date'];
				$no_of_pass=$_SESSION['no_of_pass'];

				$total_no_of_meals=$_SESSION['total_no_of_meals'];

				$payment_id=rand(100000000,999999999);
				$pnr=$_SESSION['pnr'];
				$_SESSION['payment_id']=$payment_id;
				$payment_date=date('Y-m-d'); 
				$_SESSION['payment_date']=$payment_date;

				$ticket_price = 0;
				require_once('Database Connection file/mysqli_connect.php');
				if($_SESSION['class']=='economy')
				{	
					$query="SELECT GIAVEL1 FROM CHUYENBAY where MACHUYENBAY=? and NGAYBAY=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				}
				else if($_SESSION['class']=='business')
				{
					$query="SELECT GIAVEL2 FROM CHUYENBAY where MACHUYENBAY=? and NGAYBAY=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				}
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				$total_ticket_price=$no_of_pass*$ticket_price;
				$total_meal_price=25000*$total_no_of_meals;
				if($_SESSION['insurance']=='yes')
				{
					$total_insurance_fee=30000*$no_of_pass;
				}
				else
				{
					$total_insurance_fee=0;
				}
				if($_SESSION['priority_checkin']=='yes')
				{
					$total_priority_checkin_fee=20000*$no_of_pass;
				}
				else
				{
					$total_priority_checkin_fee=0;
				}
				if($_SESSION['lounge_access']=='yes')
				{
					$total_lounge_access_fee=30000*$no_of_pass;
				}
				else
				{
					$total_lounge_access_fee=0;
				}
				$total_discount=0;
				$total_amount=$total_ticket_price+$total_meal_price+$total_insurance_fee+$total_priority_checkin_fee+$total_lounge_access_fee+$total_discount;
				$_SESSION['total_amount']=$total_amount;

				echo "<table cellpadding=\"5\"	style='margin-left: 50px'>";
				echo "<tr>";
				echo "<td class=\"fix_table\">Giá vé cơ bản:</td>";
				echo "<td class=\"fix_table\">".$total_ticket_price." VND</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=\"fix_table\">Thức ăn:</td>";
				echo "<td class=\"fix_table\">".$total_meal_price." VND</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=\"fix_table\">Phí ưu tiên Checkin:</td>";
				echo "<td class=\"fix_table\">".$total_priority_checkin_fee." VND</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=\"fix_table\">Phí dùng phòng chờ:</td>";
				echo "<td class=\"fix_table\">".$total_lounge_access_fee." VND</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=\"fix_table\">Phí bảo hiểm:</td>";
				echo "<td class=\"fix_table\">".$total_insurance_fee." VND</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=\"fix_table\">Giảm giá:</td>";
				echo "<td class=\"fix_table\">".$total_discount." VND</td>";
				echo "</tr>";

				echo "</table>";

				echo "<hr style='margin-right:900px; margin-left: 50px'>";
				echo "<table cellpadding=\"5\" style='margin-left: 50px'>";
				echo "<tr>";
				echo "<td class=\"fix_table\"><strong>Tổng cộng:</strong></td>";
				echo "<td class=\"fix_table\">".$total_amount." VND</td>";
				echo "</tr>";
				echo "</table>";
				echo "<hr style='margin-right:900px; margin-left: 50px'>";
				echo "<br>";
			
				echo "<br>";
			?>
			<table cellpadding="5" style='margin-left: 50px'>
				<tr>
					<td class="fix_table"><strong>Chọn phương thức thanh toán:</strong></td>
				</tr>
				<tr>
					<td class="fix_table"><i class="fa fa-credit-card" aria-hidden="true"></i> Thẻ tín dụng <input type="radio" name="payment_mode" value="credit card" checked></td>
					<td class="fix_table"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Thẻ nội địa <input type="radio" name="payment_mode" value="debit card"></td>
					<td class="fix_table"><i class="fa fa-desktop" aria-hidden="true"></i> Ví điện tử <input type="radio" name="payment_mode" value="net banking"></td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Thanh toán" name="Pay_Now">
		</form>
	</body>
</html>