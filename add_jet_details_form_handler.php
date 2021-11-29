<?php
	session_start();
?>
<html>
	<head>
		<title>Thêm chi tiết máy bay</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Submit']))
			{

				$jet_id=trim($_POST['jet_id']);
				$jet_type=$_POST['jet_type'];
				$jet_capacity=$_POST['jet_capacity'];

				require_once('Database Connection file/mysqli_connect.php');
				$query="INSERT INTO CHITIETMAYBAY (MAMAYBAY,LOAIMAYBAY,TONGCHONGOI,TRANGTHAI) VALUES (?,?,?,'No')";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"ssi",$jet_id,$jet_type,$jet_capacity);
				mysqli_stmt_execute($stmt);
				$affected_rows=mysqli_stmt_affected_rows($stmt);
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				
				if($affected_rows==1)
				{
					header("location: add_jet_details.php?msg=success");
				}
				else
				{
					header("location: add_jet_details.php?msg=failed");
				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>