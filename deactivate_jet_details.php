<?php
	session_start();
?>
<html>
	<head>
		<title>
			Hủy kích hoạt
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 67px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styles.css"></link>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	</head>
	<body style="background: url('images/1.jpg'); ">
		<img class="logo" src="images/my-logo.png"/> 
		<h1 id="title">
			Phòng vé Đà Lạt PV	</h1>
		
		<div>
		<div class="topnav">
			<div class="col-md-7">
			<a class="fa fa-home" aria-hidden="true" href="admin_homepage.php" style="background-color: #04AA6D;"> Cá nhân</a>
			<a class="fa fa-sign-out" aria-hidden="true" href="index.html"> Đăng xuất</a>
    		</div>
		</div>
		<br>
		<div class="col-md-4 col-md-offset-5">
		<form action="deactivate_jet_details_form_handler.php" method="post">
			<h2>Hủy kích hoạt máy bay</h2>
			<div>
			<?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color: green'>Hủy kích hoạt thành công.</strong>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red'>Mã máy bay không tồn tại hoặc đã kích hoạt.</strong>";
				}
			?>
			<BR>
			<table cellpadding="5" style="padding-left: 20px;">
				<tr>
					<td class="fix_table">Nhập mã máy bay</td>
				</tr>
				<tr>
					<td class="fix_table">
					<select name="jet_id">
						<?php
							require_once('Database Connection file/mysqli_connect.php');

							$query = "SELECT MAMAYBAY FROM CHITIETMAYBAY WHERE TRANGTHAI='yes'";
							$result = mysqli_query($dbc, $query);
							while ($row = mysqli_fetch_row($result)){
								echo "<option value=\"". $row[0]. "\">";
								echo $row[0] . "</option>";
							}
						?>
					</select>
					</td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Hủy kích hoạt" name="Deactivate">
			</div>
		</form>
		</div>	
	</body>
</html>