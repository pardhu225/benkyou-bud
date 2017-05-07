<?php

if(!isset($_POST['username']))
{
	header("Location: index.php");
	die();
}

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
$name = $email = $gender = $comment = $website = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
//Password will be of atleast 8 chars
if(strlen($_POST['password'])<8) {
	$passErr = "Password needs to be greater than 8 characters long.";
}

//Password and typed password are different
if($_POST['password']!==$_POST['repassword']) {
  	$passErr = 'Passwords dont match';
  }


  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
  	$arr = str_split($_POST['username']);
	foreach ($arr as $c) {
		if(!ctype_alnum($c) || $c!='_' || $c!='-') {
			$nameErr = "Username can contain only alphanumeric characters or - or _"
		}
	}
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
    $comment = test_input($_POST["institute"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup - Benkyou Bud</title>
</head>
<body>
	<section id="form-pane">
		<h2>Create an account</h2>
		<form action="processsignup.php" method="POST">
			<div class="input-block">
				Your preferred username: <input type="text" id="username" name="username" value="<?php echo $name;?>">
				<span class="err-msg"><?php echo $nameErr; ?></span>
			</div>
			<div>
				Password: <input type="password" id="password" name="password" value="<?php echo $password;?>">
				<span class="err-msg"><?php echo $passErr; ?></span>
			</div>
			<div>
				Institute of Study: <input type="text" id="institute" name="institute" value="<?php echo $institute;?>">
				<span class="err-msg"><?php echo $instiErr; ?></span>
			</div>
			<div>
				Gender:
				<input type="radio" value="male" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>>Male <br>
				<input type="radio" value="female" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>>Female<br>
				<input type="radio" value="trans" name="gender" <?php if (isset($gender) && $gender=="trans") echo "checked";?>>Trans-gender <br>
				<span class="err-msg"><?php echo $genderErr; ?></span>
			</div>
		</form>
	</section>
</body>
</html>
