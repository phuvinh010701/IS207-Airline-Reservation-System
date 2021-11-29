<?php
	session_start();
?>
<html>
	<head>
		<title>Delete Flight Schedule Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Delete']))
			{
				$flight_no=trim($_POST['flight_no']);
				$departure_date=trim($_POST['departure_date']);
				
				require_once('Database Connection file/mysqli_connect.php');
				$query="DELETE FROM CHUYENBAY WHERE MACHUYENBAY=? AND NGAYBAY=?";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"ss",$flight_no,$departure_date);
				mysqli_stmt_execute($stmt);
				$affected_rows=mysqli_stmt_affected_rows($stmt);
				
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				
				if($affected_rows==1)
				{
	
					header("location: delete_flight_details.php?msg=success");
				}
				else
				{
					header("location: delete_flight_details.php?msg=failed");
				}
			}
			else
			{
				echo "Delete request not received";
			}
		?>
	</body>
</html>