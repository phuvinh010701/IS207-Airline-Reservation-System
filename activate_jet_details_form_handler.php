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
				$data_missing=array();
				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=trim($_POST['jet_id']);
				}

				if(empty($data_missing))
				{
					require_once('Database Connection file/mysqli_connect.php');
					$cnt = -1;
					$query1 = "SELECT count(*) FROM Jet_Details WHERE jet_id=? and active='No'";
					$stmt=mysqli_prepare($dbc,$query1);
					mysqli_stmt_bind_param($stmt,"s",$jet_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$cnt);
					mysqli_stmt_fetch($stmt);
					mysqli_stmt_close($stmt);
					
					if ($cnt <= 0) {
						
						echo "Submit Error";
						header("location: activate_jet_details.php?msg=failed");
						echo mysqli_error($dbc);
						
					
					}
					else{
						$query="UPDATE jet_details SET active='Yes' WHERE jet_id='{$jet_id}'";
					
						$affected_rows=mysqli_query($dbc,$query);
						
						if($affected_rows==1)
						{
							echo "Successfully Activated";
							header("location: activate_jet_details.php?msg=success");
						}
						else
						{
							echo "Submit Error";
							echo ($affected_rows);
							echo mysqli_error($dbc);
							
						}
					}
					
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
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