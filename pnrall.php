<?php
session_start();

$con=mysqli_connect("localhost","root","","hangkhong");
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
   $query0=mysqli_query($con ,"select * from ticket_details where pnr='".$id."'");
   $res0=mysqli_fetch_row($query0);
   $query1=mysqli_query($con ,"select * from payment_details where pnr='".$id."'");
   $res1=mysqli_fetch_row($query1);

   if($res)
   {
    $_SESSION['user']=$id;
    header('location:pnrcheckall.php');
   }
   else
   {
    
    echo '<script>';
    echo 'alert("Wrong PNR Number")';
    echo '</script>';
   }
if($res0)
   {
    $_SESSION['user']=$id;
    header('location:pnrcheckall.php');
   }
   else
   {
    
    echo '<script>';
    echo 'alert("Wrong PNR Number")';
    echo '</script>';
   }


   
   if($res1)
   {
    $_SESSION['user']=$id;
    header('location:pnrcheckall.php');
   }
   else
   {
    
    echo '<script>';
    echo 'alert("Wrong PNR Number")';
    echo '</script>';
   }
  }
 else
 {
     echo '<script>';
    echo 'alert("Wrong PNR Number")';
    echo '</script>';
 
 }
}
?>

<html>
    <head>

        <title>Kiểm tra vé</title>
        <link rel="stylesheet" type="text/css" href="styles.css"></link>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        
    </head>
    <body  style="background-image:url('images/1.jpg');" >
    <img class="logo" src="images/my-logo.png"/> 
		<h1 id="title">
			Phòng vé Đà Lạt PV	</h1>
		<div>
		<div class="topnav">
			<div class="col-md-7">
			<a class="fa fa-home" aria-hidden="true" href="index.html" style="background-color: #04AA6D;"> Trở về trang chính</a>
    		</div>
		</div>
		<br>

        <form id="index" action="pnrall.php" method="post">
            <center>
            <div class="my-logo">
                <img src="images/my-logo.png" style="padding-right: 600px" >
            </div>
            <center>
            <div>
            <input type="text" id="u_id" name="pnr" class="form-control" style="width:300px; margin-left: 66px;" placeholder="Nhập mã PNR"><br>
                                   
            <input type="submit" id="u_sub" name="u_sub" value="Kiểm tra" class="toggle btn btn-primary" style="width:100px; margin-left: 70px;"><br>
            </div>
    
        </form>  
       </body>
</html>
