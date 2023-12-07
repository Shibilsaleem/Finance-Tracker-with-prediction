<?php
include("../Connection/Connection.php");
session_start();
$bikeid=$_GET["tid"];
if (isset($_POST["btnsubmit"]))
 {

  $sPhoto=$_FILES["fupfile"]["name"];
  $stemploc=$_FILES["fupfile"]["tmp_name"];
  move_uploaded_file($stemploc,"../Assets/TripImages/".$sPhoto);

    $ins = "insert into tbl_tripgallery(tripdetails_id,gallery_file,gallery_title)
    values('" . $bikeid . "','" . $sPhoto . "','".$_POST["txtcaption"]."') ";
   //echo $ins;
    if (mysql_query($ins)) {
       // echo "Inserted";
        echo "<script>alert('Submitted successfully')</script>";
      } else {
      
    echo "<script>alert('Failed')</script>";
      }

}
?>
<html>
<head>
<?php include "tem.php";?>


</head>

<body>
  <div id="tab" align="center">
    <form action="" method="post"  enctype="multipart/form-data" >
    <table border="1" cellpadding="10">
    <tr>
    <td>Caption</td>
    <td><textarea name="txtcaption" id="" cols="30" rows="10"></textarea></td>
    </tr>
    <tr>
    <td>File</td>
    <td><input type="file" name="fupfile" id=""></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><input type="submit" value="Submit" name="btnsubmit"></td>
    </tr>
    </table>
    </form>
    <table cellpadding="10" align="center">


<?php

$sel="select * from tbl_tripgallery where tripdetails_id='".$bikeid."'";
 //echo $sel;

$i=0;
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
    $i++;
    if($i==1)
    {
       
        ?>
        <tr>
<?php
    }
	
?>


<td><img src="../Assets/TripImages/<?php echo $data["gallery_file"]; ?>" width="200" height="150"> <br>
<?php echo $data["gallery_title"]; ?></td>

<?php
if($i==3)
{
?>
</tr>
<?php
$i=0;
}
}
?>




</table>
</div>
</body>
</html>