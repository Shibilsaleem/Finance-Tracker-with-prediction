<?php
include("../Connection/Connection.php");
session_start();

if (isset($_POST["btnsubmit"]))
 {

  $sPhoto=$_FILES["fupvehicleimage"]["name"];
  $stemploc=$_FILES["fupvehicleimage"]["tmp_name"];
  move_uploaded_file($stemploc,"../Assets/VehicleImages/".$sPhoto);

    $ins = "insert into tbl_vehicle(vehicle_name,vehicle_rate,vehicle_image,vehicle_description,vehicletype_id)
    values('".$_POST["txtvehiclename"]."','".$_POST["txtvehiclerate"]."','" . $sPhoto . "','".$_POST["txtvehicledescription"]."','".$_POST["selvehiclesubtype"]."') ";
  // echo $ins;
    if (mysql_query($ins)) {
       // echo "Inserted";
        echo "<script>alert('Inserted')</script>";
      } else {
      
    echo "<script>alert('Failed')</script>";
      }

}



if($_GET["delid"]){
  $del="delete from tbl_vehicle where vehicle_id='".$_GET["delid"]."'";
  if(mysql_query($del)){
    echo "<script>alert('Deleted')</script>";
}else{
    echo "<script>alert('Failed')</script>";
}    
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add vehicles</title>
<?php include "tem.php";?>


</head>

<body>
  <div id="tab" align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table  border="1">
    <tr>
      <td>Vehicle Name</td>
      <td><label for="txtvehiclename"></label>
      <input type="text" name="txtvehiclename" id="txtvehiclename" required="required" /></td>
    </tr>
    <tr>
      <td>Vehicle Rate</td>
      <td><label for="txtvehiclerate"></label>
      <input type="text" name="txtvehiclerate" id="txtvehiclerate" required="required" /></td>
    </tr>
    <tr>
      <td>Vehicle Image</td>
      <td><label for="fupvehicleimage"></label>
      <input type="file" name="fupvehicleimage" id="fupvehicleimage" required="required" /></td>
    </tr>
    <tr>
      <td>Vehicle Description</td>
      <td><label for="txtvehicledescription"></label>
      <textarea name="txtvehicledescription" id="txtvehicledescription" cols="45" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td>vehicle type</td>
      <td><label for="selvehiclesubtype"></label>
        <select name="selvehiclesubtype" id="selvehiclesubtype" required="required">
        <option value="">--Select--</option>
      <?php
	  $sel="select * from tbl_vehicletype";
	  $rows=mysql_query($sel);
	  while($data=mysql_fetch_array($rows))
	  {
		  
	  ?>
      
      <option value="<?php echo $data["vehicletype_id"]; ?>"><?php echo $data["vehicletype_name"]; ?></option>
	  
	 <?php
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>

<br />
<br />

<table border="1" cellpadding="10" width="80%" align="right">
<tr>
<th>Vehicle Name</th>
<th>Vehicle Rate</th>
<th>Vehicle Image</th>
<th>Vehicle Description</th>
<th>Vehicletype Name</th>
</tr>


<?php

$sel="select * from tbl_vehicle v inner join  tbl_vehicletype vt on v.vehicletype_id=vt.vehicletype_id";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
	
?>

<tr>
<td><?php echo $data["vehicle_name"]; ?></td>
<td><?php echo $data["vehicle_rate"]; ?></td>
<td><img src="../Assets/VehicleImages/<?php echo $data["vehicle_image"]; ?>" width="200" height="150"></td>
<td><?php echo $data["vehicle_description"]; ?></td>
<td><?php echo $data["vehicletype_name"]; ?>

<td><a href="AddVehicle.php?delid=<?php echo $data["vehicle_id"]; ?>">Delete</a></td>


</tr>



<?php


}

?>

</tr>




</table>

</div>

<br><br><br><br><br><br>

</body>
</html>