<?php
	session_start();
?>
<html>
	<head>
		<title>
			Hủy kích hoạt
		</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Deactivate']))
			{
				$jet_id=trim($_POST['jet_id']);

				require_once('Database Connection file/mysqli_connect.php');
				$query="UPDATE CHITIETMAYBAY SET TRANGTHAI='No' WHERE MAMAYBAY=?";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"s",$jet_id);
				mysqli_stmt_execute($stmt);
				$affected_rows=mysqli_stmt_affected_rows($stmt);
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				
				if($affected_rows==1)
				{
					header("location: deactivate_jet_details.php?msg=success");
				}
				else
				{
					header("location: deactivate_jet_details.php?msg=failed");
				}	
			}
			else
			{
				echo "Deactivate request not received";
			}
		?>
	</body>
</html>