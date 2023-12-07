<?php
include("../Connection/Connection.php");
if(isset($_POST["btnok"])){
    $ins="insert into tbl_district(district_name,state_id)values
    ('".$_POST["txtdistrictname"]."','".$_POST["selstate"]."') ";
    if(mysql_query($ins)){
        echo "<script>alert('Inserted')</script>";
    }else{
        echo "<script>alert('Failed')</script>";
    }    
}



if($_GET["delid"]){
  $del="delete from tbl_district where district_id='".$_GET["delid"]."'";
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
<title>Untitled Document</title>
<?php include "tem.php";?>


</head>

<body>
  <div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table  border="1">
    <tr>
      <td>District</td>
      <td>
      <input type="text" name="txtdistrictname" id="txtdistrictname" required="required"/></td>
    </tr>
    <tr>
      <td>state</td>
      <td><label for="selstate"></label>
        <select name="selstate" id="selstate" required="required">
        <option value="">--Select--</option>
      <?php
	  $sel="select * from tbl_state";
	  $rows=mysql_query($sel);
	  while($data=mysql_fetch_array($rows))
	  {
		  
	  ?>
      
      <option value="<?php echo $data["state_id"]; ?>"><?php echo $data["state_name"]; ?></option>
	  
	 <?php
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnok" id="btnok" value="Submit" />
       <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>


<br />
<br />

<table border="1" cellpadding="10" align="center">
<tr>
<th>state</th>
<th>district</th>
<th>Action</th>
</tr>


<?php

$sel="select * from tbl_district p inner join tbl_state d on p.state_id=d.state_id ";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
	
?>

<tr>
<td><?php echo $data["state_name"]; ?></td>
<td><?php echo $data["district_name"]; ?></td>
<td><a href="District.php?delid=<?php echo $data["district_id"]; ?>">Delete</a></td>

</tr>



<?php


}

?>

</tr>






</table>
</div>

</body>
</html>