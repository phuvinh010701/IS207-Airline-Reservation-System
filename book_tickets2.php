<?php
	session_start();
?>
<html>
	<head>
		<title>
			Nhập thông tin chuyến bay
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 10px;
			}
			input[type=number] {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 0px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin-left: 250px;
			}
			input[type=radio] {
    			margin-right: 30px;
			}
			select {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 6.5px 15px;
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
			<a class="fa fa-home" aria-hidden="true" href="customer_homepage.php" style="background-color: #04AA6D;"> Cá nhân</a>
			<a class="fa fa-money" aria-hidden="true" href="index.html"> Khuyến mãi</a>
			<a class="fa fa-phone" aria-hidden="true" href="index.html"> Liên hệ</a>
			<a class="fa fa-sign-out" aria-hidden="true" href="index.html"> Đăng xuất</a>
    		</div>
		</div>
		<br>
		<?php
			$no_of_pass=$_SESSION['no_of_pass'];
			$class=$_SESSION['class'];
			$count=$_SESSION['count'];
			$flight_no=$_POST['select_flight'];
			$_SESSION['flight_no']=$flight_no;
			echo "<div class=\" col-md-10 col-md-offset-3 \">";
			echo "<h2>Thêm thông tin khách hàng</h2>";
			echo "<form action=\"add_ticket_details_form_handler.php\" method=\"post\">";
			while($count<=$no_of_pass)
			{
					echo "<p><strong>Hành khách số: ".$count."<strong></p>";
					echo "<table cellpadding=\"0\">";
					echo "<tr>";
					echo "<td class=\"fix_table_short\">Tên</td>";
					echo "<td class=\"fix_table_short\">Tuổi</td>";
					echo "<td class=\"fix_table_short\">Giới tính</td>";
					echo "<td class=\"fix_table_short\">Thức ăn</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_name[]\" required></td>";
					echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"pass_age[]\" required></td>";
					echo "<td class=\"fix_table_short\">";
					echo "<select name=\"pass_gender[]\">";
  					echo "<option value=\"male\">Nam</option>";
  					echo "<option value=\"female\">Nữ</option>";
  					echo "<option value=\"other\">Khác</option>";
  					echo "</select>";
  					echo "</td>";
  					echo "<td class=\"fix_table_short\">";
					echo "<select name=\"pass_meal[]\">";
  					echo "<option value=\"yes\">Có</option>";
  					echo "<option value=\"no\">Không</option>";
  					echo "</select>";
  					echo "</td>";
					echo "</tr>";
					echo "</table>";
					echo "<br><hr>";
					$count=$count+1;
				}
				// echo "<br><h2>Chi tiết chuyến bay</h2>";
				echo "<h2> Chi tiết chuyến bay </h2>";
				echo "<table cellpadding=\"5\">";
				echo "<tr>";
				echo "<td class=\"fix_table_short\">Sử dụng phòng chờ?</td>";
				echo "<td class=\"fix_table_short\">Ưu tiên Checkin</td>";
				echo "<td class=\"fix_table_short\">Sử dụng bảo hiểm máy bay</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class=\"fix_table\">";
				echo "Có <input type='radio' name='lounge_access' value='yes' checked/> Không <input type='radio' name='lounge_access' value='no'/>";
  				echo "</td>";
  				echo "<td class=\"fix_table\">";
				echo "Có <input type='radio' name='priority_checkin' value='yes' checked/> Không <input type='radio' name='priority_checkin' value='no'/>";
  				echo "</td>";
  				echo "<td class=\"fix_table\">";
				echo "Có <input type='radio' name='insurance' value='yes' checked/> Không <input type='radio' name='insurance' value='no'/>";
  				echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "<br><br>";
				echo "<input type=\"submit\" value=\"Đồng ý\" name=\"Submit\">";
				echo "</form>";
				echo "</div";
		?>
	</body>
</html>