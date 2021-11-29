<?php
	session_start();
?>
<html>
	<head>
		<title>Thêm chi tiết chuyến bay</title>
	</head>
	<body>
	<?php
			if(isset($_POST['Submit']))
			{
			
				$flight_no=trim($_POST['flight_no']);
				$origin=$_POST['origin'];
				$destination=$_POST['destination'];
				$dep_date=$_POST['dep_date'];
				$arr_date=$_POST['arr_date'];
				$dep_time=$_POST['dep_time'];
				$arr_time=$_POST['arr_time'];
				$seats_eco=$_POST['seats_eco'];			
				$seats_bus=$_POST['seats_bus'];			
				$price_eco=$_POST['price_eco'];		
				$price_bus=$_POST['price_bus'];			
				$jet_id=$_POST['jet_id'];		
				
				require_once('Database Connection file/mysqli_connect.php');

				$query="SELECT count(*) FROM CHITIETMAYBAY WHERE MAMAYBAY=? and TRANGTHAI='Yes'";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"s",$jet_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt,$cnt);
				mysqli_stmt_fetch($stmt);
				mysqli_stmt_close($stmt);

				if($cnt==1)
				{
					$query="INSERT INTO CHUYENBAY (MACHUYENBAY,NOIBAY,NOIDEN,NGAYBAY,NGAYDEN,GIOBAY,GIODEN,SOGHEL1,SOGHEL2,GIAVEL1,GIAVEL2,MAMAYBAY) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"sssssssiiiis",$flight_no,$origin,$destination,$dep_date,$arr_date,$dep_time,$arr_time,$seats_eco,$seats_bus,$price_eco,$price_bus,$jet_id);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					mysqli_stmt_close($stmt);
				}
				else
				{
					$affected_rows=0;
				}
				mysqli_close($dbc);
				if($affected_rows==1)
				{
					header("location: add_flight_details.php?msg=success");
				}
				else
				{
					echo mysqli_error();
					header("location: add_flight_details.php?msg=failed");
				}

			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>