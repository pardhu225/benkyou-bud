<!DOCTYPE html>
<html>
<head>
	<title>Benkyou-bud - Dashboard</title>    
    <style>
        #left-pane {
            display:inline-block;
            width: 40vw;
            float: left;
        }
        #right-pane {
            display: ;
            width: 50vw;
            float: left;
        }
        #rec {
            height: 60vh;
            background-color: aliceblue;
        }
        #cal {height: 40vh;background-color: azure;}
        #tas {height: 40vh; background-color: cornsilk}
        #ev {height: 60vh; background-color:darkcyan}
    </style>
</head>
<body>
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
    <section>
        <ul>
            <li>Nearest Events</li>
            <li>Calendar</li>
            <li>Tasks</li>
            <li>Recommendations</li>
        </ul>
    </section>
    <section>
        <div id="left-pane">
            <div id="rec">
                Recommendations go here
            </div>
            <div id="cal">
                Calendar comes here
            </div>
        </div>
        <div id="right-pane">
            <div id="tas">
                Tasks go here
            </div>
            <div id="ev">
                Nearest events will bedisplayed here
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    
</body>
</html>
<!--
    What should go into the dashboard?
    Everyday tasks that users perform the most
        go to specific course
        go to 
    Near events in the calendar
    Notifications about the events
    Depending upon the nearest event show the most relevant subject
-->