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
		/* Styling for the calendar */
		ul {list-style-type: none;}
		body {font-family: Verdana, sans-serif;}

		/* Month header */
		.month {
		    padding: 2.5em 0px;
		    width: 100%;
		    background: #1abc9c;
		    text-align: center;
		}

		/* Month list */
		.month ul {
		    margin: 0;
		    padding: 0;
		}

		.month ul li {
		    color: white;
		    font-size: 20px;
		    text-transform: uppercase;
		    letter-spacing: 3px;
		}

		/* Previous button inside month header */
		.month .prev {
		    float: left;
		    padding-top: 10px;
		}

		/* Next button */
		.month .next {
		    float: right;
		    padding-top: 10px;
		}

		/* Weekdays (Mon-Sun) */
		.weekdays {
		    margin: 0;
		    padding: 10px 0;
		    background-color:#ddd;
		}

		.weekdays li {
		    display: inline-block;
		    width: 13.6%;
		    color: #666;
		    text-align: center;
		}

		/* Days (1-31) */
		.days {
		    padding: 0px 0;
		    background: #eee;
		    margin: 0;
		}

		.days li {
		    list-style-type: none;
		    display: inline-block;
		    width: 13.6%;
		    text-align: center;
		    margin-bottom: 5px;
		    font-size:12px;
		    color:#777;
		}

		/* Highlight the "current" day */
		.days li .active {
		    padding: 5px;
		    background: #1abc9c;
		    color: white !important
		}
		/* Ending the style for the calendar */
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

		<ul class="days"> 
			<?php
				for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));$i++) {
					echo "<li>";
					if(date("m")===$i) {
						echo "<span class='active'>".$i."</span>";
					} else {
						echo $i;
					}
					echo "</li>";
				}
			?>
		</ul>
	</section>

	<section id="recommendations">
		
	</section>
</body>
</html>