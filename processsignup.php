<?php


//Validate the data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Verify email
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $passErr = $instiErr = "";
$name = $email = $gender = $institute = $password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
//Password will be of atleast 8 chars
if(strlen($_POST['password'])<8) {
	$passErr = "Password needs to be atleast 8 characters long.";
  } else if($_POST['password']!==$_POST['repassword']) {
  	$passErr = 'Passwords dont match';
  } else {
  	$password = $_POST['password'];
  }


  if (empty($_POST["username"])) {
    $nameErr = "Name is required";
  } else {
	$name = $_POST['username'];
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["institute"])) {
    $instiErr = "Institute Required";
  } else {
    $institute = test_input($_POST["institute"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if(!($nameErr || $emailErr || $instiErr || $passErr || $genderErr)) {
	$conn = new mysqli("127.0.0.1","root","","db");
	mkdir("users/".$_POST['username']);
	mkdir("users/".$_POST['username']."/courses");
	$events = fopen("users/".$_POST['username']."/events.xml","w");
	$conn->query("INSERT INTO users (username,password,email,gender) VALUES ('$name','$password','$email','$gender')");
	if($conn->errno!==0)
	{
		header("Location: index.php?err=DBQueryError");
		die();
	}
	header("Location: index.php?err=5");
  }
}




?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup - Benkyou Bud</title>
	<style type="text/css">
		body {
			font-family: arial;
		}
		#left-pane {
			float: left;
			text-align: right;
			width:60%;
			padding-right:0.5em;
			border-right: solid 1px purple;
		}
		.err-msg{
			padding:0.1em 0;
			color:red;
			height: 1.5em;
			font-size: 1em;
		}
		.input-block {
			height:1.5em;
			padding:0.1em 0;
			overflow: 
		}
		form input[type="text"],form input[type="password"] {
			height: 1.5em;
		}
		#right-pane {
			float:right;
		}
	</style>
</head>
<body>
	<section id="form-pane">
		<h2>Create an account</h2>
		<form action="processsignup.php" method="POST">
			<div id="left-pane">
				<div class="input-block">
					Your preferred username: <input type="text" id="username" name="username" value="<?php echo $name;?>">
				</div>
				<div class="input-block">
					Password: <input type="password" id="password" name="password">
				</div>
				<div class="input-block">
					Password again: <input type="password" id="repassword" name="repassword">
				</div>
				<div class="input-block">
					Institute of Study: <input type="text" id="institute" name="institute" value="<?php echo $institute;?>">
				</div>
				<div class="input-block">
					Email address: <input type="text" id="email" name="email" value="<?php echo $email;?>">
				</div>

				<div class="input-block">
					Gender:
					<input type="radio" value="male" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>>Male
					<input type="radio" value="female" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>>Female
					<input type="radio" value="trans" name="gender" <?php if (isset($gender) && $gender=="trans") echo "checked";?>>Trans-gender
				</div>
				<div class="input-block">
					<input type="submit" name="Submit" value="Submit">
				</div>
			</div>
			<div id="right-pane">
				<div class="err-msg">*<?php echo $nameErr; ?></div>
				<div class="err-msg">*<?php echo $passErr; ?></div>
				<div class="err-msg">*<?php echo $passErr; ?></div>
				<div class="err-msg">*<?php echo $instiErr; ?></div>
				<div class="err-msg">*<?php echo $genderErr; ?></div>
			</div>
		</form>
	</section>
</body>
</html>
