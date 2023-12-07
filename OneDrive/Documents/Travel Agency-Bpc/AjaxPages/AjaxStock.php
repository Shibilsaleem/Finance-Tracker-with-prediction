<?php
include("../Connection/Connection.php");
$cid=$_REQUEST['item_id'];

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
  
    <?php
    
    $sel="select * from tbl_vehicle where vehicle_id='".$cid."'";
    $row=mysql_query($sel);
    while($data=mysql_fetch_array($row))
    {
    
?>
<img src="../Assets/VehicleImages/<?php echo $data["vehicle_image"];?>" height="120" width="120"/>
   
<?php
    }
?>
        </form>
    </body>
</html>
