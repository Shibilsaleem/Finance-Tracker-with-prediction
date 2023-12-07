<?php
include("../Connection/Connection.php");
if(isset($_POST["btnsubmit"])){
    $ins="insert into tbl_tripdetails(tripdetails_startingplace1,tripdetails_intermediateplace2
    ,tripdetails_intermediateplace3,tripdetails_destinationplace,tripdetails_duration,
    tripdetails_description,tripdetails_amount,tripdetails_day)values
    ('".$_POST["txtstartingplace1"]."','".$_POST["txtintermediateplace2"]."',
    '".$_POST["txtIntermediateplace3"]."','".$_POST["txtdestinationplace"]."',
    '".$_POST["txtduration"]."','".$_POST["txtdescription"]."','".$_POST["txtamount"]."','".$_POST["txtday"]."') ";
	//echo $ins;
    if(mysql_query($ins)){
        echo "<script>alert('Inserted')</script>";
    }else{
        echo "<script>alert('Failed')</script>";
    }    
}



if($_GET["delid"]){
  $del="delete from tbl_tripdetails where tripdetails_id='".$_GET["delid"]."'";
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
<title>Schedule trip details</title>
<?php include "tem.php";?>


</head>

<body>
  <div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Starting Place1</td>
      <td><label for="txtstartingplace1"></label>
      <input type="text" name="txtstartingplace1" id="txtstartingplace1" required="required" /></td>
    </tr>
    <tr>
      <td>Intermediate Place2</td>
      <td><label for="txtintermediateplace2"></label>
      <input type="text" name="txtintermediateplace2" id="txtintermediateplace2" required="required" /></td>
    </tr>
    <tr>
      <td>Intermediate Place3</td>
      <td><label for="txtIntermediateplace3"></label>
      <input type="text" name="txtIntermediateplace3" id="txtIntermediateplace3" required="required"/></td>
    </tr>
    <tr>
      <td>Destination Place</td>
      <td><label for="txtdestinationplace"></label>
      <input type="text" name="txtdestinationplace" id="txtdestinationplace" required="required"/></td>
    </tr>
    <tr>
      <td>Duration</td>
      <td><label for="txtduration"></label>
      <input type="text" name="txtduration" id="txtduration" required="required"/></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><label for="txtdescription"></label>
      <textarea name="txtdescription" id="txtdescription" cols="45" rows="5"required="required"></textarea></td>
    </tr>
   <tr>
      <td>Date</td>
      <td><label for="txtday"></label>
      <input type="date" name="txtday" id="txtday" required="required" /></td>
    </tr>
    
    <tr>
      <td>Amount</td>
      <td><label for="txtamount"></label>
      <input type="text" name="txtamount" id="txtamount" required="required" /></td>
    </tr>
    
   <tr>
      <td colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>


<br />
<br />

<table align="right" width="80%" >
<tr>
<th>Starting Place1</th>
<th>Intermediate Place2</th>
<th>Intermediate Place3</th>
<th>Destination Place</th>
<th>Duration</th>
<th>Date</th>
<th>Description</th>
<th>Amount</th> 
<th colspan="2">Action</th>
</tr>


<?php

$sel="select * from tbl_tripdetails";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
	
?>

<tr>
<td><?php echo $data["tripdetails_startingplace1"]; ?></td>
<td><?php echo $data["tripdetails_intermediateplace2"]; ?></td>
<td><?php echo $data["tripdetails_intermediateplace3"]; ?></td>
<td><?php echo $data["tripdetails_destinationplace"]; ?></td>
<td><?php echo $data["tripdetails_duration"]; ?>
<td><?php echo $data["tripdetails_day"]; ?></td>
<td><?php echo $data["tripdetails_description"]; ?></td>
<td><?php echo $data["tripdetails_amount"]; ?></td>

<td><a href="Tripdetails.php?delid=<?php echo $data["tripdetails_id"]; ?>">Delete</a></td>
<td><a href="TripGallery.php?tid=<?php echo $data["tripdetails_id"]; ?>">Add Images</a></td>

</tr>



<?php


}

?>

</tr>






</table>
</div>

</body>
</html>