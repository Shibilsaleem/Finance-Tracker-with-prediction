<?php
include("../Connection/Connection.php");
if(isset($_POST["btnsubmit"])){
    $ins="insert into tbl_place(place_name,district_id)values
    ('".$_POST["txtplace"]."','".$_POST["seldistrict"]."') ";
    if(mysql_query($ins)){
        echo "<script>alert('Inserted')</script>";
    }else{
        echo "<script>alert('Failed')</script>";
    }    
}



if($_GET["delid"]){
  $del="delete from tbl_place where place_id='".$_GET["delid"]."'";
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
<script src="../js/jQuery.js" type="text/javascript"></script>
        
		
		<script>
            
			 function getDistrict(did)
             {
				 //alert(a);
                    $.ajax(
					{
						//var b=document.getElementById("");
						url: "../AjaxPages/AjaxDistrict.php?did="+did,
						//data:{variablename:value,variablename:value)}//more than one value passing
						success: function(result){
                    $("#seldistrict").html(result);
                    }});
             }
       
             
        </script>
<?php include "tem.php";?>


</head>

<body>
  <div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table  border="1">
  <tr>
      <td>state</td>
      <td><label for="selstate"></label>
        <select name="selstate" id="selstate" onchange="getDistrict(this.value)" required="required">
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
      <td>district</td>
      <td><label for="seldistrict"></label>
        <select name="seldistrict" id="seldistrict" required="required">
     
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txtplace"></label>
      <input type="text" name="txtplace" id="txtplace" required="required" /></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
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

$sel="select * from tbl_district p inner join tbl_place d on p.district_id=d.district_id ";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
	
?>

<tr>
<td><?php echo $data["place_name"]; ?></td>
<td><?php echo $data["district_name"]; ?></td>
<td><a href="place.php?delid=<?php echo $data["place_id"]; ?>">Delete</a></td>

</tr>



<?php
}
?>
</tr>
</table>
</div>

</body>
</html>