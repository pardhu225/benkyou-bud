<!DOCTYPE html>
<html>
<head>
	<title>Benkyou-bud - Dashboard</title>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <style>
        html,body {padding:0;margin:0;
            font-family: "arial", sans-serif;}
        #left-pane {
            width: 40vw;
            float: left;
        }
        #right-pane {
            width: 55vw;
            float: right;
        }
        #rec, #cal, #tas, #ev {
            transition: 0.1s;
            box-shadow:0px 5px 15px #aaa;
        }
        #rec:hover, #cal:hover, #tas:hover, #ev:hover {
            transition: 0.1s;
            box-shadow:0px 10px 50px #aaa;
        }
        #control-panel-list {
            list-style-type: none;
            padding-left: 0;
        }
        #control-panel-list li {
            height: 100px;
            width: 100px;
            display: inline-table;
            text-align: center;
            font-size: 1.2em;
            font-weight: 500;
            color: white;
            padding: 0px 10px;
        }
        #control-panel-list li:hover{
            color:bisque;
        }
        #control-panel-list li i {
            font-size: 5em;
        }
        #rec {margin-right: 0px; margin-bottom: 10px; height: 58vh; padding: 10px; background-color: aliceblue; display: block}
        #cal {margin-right: 0px; margin-bottom: 0px; height: 35vh; padding: 10px; background-color: azure;}
        #tas {margin-right: 0px; margin-bottom: 10px; height: 35vh; padding: 10px; background-color: cornsilk;}
        #ev  {margin-right: 0px; margin-bottom: 0px; height: 58vh; padding: 10px; background-color: darkcyan;}
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
                Control Panel
                <div>
                    <ul id="control-panel-list">
                        <li><i class="fa fa-book"></i><br><br><u>C</u>ourses</li>
                        <li><i class="fa fa-file"></i><br><br><u>F</u>ile Dropper</li>
                        <li><i class="fa fa-area-chart"></i><br><br><u>S</u>tatistics</li>
                        <li><i class="fa fa-power-off"></i><br><br>Log out</li>
                    </ul>
                </div>
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