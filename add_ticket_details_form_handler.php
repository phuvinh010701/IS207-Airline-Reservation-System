<?php
	session_start();
?>
<html>
	<head>
		<title>Thêm chi tiết hóa đơn</title>
	</head>
	<body>
		<?php
			$i=1;
			if(isset($_POST['Submit']))
			{
				$pnr=rand(1000000,9999999);
				$date_of_res=date("Y-m-d");
				$flight_no=$_SESSION['flight_no'];
				$journey_date=$_SESSION['journey_date'];
				$class=$_SESSION['class'];
				$booking_status="PENDING";
				$no_of_pass=$_SESSION['no_of_pass'];
				$lounge_access=$_POST['lounge_access'];
				$priority_checkin=$_POST['priority_checkin'];
				$insurance=$_POST['insurance'];
				$total_no_of_meals=0;
				$_SESSION['pnr']=$pnr;
				$_SESSION['lounge_access']=$lounge_access;
				$_SESSION['priority_checkin']=$priority_checkin;
				$_SESSION['insurance']=$insurance;
				$payment_id=NULL;
				$customer_id=$_SESSION['login_user'];

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
				$ff_mileage=$ticket_price/10;

				$query="INSERT INTO CHITIETHOADON (pnr,NGAYDATVE,MACHUYENBAY,NGAYBAY,LOAIGHE,TRANGTHAI,SOLUONGHANHKHACH,PHONGCHO,UUTIEN,BAOHIEM,MAHOADON,MAKHACHHANG) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"ssssssisssss",$pnr,$date_of_res,$flight_no,$journey_date,$class,$booking_status,$no_of_pass,$lounge_access,$priority_checkin,$insurance,$payment_id,$customer_id);
				mysqli_stmt_execute($stmt);
				$affected_rows=mysqli_stmt_affected_rows($stmt);
				echo $affected_rows.'<br>';
				
				if($affected_rows==1)
				{
					echo "Successfully Submitted<br>";
				}
				else
				{
					echo "Submit Error";
					echo mysqli_error();
				}
				
				for($i=1;$i<=$no_of_pass;$i++)
				{

					$query="INSERT INTO HANHKHACH (MAHANHKHACH,pnr,HOTEN,TUOI,GIOITINH,THUCAN) VALUES (?,?,?,?,?,?)";
					$stmt=mysqli_prepare($dbc,$query);
					if($_POST['pass_meal'][$i-1]=='yes')
						$total_no_of_meals++;
					mysqli_stmt_bind_param($stmt,"ississ",$i,$pnr,$_POST['pass_name'][$i-1],$_POST['pass_age'][$i-1],$_POST['pass_gender'][$i-1],$_POST['pass_meal'][$i-1]);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
		
				}
				header("location: payment_details.php");
				$_SESSION['total_no_of_meals']=$total_no_of_meals;
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