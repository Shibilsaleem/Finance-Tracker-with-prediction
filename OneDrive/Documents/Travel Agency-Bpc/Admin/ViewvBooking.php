<?php
include("../Connection/Connection.php");

if($_GET["delid"]){
  $del="update tbl_vbooking set vbooking_status='2' where vbooking_id='".$_GET["delid"]."'";
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
<title>Vehicle bookings</title>
<?php include "tem.php";?>


</head>

<body>
  <div id="tab" align="center">
<h3 align="center">Pending</h3>

<table border="1" cellpadding="10" align="right" width="80%">
  <tr>
    
    <th>Booking Starting Date</th>
    <th>Booking Ending Date</th>
    <th>Booking Starting Place</th>
    <th>Booking Ending Place</th>
    <th>customer ID</th>
    <th>Vehicle name</th>
    <th>Amount</th>
     <th>Action</th>
  </tr>


  <?php

  $sel = "select * from tbl_vbooking v inner join tbl_vehicle c on c.vehicle_id=v.vehicle_id  where v.vbooking_status='0'";
  //echo $sel;
  $rows = mysql_query($sel);
  while ($data = mysql_fetch_array($rows)) {

  ?>

    <tr>
      <td><?php echo $data["vbooking_day1"]; ?></td>
      <td><?php echo $data["vbooking_day2"]; ?></td>
      <td><?php echo $data["vbooking_place1"]; ?></td>
      <td><?php echo $data["vbooking_place2"]; ?></td>
      <td><?php echo $data["Customer_id"]; ?></td>
      <td><?php echo $data["vehicle_name"]; ?></td>
      <td><?php echo $data["vbooking_amount"]; ?></td>
      <td><a href="ViewvBooking.php?delid=<?php echo $data["vbooking_id"]; ?>">Approve</a></td>




    <?php


  }

    ?>

    </tr>






</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<h3 align="center">Completed</h3>

<table border="1" cellpadding="10" align="right" width="80%">
  <tr>
     <th>Booking Starting Date</th>
    <th>Booking Ending Date</th>
    <th>Booking Starting Place</th>
    <th>Booking Ending Place</th>
    <th>Customer ID</th>
    <th>Vehicle name</th>
    <th>Amount</th>
  </tr>


  <?php

  $sel = "select * from tbl_vbooking v inner join tbl_vehicle c on c.vehicle_id=v.vehicle_id  where v.vbooking_status='2'";
  //echo $sel;
  $rows = mysql_query($sel);
  while ($data = mysql_fetch_array($rows)) {

  ?>

    <tr>
      <td><?php echo $data["vbooking_day1"]; ?></td>
      <td><?php echo $data["vbooking_day2"]; ?></td>
      <td><?php echo $data["vbooking_place1"]; ?></td>
      <td><?php echo $data["vbooking_place2"]; ?></td>
      <td><?php echo $data["Customer_id"]; ?></td>
      <td><?php echo $data["vehicle_name"]; ?></td>
      <td><?php echo $data["vbooking_amount"]; ?></td>
      




    <?php


  }

    ?>

    </tr>






</table>
</div>
</body>
</html>