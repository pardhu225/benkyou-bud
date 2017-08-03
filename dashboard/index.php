<!DOCTYPE html>
<html>
<head>
	<title>Benkyou-bud - Dashboard</title>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <style>
        #cal ul {
            width: 100%;
            padding: 0;
        }
        #cal ul li {
            display: inline-block;
            width: 10%;
        }
        html,body {padding:0;margin:0;
            font-family: "arial", sans-serif;}
        #left-pane {
            width: 41vw;
            float: left;
        }
        #right-pane {
            width: 57vw;
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
            margin:15% 15%;
            margin-top: 20%;
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
            margin: 0% 1%;
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
        #cal table tbody tr td:first-of-type, #cal table tbody tr th:first-of-type {
            color:red;
        }
        #cal table tbody tr td {
            text-align: center;
            font-size: 1.2em;
        }
        #cal table {
            width: 100%;
            height: 100%;
        }
        #file-dropper {
            display: none;
            position: absolute;
            left:20%;
            right:20%;
            top:20%;
            bottom: 20%;
        }
        #file-dropper iframe {
            width:100%;
            height:100%;
        }
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
               <table>
                   <tbody id="calendar-table"></tbody>
               </table>
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
    <div id="file-dropper"></div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        var getWeek = function(day) {
            switch(day)
            {
            case 0: return "Sun";
            case 1: return "mon";
            case 2: return "tue";
            case 3: return "wed";
            case 4: return "thu";
            case 5: return "fri";
            case 6: return 'sat';
            }
        };
        var getMonthArray = function(m){
            var d = new Date();
            var months = [31,(d.getFullYear()%4===0)?29:28,31,30,31,30,31,31,30,31,30,31];
            d = new Date(d.getFullYear(),((typeof m) ==="undefined")?d.getMonth():m,1,0,0,0,0);
            var arr = [];
            var w = d.getDay();
            for(var i=0;i<d.getDay();i++)
                arr.push(-1);
            for(var i=0;i<months[d.getMonth()];i++)
                arr.push(i+1);
            while(arr.length%7!==0)
                arr.push(-1);
            return arr;
        };
        var arr = getMonthArray();
        var str = "<tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr>";
        str += "<tr>";
        for(var i=1;i<=arr.length;i++) {
            str+=("<td"+(arr[i-1]!==-1?" id='cal-"+arr[i-1]+"'":"")+">"+(arr[i-1]===-1?" ":arr[i-1])+"</td>");
            if(i%7===0) {
                console.log(i+" value");
                str+="</tr><tr>";
            }
        }
        str+="</tr>";
        document.getElementById("calendar-table").innerHTML=str;
        $("#file-dropper").html("<iframe src='sand.html'></iframe>");
    </script>

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
