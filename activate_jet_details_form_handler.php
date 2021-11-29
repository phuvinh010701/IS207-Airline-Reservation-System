<?php
	session_start();
?>
<html>
	<head>
		<title>Activate Aircraft</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Activate']))
			{
				
				$jet_id=trim($_POST['jet_id']);
				require_once('Database Connection file/mysqli_connect.php');
				$cnt = -1;
				$query1 = "SELECT count(*) FROM CHITIETMAYBAY WHERE MAMAYBAY=? and TRANGTHAI='No'";
				$stmt=mysqli_prepare($dbc,$query1);
				mysqli_stmt_bind_param($stmt,"s",$jet_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt,$cnt);
				mysqli_stmt_fetch($stmt);
				mysqli_stmt_close($stmt);
				
				if ($cnt == 0) {
					header("location: activate_jet_details.php?msg=failed");
				}
				else{
					$query="UPDATE CHITIETMAYBAY SET TRANGTHAI='Yes' WHERE MAMAYBAY='{$jet_id}'";
				
					$affected_rows=mysqli_query($dbc,$query);
					
					if($affected_rows==1)
					{
						header("location: activate_jet_details.php?msg=success");
					}
					else
					{
						header("location: activate_jet_details.php?msg=failed");
					}
				}	
			}
			else
			{
				echo "Activate request not received";
			}
			mysqli_close($dbc);
		?>
	</body>
</html>