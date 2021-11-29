<?php
    session_start();
    error_reporting(1);
  ?>

  <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
         <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        
        <script type="text/javascript">
            function printpage()
            {
            var printButton = document.getElementById("print");
            printButton.style.visibility = 'hidden';
            window.print()
             printButton.style.visibility = 'visible';
             }
        </script>
        
        
    </head>
  <?php

$con=mysqli_connect("localhost","root","","airline_reservation");
$q=mysqli_query($con,"select pnr,flight_no,journey_date, class, booking_status, no_of_passengers, lounge_access, priority_checkin, insurance, payment_id, customer_id from ticket_details where pnr='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['pnr'];
$flight_no= $n['flight_no'];
$journey_date= $n['journey_date'];
$class= $n['class'];
$booking_status= $n['booking_status'];
$no_of_passengers= $n['no_of_passengers'];
$lounge_access= $n['lounge_access'];
$priority_checkin= $n['priority_checkin'];
$insurance= $n['insurance'];
$payment_id= $n['payment_id'];
$customer_id= $n['customer_id'];




$id=$_SESSION['user'];

$result = mysqli_query($con,"SELECT * FROM passengers WHERE pnr='".$_SESSION['user']."'");
                    
                    while($row = mysqli_fetch_array($result))
                      {
?>

<hr style="border: 1px solid black;border-style: dashed;">
<center><h3>Phòng vé PV</h3></center>
<center><h2>Thông tin chuyến bay</h2></center><h4><?php echo $booking_status;?></h4>
<br>
<td style="width:4%;"> <font style="font-family: Verdana;">PNR : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $id;?> </td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<td style="width:4%;"> <font style="font-family: Verdana;">Chuyến bay số : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $flight_no;?> </td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<td style="width:4%;"> <font style="font-family: Verdana;">Ngày bay : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $journey_date;?> </td><br>
<td style="width:4%;"> <font style="font-family: Verdana;">Loại ghế : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $class;?> </td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<td style="width:4%;"> <font style="font-family: Verdana;">Thông tin thanh toán : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $payment_id;?> </td><br>
<td style="width:4%;"> <font style="font-family: Verdana;">Phòng chờ : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $lounge_access;?> </td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<td style="width:4%;"> <font style="font-family: Verdana;">Ưu tiên check-in : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $priority_checkin;?> </td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<td style="width:4%;"> <font style="font-family: Verdana;">Bảo hiểm : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $insurance;?> </td><br>
<td style="width:4%;"> <font style="font-family: Verdana;">Người đặt (Username) : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $customer_id;?> </td><br>
<td style="width:4%;"> <font style="font-family: Verdana;">Trạng thái: </font> </td>
                    <td style="width:58%;" colspan="3"> <?php echo $booking_status;?> </td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<td style="width:4%;"> <font style="font-family: Verdana;">Số lượng hành khách: </font> </td>
                    <td style="width:58%;" colspan="3"> <?php echo $no_of_passengers;?> </td>

    <body>

                 
                
        </div>
         
  <div class="container-fluid">
                            <div class="row">
                               <div class="col-sm-12">
      <center>  <table class="table table-bordered" style="font-family: Verdana">
              
                <center><font style="font-family:Verdana; font-size:18px;">
                   
                    </font></center>
                
                <br>
                <br>
                <center><font style="font-family:Arial Black; font-size:20px;">
		
                   </font></center>
                </td>
                    <td colspan="2" width="3%" >
                   <?php
                  
                    $picfile_path ='images/';
                    $result1 = mysqli_query($con,"SELECT * FROM passengers where pnr='".$_SESSION['user']."'");
                   $row1 = mysqli_fetch_array($result1)  ; 
                    
                    
                        $picsrc=$picfile_path.$row1['s_pic'];
                        
                        echo "<center><img src='images/shutterstock_2.jpg' class='img-thumbnail' width='180px' style='height:180px;'></center>";
                   ?>
                        </td>
                 </tr>   


    
                 
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">PNR : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $stname;?> </td>
                 </tr>
                 
                 
                <tr>
                    <td> <font style="font-family: Verdana;">Hành khách số : </font> </td>
                    <td colspan="3"> <?php echo ''. $row[0]. '   ' ?>
                </tr>
                  
                  <tr>
                    <td > <font style="font-family: Verdana;"> Họ tên</font>  </td>
                    <td colspan="3"> <?php echo ''. $row[2]. '   ' ?><br>
                    <?php echo ' Age - '.$row[3] ?></td>
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Giới tính</font></td>
                    <td  colspan="3"><?php echo $row[4] ?> </td>
                   </tr>
                       </table></center>
                               </div>
                            </div>
            </div>
        <?php
              }
        ?>
 <p> 
<center> <input type="submit" id="print" class="toggle btn btn-primary" value="Print" onclick="printpage();"></center>
<CENTER><a class="print_hide" href="customer_homepage.php">Về trang cá nhân</a></center>
</p>
   <style>
     @media print {
      .print_hide{
        display:none;
      }
     }
   </style> 

    </body>
</html>


                     