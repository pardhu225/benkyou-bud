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
			display: inline;
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
		<div id="content-container">
			<section class="content-pane" id="left-pane" style="display: inline-block;position: relative;top: 0px;left: 0px">
				<h3>What is Benkyou-bud?</h3>
				<p>
					Benkyou-bud is a automated cloud software with some cool inbuilt features
					like Course management, material sorting, date search and much more.
				</p>
				<h3>What makes it standout?</h3>
				<p>
					<h5>Its features of course</h5>
					You can have your material sorted neat and tidy and with the on the fly search bar
					you can view your material at anytime(literally).<br>
					With one click you can download all the material(in the sorted manner of course!).<br>


				</p>

			</section>
			<section class="content-pane" id="right-pane" style="display: inline-block;">
				You may login from here:
				<div class="form-pane">
					<form action="processlogin.php" method="POST" id="login-form">
						<input type="text" id="username" name="username" placeholder="Username">
						<input type="password" id="password" name="password" placeholder="Password">
						<input type="submit" value="Log in" id="login-button">
					</form>
					<!--
					TODO Put this form else where
					<form action="processsignup.php" method="POST" id="signup-form">
						<input type="text" id="name" name="name" placeholder="Your Name">
						<input type="text" id="username" name="name" placeholder="Your preffered Username">
						<input type="password" id="password" name="password" placeholder="Your password">
						<input type="repassword" id="repassword" name="repassword" placeholder="Your password again">
						<input type="text" id="email" name="email">
						<select name="institute" id="institute">
							TODO complete this php code
							<option></option>
						</select>
						<input type="submit" value="I'm in!">
					</form>
					-->
				</dib>
			</section>
			<div></div>
		</div>
		<footer>
			Designed by: <a href="#">Pardhu</a>
			<div id="footer-icons">
				<a href="#"><img src="img/github-mark.png" style="height: 50px;width: 50px;"></a>
				<a href="#"><img src="img/fbicon.png" style="height: 50px;width: 50px;"></a>
			</div>
		</footer>
	</div>
</body>
</html>