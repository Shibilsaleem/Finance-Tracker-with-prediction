<?php
include("../Connection/Connection.php");
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?php include "tem.php";?>


</head>

<body>
  <div id="tab">
<table border="1" width="80%" align="right">
  <tr>
    <th>date</th>
    <th>username</th>
    <th>feedback caption</th>
    <th>feedback</th>
  </tr>
  <?php

  $sel = "select * from tbl_feedback f inner join tbl_customer u on f.customer_id=u.customer_id";
  //echo $sel;
  $rows = mysql_query($sel);
  while ($data = mysql_fetch_array($rows)) {

  ?>

    <tr>
      <td><?php echo $data["feedback_date"]; ?></td>
      <td><?php echo $data["customer_name"]; ?></td>
      <td><?php echo $data["feedback_caption"]; ?></td>
      <td><?php echo $data["feedback_description"]; ?></td>



    <?php


  }

    ?>

    </tr>
</table>
</div>
</body>
</html>

