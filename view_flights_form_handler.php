<?php
	session_start();
?>
<html>
	<head>
		<title>
			Xem các chuyến bay
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
    			margin-left: 250px;
			}
			table {
			 border-collapse: collapse; 
			}
			tr{
			 border: solid thin;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="styles.css"></link>
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
			<a class="fa fa-sign-out" aria-hidden="true" href="index.html"> Đăng xuất</a>
    		</div>
		</div>
		<br>
		<h2>Các chuyến bay hiện có</h2>
		<?php
			if(isset($_POST['Search']))
			{
				$data_missing=array();
				if(empty($_POST['origin']))
				{
					$data_missing[]='Nơi bay';
				}
				else
				{
					$origin=$_POST['origin'];
				}
				if(empty($_POST['destination']))
				{
					$data_missing[]='Nơi đến';
				}
				else
				{
					$destination=$_POST['destination'];
				}

				if(empty($_POST['dep_date']))
				{
					$data_missing[]='Ngày bay';
				}
				else
				{
					$dep_date=trim($_POST['dep_date']);
				}
				if(empty($_POST['no_of_pass']))
				{
					$data_missing[]='Số lượng hành khách';
				}
				else
				{
					$no_of_pass=trim($_POST['no_of_pass']);
				}

				if(empty($_POST['class']))
				{
					$data_missing[]='Loại ghế';
				}
				else
				{
					$class=trim($_POST['class']);
				}

				if(empty($data_missing))
				{
					$_SESSION['no_of_pass']=$no_of_pass;
					$_SESSION['class']=$class;
					$count=1;
					$_SESSION['count']=$count;
					$_SESSION['journey_date']=$dep_date;
					require_once('Database Connection file/mysqli_connect.php');
					if($class=="economy")
					{
						$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_economy FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_economy>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_economy);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3>Không có chuyến bay vào ngày này!</h3>";
							echo "<a> <button onclick=\"location.href='book_tickets.php'\" type=\"button\">Chọn chuyến bay khác</button> </a>";						}
						else
						{
							echo "<div class =\"col-md-6 col-md-offset-3 \">";
							echo "<form action=\"book_tickets2.php\" method=\"post\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr><th>Mã chuyến bay &nbsp;</th>
							<th>Nơi đi &nbsp;</th>
							<th>Nơi đến &nbsp;</th>
							<th>Ngày bay &nbsp;  &nbsp;</th>
							<th>Giờ bay &nbsp;</th>
							<th>Ngày đến &nbsp;  &nbsp;</th>
							<th>Giờ đến &nbsp;</th>
							<th>Giá tiền &nbsp;</th>
							<th>Chọn &nbsp;</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
        						echo "<tr>
        						<td>".$flight_no."</td>
        						<td>".$from_city."</td>
								<td>".$to_city."</td>
								<td>".$departure_date."</td>
								<td>".$departure_time."</td>
								<td>".$arrival_date."</td>
								<td>".$arrival_time."</td>
								<td>&#x20b9; ".$price_economy."</td>
								<center>
								<td><input type=\"radio\" name=\"select_flight\" value=\"".$flight_no."\"></td>
								</center>
        						</tr>";
    						}
    						echo "</table> <br>";
							
    						echo "<input type=\"submit\" value=\"Chọn chuyến bay\" name=\"Select\">";
    						echo "</form>";
							echo "</div>";
    					}
					}
					else if($class="business")
					{
						$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_business FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_business>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_business);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3>Không có chuyến bay vào ngày này!</h3>";
							echo "<a> <button onclick=\"location.href='book_tickets.php'\" type=\"button\">Chọn chuyến bay khác</button> </a>";						}
						else
						{
							echo "<div class =\"col-md-6 col-md-offset-3 \">";
							echo "<form action=\"book_tickets2.php\" method=\"post\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr><th>Mã chuyến bay &nbsp;</th>
							<th>Nơi đi &nbsp;</th>
							<th>Nơi đến &nbsp;</th>
							<th>Ngày bay &nbsp;  &nbsp;</th>
							<th>Giờ bay &nbsp;</th>
							<th>Ngày đến &nbsp;  &nbsp;</th>
							<th>Giờ đến &nbsp;</th>
							<th>Giá tiền &nbsp;</th>
							<th>Chọn &nbsp;</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
        						echo "<tr>
        						<td>".$flight_no."</td>
        						<td>".$from_city."</td>
								<td>".$to_city."</td>
								<td>".$departure_date."</td>
								<td>".$departure_time."</td>
								<td>".$arrival_date."</td>
								<td>".$arrival_time."</td>
								<td>&#x20b9; ".$price_business."</td>
								<td><input type=\"radio\" name=\"select_flight\" value=".$flight_no."></td>
        						</tr>";
    						}
    						echo "</table> <br>";
    						echo "<input type=\"submit\" value=\"Chọn chuyến bay\" name=\"Select\">";
    						echo "</form>";
    					}
					}	
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
				}
				else
				{
					echo "Thông tin không hợp lệ <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
					echo "<a> <button onclick=\"location.href='book_tickets.php'\" type=\"button\">Chọn chuyến bay khác</button> </a>";
				}
			}
			else
			{
				echo "Search request not received";
			}
		?>
		
	</body>
</html>