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
		body {
			font-family: arial;
			padding: 0;
			margin:0;
			height:100%;
		}
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

		nav {
			position: fixed;
			left:0;
			top:0;
			height: 2em;
			background-color: #999;
			width: 100%;
			overflow: hidden;
		}
		nav ul {
			list-style-type: none;
			padding:0;
			margin:0;
		}
		nav ul li {
			letter-spacing: 0.2px;
			text-transform: capitalize;
			display: inline-block;
			padding: 0.4em 0.7em;
			cursor: pointer;
		}
		nav ul li:hover {
			transition: 0.3s;
			color: white;
			background-color: #222;
		}
		#nav-clearance {
			height:2em;
		}
		#left-pane {
			float: left;
			width: 60vw;
			border: solid 1px lime;
			padding:0;
		}
		#right-pane {
			float: right;
			border: solid 1px lime;
			width: 38vw;
			padding:0;
		}
		#tasks {
			height: 60vh;
		}
		#recommendations {
			height: 40vh;
		}
		#contents-pane {
			clear:both;
		}
		#calendar {
			height: 40vh;
		}
		#near-events {
			height: 60vh;
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
	<div id="nav-clearance">...</div>
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

	<section id="contents-pane">
		<section id="left-pane">
			<section id="tasks">
				Tasks go here
			</section>
			<section id="recommendations">
				
			</section>
		</section>

		<section id="right-pane">
		
			<section id="calendar">
				
			</section>
			<section id="near-events">
				
			</section>
		</section>
	</section>
</body>
</html>