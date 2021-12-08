<?php
	session_start();
?>
<html>
	<head>
		<title>
			Hủy vé
		</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Cancel_Ticket']))
			{
				
					$pnr=trim($_POST['pnr']);

					require_once('Database Connection file/mysqli_connect.php');

					$todays_date=date('Y-m-d'); 
					$customer_id=$_SESSION['login_user'];

					$query="SELECT count(*) from CHITIETHOADON t WHERE pnr=? and NGAYBAY>=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$pnr,$todays_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$cnt);
					mysqli_stmt_fetch($stmt);
					mysqli_stmt_close($stmt);
					if($cnt!=1)
					{
						mysqli_close($dbc);
						header("location: cancel_booked_tickets.php?msg=failed");
					}
					$query="UPDATE CHITIETHOADON SET TRANGTHAI='HUY VE' WHERE pnr=? and MAKHACHHANG=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$pnr,$customer_id);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					mysqli_stmt_close($stmt);
					if($affected_rows==1)
					{
						$query="SELECT t.MACHUYENBAY,t.NGAYBAY,t.SOLUONGHANHKHACH,t.LOAIGHE,0.85*p.SOTIEN as refund_amount from CHITIETHOADON t,HOADON p WHERE t.pnr=? and t.pnr=p.pnr";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"s",$pnr);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$flight_no,$journey_date,$no_of_pass,$class,$refund_amount);
						mysqli_stmt_fetch($stmt);
						mysqli_stmt_close($stmt);
						$_SESSION['refund_amount']=$refund_amount;
						if($class=='economy')
						{
							$query="UPDATE CHUYENBAY SET SOGHEL1=SOGHEL1+? WHERE MACHUYENBAY=? AND NGAYBAY=?";
							$stmt=mysqli_prepare($dbc,$query);
							mysqli_stmt_bind_param($stmt,"iss",$no_of_pass,$flight_no,$journey_date);
							mysqli_stmt_execute($stmt);
							$affected_rows_1=mysqli_stmt_affected_rows($stmt);
							echo $affected_rows_1.'<br>';
							mysqli_stmt_close($stmt);
						}
						else if($class=='business')
						{
							$query="UPDATE CHUYENBAY SET SOGHEL2=SOGHEL2+? WHERE MACHUYENBAY=? AND NGAYBAY=?";
							$stmt=mysqli_prepare($dbc,$query);
							mysqli_stmt_bind_param($stmt,"iss",$no_of_pass,$flight_no,$journey_date);
							mysqli_stmt_execute($stmt);
							$affected_rows_1=mysqli_stmt_affected_rows($stmt);
							echo $affected_rows_1.'<br>';
							mysqli_stmt_close($stmt);
						}
						if($affected_rows_1==1)
						{

							header("location: cancel_booked_tickets_success.php");
						}
						else
						{
							echo "Submit Error";
							echo mysqli_error();
						}
					}
					else
					{
						echo "Submit Error";
						echo mysqli_error();
						header("location: cancel_booked_tickets.php?msg=failed");
					}
					mysqli_close($dbc);
				}

			else
			{
				echo "Cancel request not received";
			}
		?>
	</body>
</html>