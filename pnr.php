<?php
	session_start();

	$con=mysqli_connect("localhost","root","","HANGKHONG");
	if(!isset($con))
	{
    	die("Database Not Found");
	}


	if(isset($_REQUEST["u_sub"]))
	{
    
 		$id=$_POST['pnr'];

 		if($id!='')
 		{
   			$query=mysqli_query($con ,"select * from HANHKHACH where pnr='".$id."'");
   			$res=mysqli_fetch_row($query);
   			$query0=mysqli_query($con ,"select * from CHITIETHOADON where pnr='".$id."'");
   			$res0=mysqli_fetch_row($query0);
   			$query1=mysqli_query($con ,"select * from HOADON where pnr='".$id."'");
   			$res1=mysqli_fetch_row($query1);
		
   			if($res && $res0 && $res1)
   			{
   		 		$_SESSION['user']=$id;
    			header('location:pnrcheck.php');
   			}
   			else
  			{		
    
				echo '<script>';
				echo 'alert("Invalid username or password")';
				echo '</script>';
   			}
		}
 		else
 		{
			echo '<script>';
			echo 'alert("Enter both username and password")';
			echo '</script>';
		}
 	}
?>
<html>
	<head>
		<title>
			In Vé
		</title>
		<style>
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="styles.css"></link>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body style="background: url('images/1.jpg'); ">
        
		<img class="logo" src="images/my-logo.png"/> 
		<h1 id="title">
			Phòng vé Đà Lạt PV	</h1>
		<div>
		<div class="topnav">
			<div class="col-md-7">
			<a class="fa fa-home" aria-hidden="true" href="customer_homepage.php" style="background-color: #04AA6D;">Cá nhân</a>
			<a class="fa fa-money" aria-hidden="true" href="index.html">Khuyến mãi</a>
			<a class="fa fa-phone" aria-hidden="true" href="index.html">Liên hệ</a>
			<a class="fa fa-sign-out" aria-hidden="true" href="logout_handler.php"> Đăng xuất </a>
    		</div>
		</div>
        <br>
        <div>
        <?php echo "<h2>Chào bạn " .$_SESSION['login_user'].". Vui lòng nhập mã PNR để in vé."; ?>
        </div>
        <div class="col-md-4 col-md-offset-4">
        <form id="index" action="pnr.php" method="post">
            <div>
                <img class="logo-ima" src="images/my-logo.png" style="overflow: hidden; margin-left: -450px"/>
            </div>
            <div style="text-align: center">
                <input type="text" id="u_id" name="pnr" style="width:300px; margin-left: 66px; text-align: center; height: 30px" placeholder="Nhập mã PNR"><br>
                <input type="submit" id="u_sub" name="u_sub" value="IN" style="width:100px; margin-left: 70px;">
            </div>

        </form> 
        </div> 
       </body>
</html>
