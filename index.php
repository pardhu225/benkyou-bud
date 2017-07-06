<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.main-container {
			padding-left: 15%;
			padding-right: 15%;
			box-shadow: 5px 5px black 3px;
		}
		.content-pane {
			padding:0	em;
		}
		#login-button {
			color: white;
			border-radius: 5px;
			background-color: blue;
		}
		#left-pane {
			min-width: 60%;
			max-width: 60%;
		}
		#right-pane {
			min-width: 30%;
			max-width: 30%;
		}
		.content-container:after {
			clear: left;
			content: "";
		}
		body {
			padding: 0px;
			margin:0px 10%;
			font-family: sans-serif;
		}
		#left-pane {
			padding:0.7em 0.3em;
		}
		#right-pane {
			padding-left: 0.5em;
			border-left: solid 2px violet;
		}
		footer {
			text-align: center;
			padding-top: 2em;
			border-top: solid 2px violet;
		}
		input[type=text], input[type=password] {
			height: 1.9em;
			padding-left: 5px;
		}
	</style>
</head>
<body>
	<div id="main-container">
		<section id="welcome-banner">
			<img src="img/banner.jpg">
		</section>
		<section id="err-box">
			<?php 
				if(isset($_GET['err']))
				switch ($_GET['err']) {
					case 5:
						echo "You have successfully created an account. You may login now.";
						break;
					
					case 1:
						echo "Invalid username or mismatching passwords.";
						break;
						
					default:
						# code...
						break;
				}
			?>
		</section>
		<div id="content-container">
			<aside class="content-pane" id="left-pane" style="float:left;position: relative;">
				<h2>What is Benkyou-bud?</h2>
				<p>
					Benkyou-bud is a automated cloud software with some cool inbuilt features
					like Course management, material sorting, date search and much more.
				</p>
				<h2>What makes it standout?</h2>
				<p>
					<h5>Its features of course</h5>
					You can have your material sorted neat and tidy and with the on the fly search bar
					you can view your material at anytime(literally).<br>
					With one click you can download all the material(in the sorted manner of course!).<br>
				</p>
			</aside>
			<aside class="content-pane" id="right-pane" style="float:right; position: relative;">
				You may login from here:
				<div class="form-pane">
					<form action="processlogin.php" method="POST" id="login-form">
						<input type="text" id="username" name="username" placeholder="Username">
						<input type="password" id="password" name="password" placeholder="Password">
						<input type="submit" value="Log in" id="login-button">
					</form>
				</div>
			</aside>
		</div>
		<footer style="clear:both;">
			Designed by: <a href="#">Pardhu</a>
			<div id="footer-icons">
				<a href="#"><img src="img/github-mark.png" style="height: 50px;width: 50px;"></a>
				<a href="#"><img src="img/fbicon.png" style="height: 50px;width: 50px;"></a>
			</div>
		</footer>
	</div>
</body>
</html>