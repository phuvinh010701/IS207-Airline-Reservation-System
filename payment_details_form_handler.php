<?php
	session_start();
?>
<html>
	<head>
		<title>Submit Payment Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Pay_Now']))
			{
				$no_of_pass=$_SESSION['no_of_pass'];
				$flight_no=$_SESSION['flight_no'];
				$journey_date=$_SESSION['journey_date'];
				$class=$_SESSION['class'];
				$pnr=$_SESSION['pnr'];
				$payment_id=$_SESSION['payment_id'];
				$total_amount=$_SESSION['total_amount'];
				$payment_date=$_SESSION['payment_date'];
				$payment_mode=$_POST['payment_mode'];				
				$affected_rows_1 = 0;
				$affected_rows_2 = 0;
				
				require_once('Database Connection file/mysqli_connect.php');
				if($class=='economy')
				{
					$query="UPDATE CHUYENBAY SET SOGHEL1=SOGHEL1-? WHERE MACHUYENBAY=? AND NGAYBAY=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"iss",$no_of_pass,$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					$affected_rows_1=mysqli_stmt_affected_rows($stmt);
					echo $affected_rows_1.'<br>';
					mysqli_stmt_close($stmt);
				}
				else if($class=='business')
				{
					$query="UPDATE CHUYENBAY SET SOGHEL2=SOGHEL2-? WHERE MACHUYENBAY=? AND NGAYBAY=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"iss",$no_of_pass,$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					$affected_rows_1=mysqli_stmt_affected_rows($stmt);
					echo $affected_rows_1.'<br>';
					mysqli_stmt_close($stmt);
				}
				
				if($affected_rows_1==1)
				{
					echo "Thanh toán thành công<br>";

					$query="INSERT INTO HOADON (MAHOADON,pnr,NGAYTHANHTOAN,SOTIEN,PHUONGTHUC) VALUES (?,?,?,?,?)";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"sssis",$payment_id,$pnr,$payment_date,$total_amount,$payment_mode);
					mysqli_stmt_execute($stmt);
					$affected_rows_2=mysqli_stmt_affected_rows($stmt);
					echo $affected_rows_2.'<br>';
					mysqli_stmt_close($stmt);
					if($affected_rows_2==1)
					{
						header('location:ticket_success.php');
					}
					else
					{
						echo mysqli_error();
					}
				}
				
				mysqli_close($dbc);
			}
			else
			{
				echo "Payment request not received";
			}
		?>
	</body>
</html>