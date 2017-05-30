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
    <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

          
	<style type="text/css">
		body {
			font-family: arial;
			padding: 0;
			margin:0;
			height:100%;
            aoverflow: hidden;
        }
        
        /* style for the navigation bar */
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
        
        /* The styles for the parallax canvas */
        #right-canvas {
			position:absolute;
			top:0;
			right:0;
			z-index: -1;
            background-color: black;
		}
		#left-canvas {
			position: absolute;
			top: 0;
			left:0;
			z-index:-1;
            background-color: black;
		}
        
        #recommendations, #tasks, #calendar,
        #nearest-events{
            height: 100vh;
            background-color: black;
            text-align: center;
            font-size: 2em;
        }
        
        #recommendations, #recommendationsButton {
            color: red;
        }
        #recommendationsButton:hover {
            transition: 0.2s;
            background-color:  rgba(128, 32, 0, 0.5);
        }
        
        #tasks, #tasksButton {
            color: mediumpurple;
        }
        #tasksButton:hover {
            transition: 0.2s;
            background-color: rgba(41, 20, 82,0.5)
        }
        
        #calendar, #calendarButton {
            color: lime;
        }
        #calendarButton:hover {
            transition: 0.2s;
            background-color: rgba(0, 102, 0, 0.5);
        }
        
        #nearest-events {
            color: blue;
        }
        #nearest-eventsButton {
            color: blue;
        }
        #content-pane {
			margin-left:20vw;
			width:60vw;
			margin-right: 20vw;
            background-color: black; 
		}
        #buttons-pane { 
            position: fixed;
            left:70vw;
            top:20vh;
            width:20vw;
        }
        #buttons-pane ul {
            list-style-type: none;
            color:white;
            text-align: center;
        }
        #buttons-pane ul li {
            width: 100% !important;
            font-size: 1.3em;
            cursor: pointer;
            border-left: solid lime 1px ;
            border-bottom: solid lime 1px;
            padding-top: 1em;
            padding-bottom: 1em;
            margin: 20px 0px;
            overflow: hidden;
            border-radius: 10px
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
    
    <canvas width="500px" id="right-canvas"></canvas>

	<canvas width="500px" id="left-canvas"></canvas>
	
    <section id="notification-bar">
		
	</section>
    
    <section id="pagenav">
        
    </section>
    
    <section id="buttons-pane">
        <ul>
            <li id="recommendationsButton" class="waves-effect waves-light">Recommendations</li>
            <li id="calendarButton" class="waves-effect waves-light">Calendar</li>
            <li id="tasksButton" class="waves-effect waves-light">Tasks</li>
            <li id="nearest-eventsButton" class="waves-effect waves-light">Nearest Events</li>
        </ul>
    </section>
    <section id="content-pane">
        
        <section id="recommendations">
        	<div id="nav-clearance">...</div>
            Recommendations go here
        </section>
        <section id="calendar">
            <div id="nav-clearance">...</div>
            Calendar comes here
        </section>
        <section id="tasks">
            <div id="nav-clearance">...</div>
            Tasks go here
        </section>
        <section id="nearest-events">
            <div id="nav-clearance">...</div>
            Nearest events will bedisplayed here
        </section>
    </section>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="js/iparallax.js"></script>
    <script src="js/navigation.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>
</html>