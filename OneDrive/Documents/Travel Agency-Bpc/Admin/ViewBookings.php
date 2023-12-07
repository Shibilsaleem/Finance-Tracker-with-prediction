<?php
include("../Connection/Connection.php");

if($_GET["delid"]){
  $del="update tbl_booking set booking_status='2' where booking_id='".$_GET["delid"]."'";
  if(mysql_query($del)){
    echo "<script>alert('Updated')</script>";
}else{
    echo "<script>alert('Failed')</script>";
}    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bookings</title>
<?php include "tem.php";?>


</head>

<body>
  <div id="tab" align="center">
<h3 align="center">Pending</h3>

<table border="1" cellpadding="10" align="right" width="80%">
  <tr>
    <th>Booking Date</th>
   
    <th>Customer name</th>
    <th>Trip Details name</th>
    <th>Action</th>
  </tr>


  <?php

  $sel = "select * from tbl_booking b inner join tbl_customer c inner join 
   tbl_tripdetails td  on b.customer_id=c.customer_id
   and td.tripdetails_id=b.tripdetails_id where booking_status='0'";
  //echo $sel;
  $rows = mysql_query($sel);
  while ($data = mysql_fetch_array($rows)) {

  ?>

    <tr>
      <td><?php echo $data["booking_date"]; ?></td>
    
      <td><?php echo $data["customer_name"]; ?></td> 	
      <td><?php echo $data["tripdetails_description"]; ?></td>
      <td><a href="ViewBookings.php?delid=<?php echo $data["booking_id"]; ?>">Approve</a></td>




    <?php


  }

    ?>

    </tr>






</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<h3 align="center">Completed</h3>

<table border="1" cellpadding="10" style="padding-left:100" align="right" width="80%">
  <tr>
    <th>Booking Date</th>
   
    <th>Customer name</th>
    <th>Trip Deatails name</th>
  </tr>


  <?php

  $sel = "select * from tbl_booking b inner join tbl_customer c inner join 
   tbl_tripdetails td on b.customer_id=c.customer_id
   and td.tripdetails_id=b.tripdetails_id where booking_status='2'";
  //echo $sel;
  $rows = mysql_query($sel);
  while ($data = mysql_fetch_array($rows)) {

  ?>

    <tr>
      <td><?php echo $data["booking_date"]; ?></td>
     
      <td><?php echo $data["customer_name"]; ?></td>
      <td><?php echo $data["tripdetails_description"]; ?></td>
      




    <?php


  }

    ?>

    </tr>






</table>
</div>
</body>
</html>