<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">

  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Rental Services-Admin</title>

  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="form.css">

  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

</head>

<body>
  <section id="container">
   
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
     
      <a href="index.html" class="logo"><b>Rental<span>Services</span></b></a>
     
          
        </ul>
       
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../index.php">Logout</a></li>
        </ul>
      </div>
    </header>
   <aside>
      <div id="sidebar" class="nav-collapse ">
    
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="img/favicon1.png" class="img-circle" width="80"></p>
          <h5 class="centered">Admin</h5>
          <li class="mt">
            <a class="active" href="index.html">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-location-arrow "></i>
              <span>Location</span>
              </a>
            <ul class="sub">
              <li><a href="State.php">State</a></li>
              <li><a href="District.php">District</a></li>
              <li><a href="Place.php">Place</a></li>
             
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-plane"></i>
              <span>Trip</span>
              </a>
            <ul class="sub">
              <li><a href="Tripdetails.php">Trip Details</a></li>
              <li><a href="ViewBookings.php">View Booking</a></li>
              <li><a href="ViewvBooking.php">View Vehicle Booking</a></li></ul>
              
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-car"></i>
              <span>Vehicle</span>
              </a>
            <ul class="sub">
              <li><a href="AddVehicle.php">Add Vehicle</a></li>
              <li><a href="Vehicletype.php">Vehicle Type</a></li>
              
              
            </ul>
          </li>

            
            
              <li><a href="Feedback.php">Feedback</a></li>
              
              
         
      </div>
    </aside>



    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Rental Services</strong>. All Rights Reserved
        </p>
       
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer><br><br><br><br><br><br>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
