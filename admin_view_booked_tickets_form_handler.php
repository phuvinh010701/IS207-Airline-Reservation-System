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
			}
			tr/*:nth-child(3)*/ {
			 border: solid thin;
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
		<h2>Danh sách các vé máy bay đã đặt</h2>
		<?php
			if(isset($_POST['Submit']))
			{
				
				$flight_no=trim($_POST['flight_no']);
			
				$departure_date=$_POST['departure_date'];

				require_once('Database Connection file/mysqli_connect.php');

				$query="SELECT pnr,NGAYDATVE,LOAIGHE,SOLUONGHANHKHACH,MAHOADON,MAKHACHHANG FROM CHITIETHOADON where MACHUYENBAY=? and NGAYBAY=? and TRANGTHAI=\"DA THANH TOAN\"";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"ss",$flight_no,$departure_date);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt,$pnr,$date_of_reservation,$class,$no_of_passengers,$payment_id,$customer_id);
				mysqli_stmt_store_result($stmt);

				if(mysqli_stmt_num_rows($stmt)==0)
				{
					echo "<h3>Không có thông tin vé máy bay nào được đặt!</h3>";
				}
				else
				{
					echo "<div class=\"col-md-6 col-md-offset-4\">";
					echo "<table cellpadding=\"10\" style=\"text-align: center\"";
					echo "<tr><th>PNR</th>
					<th>Ngày đặt</th>
					<th>Loại ghế &nbsp;</th>
					<th>Số hành khách &nbsp;</th>
					<th>Mã thanh toán &nbsp;</th>
					<th>Mã khách hàng &nbsp;</th>
					</tr>";
					while(mysqli_stmt_fetch($stmt)) {
						echo "<tr>
						<td>".$pnr." &nbsp;</td>
						<td>".$date_of_reservation." &nbsp;</td>
						<td>".$class." &nbsp;</td>
						<td>".$no_of_passengers." &nbsp;</td>
						<td>".$payment_id." &nbsp;</td>
						<td>".$customer_id." &nbsp;</td>
						</tr>";
					}
					echo "</div>";
					
				}
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				
			}
				
		
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>