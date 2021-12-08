<?php
	session_start();
?>
<html>
	<head>
		<title>Xóa chi tiết máy bay</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Submit']))
			{

				$jet_id=trim($_POST['jet_id']);
				
				require_once('Database Connection file/mysqli_connect.php');
				$query="DELETE FROM CHITIETMAYBAY WHERE MAMAYBAY=?";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"s",$jet_id);
				mysqli_stmt_execute($stmt);
				$affected_rows=mysqli_stmt_affected_rows($stmt);
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				
				if($affected_rows==1)
				{
					header("location: delete_jet_details.php?msg=success");
				}
				else
				{
					header("location: delete_jet_details.php?msg=failed");
				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>