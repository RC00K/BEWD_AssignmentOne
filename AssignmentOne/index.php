<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/main.css"/>
	<title>GET Parameter Assignment</title>
</head>
<body>
<?php
// Stops attacks from XSS
htmlspecialchars($_GET['firstname']);
htmlspecialchars($_GET['lastname']);
htmlspecialchars($_GET['age']);

// Sanitize the script
$firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
$age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_STRING);

if(isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['age'])) {
  $firstname = $_GET['firstname'];
  $lastname = $_GET['lastname'];
  $age = $_GET['age'];
  if(!empty($firstname) || !empty($lastname) || !empty($age)) {
    htmlspecialchars($firstname);
    htmlspecialchars($lastname);
    htmlspecialchars($age);
  } else {
    "Missing Data";
  }
} else {
	"Not Set";
}
?>

<div class="container" id="container">
			<div class="form-container log-in-container">
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="register">
					<h1>~ WELCOME ~</h1>
					<br>
					<label for="first">FIRST NAME</label>
					<input type="text" name="firstname" id="first" required autocomplete="off"/>

					<label for="last">LAST NAME</label>
					<input type="text" name="lastname" id="last" required autocomplete="off"/>

					<label for="age">AGE</label>
					<input type="number" name="age" id="age" required autocomplete="off"/>

					<button type="submit" class="submit-btn">SUBMIT</button>
				</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<p>
						<?php
							print 'Hello, my name is ' . htmlspecialchars($firstname) . ' ' . htmlspecialchars($lastname);
						?>
					</p>
					<p>
						<?php

							if($age >= 18) { 
								print 'I am ' . htmlspecialchars($age) . ' years and old enough to vote in the United States.';
							} else {
								print 'I am ' . htmlspecialchars($age) . ' years old and not old enough to vote in the United States.';
							}
						?>
						</p>
						<p>
							<?php 
								print 'I am ' . 365 * $age . ' days old.';
							?>
						</p>
					<h2>
						<?php 
							print date('m-d-y');
						?>
					</h2>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
