<?php
session_start();
if(!isset($_SESSION['UserID']))
{
	//header("Location: ../index.php?err=2");
	//die();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Benkyou-bud - Dashboard</title>
	<style type="text/css">
		/* Animations for the calendar alerts */
		@keyframes alert{
			85% {
				font-size:20px;
			}
		}

		.days .alert {
			animation-duration: 1.8s;
			animation-iteration-count: infinite;
			animation-name: alert;
			position: relative;
		}
	</style>
</head>
<body>
	<!--
		What should go into the dashboard?

		Everyday tasks that users perform the most
			go to specific course
			go to 
		Near events in the calendar
		Notifications about the events
		Depending upon the nearest event show the most relevant subject

	-->
	<nav>
		<ul>
			<li>Go to courses</li>
			<li>DropScreen</li>
			<li>Manage My Account</li>
			<li>Statistics</li>
			<li>About</li>
			<li>Contact Us</li>
			<li>Some other menu item</li>
		</ul>
	</nav>

	<section id="notification-bar">
		
	</section>

	<section id="near-events">
		
	</section>

	<section id="calendar">
		<div class="month"> 
		  <ul>
		    <li class="prev">&#10094;&#10094;</li>
		    <li class="next">&#10095;&#10095;</li>
		    <li>
		        <?php 
		        	switch (date("m")) {
		        		case 1:echo "JANUARY";break;
		        		case 2:echo "FEBRUARY";break;
		        		case 3:echo "MARCH";break;
		        		case 4:echo "APRIL";break;
		        		case 5:echo "MAY";break;
		        		case 6:echo "JUNE";break;
		        		case 7:echo "JULY";break;
		        		case 8:echo "AUGUST";break;
		        		case 9:echo "SEPTEMBER";break;
		        		case 10:echo "OCTOBER";break;
		        		case 11:echo "NOVEMBER";break;
		        		case 12:echo "DECEMBER";break;
		        	}
		        ?><br>
		      <span style="font-size:18px"><?php echo date("Y");?></span>
		    </li>
		  </ul>
		</div>

		<ul class="weekdays">
		  <li>Mo</li>
		  <li>Tu</li>
		  <li>We</li>
		  <li>Th</li>
		  <li>Fr</li>
		  <li>Sa</li>
		  <li>Su</li>
		</ul>

		
	</section>

	<section id="recommendations">
		
	</section>
</body>
</html>