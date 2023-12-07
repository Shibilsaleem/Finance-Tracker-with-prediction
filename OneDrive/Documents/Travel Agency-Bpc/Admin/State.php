<?php
include("../Connection/Connection.php");
if (isset($_POST["btnsubmit"])) {

    $ins = "insert into tbl_state(state_name)values('" . $_POST["txtstate"] . "') ";
    if (mysql_query($ins)) {
      echo "<script>alert('Inserted')</script>";
    } else {
      echo "<script>alert('Failed')</script>";
    }
  }


if ($_GET["delid"]) {
  $del = "delete from tbl_state where state_id='" . $_GET["delid"] . "'";
  if (mysql_query($del)) {
    echo "<script>alert('Deleted')</script>";
  } else {
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
      <td>State</td>
      <td><label for="txtstate"></label>
      <input type="text" name="txtstate" id="txtstate" required="required" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
    </td>
    </tr>
  </table>
</form>

<br />
<br />

<table border="1" cellpadding="10" align="center">
  <tr>
    <th>State</th>
    <th>Action</th>
  </tr>


  <?php

  $sel = "select * from tbl_state";
  //echo $sel;
  $rows = mysql_query($sel);
  while ($data = mysql_fetch_array($rows)) {

  ?>

    <tr>
      <td><?php echo $data["state_name"]; ?></td>
      <td><a href="State.php?delid=<?php echo $data["state_id"]; ?>">Delete</a></td>




    <?php


  }

    ?>

    </tr>






</table>
</div>
</body>
</html>