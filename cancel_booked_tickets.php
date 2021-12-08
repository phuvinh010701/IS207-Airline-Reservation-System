<?php
	session_start();
?>
<html>
	<head>
		<title>
			Hủy vé
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
		<div>
        <?php echo "<h2>Chào bạn " .$_SESSION['login_user'].". Vui lòng nhập mã PNR để hủy vé."; ?>
        </div>
        <div class="col-md-4 col-md-offset-4">
        <form action="cancel_booked_tickets_form_handler.php" method="post">
			<?php
				if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color: red'>Mã PNR sai, vui lòng nhập lại.</strong>
						<br>
						<br>";
				}
			?>
            <div>
                <img class="logo-ima" src="images/my-logo.png" style="overflow: hidden; margin-left: -450px"/>
            </div>
            <div style="text-align: center">
                <input type="text" name="pnr" style="width:300px; margin-left: 66px; text-align: center; height: 30px" placeholder="Nhập mã PNR" require><br>
                <input type="submit" name="Cancel_Ticket" value="Hủy vé" style="width:100px; margin-left: 70px;">
            </div>

        </form> 
        </div> 
	</body>
</html>