<?php SESSION_START()?>
<html>
	<head>
		<h1> Pet Management System </h1>
		<style>
			h1{
				text-align: center;
				font-family: Impact, Charcoal, sans-serif;
				font-size: 50px;
			}
			body{
				background-image: url("pets.jpg");
				border-style: double;
				text-align: center;
			}
			b{
				font-style: Impact, Charcoal, sans-serif;
				font-size: 24px;
			}
			input[type=text] {
  				border: 3px solid #24B2F4;
  				border-radius: 4px;
			}
		</style>
	</head>
	<body>
		<?php
		//variables to hold the text field data of username and password of the form
			$u = $_POST["username"];
			$p = $_POST["password"];
		//upon the request of the POST method, check to see if the username and password fields are valid, if they are, go to selection page, if not, output standard error message
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				if(($u == "Eren Yeager") && ($p == "Freedom")){
					header('Location: http://localhost/selectionPage.php');
            		exit();
				} else{
					$msg = "Every required field must be filled in and correct in order to successfully log in as Admin";
					echo "<script type='text/javascript'>alert('$msg');</script>";
				}
			}
		?>
		<!-- form that contains text fields for username and password and submit button-->
		<form action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" method = "POST">
			<p> <b>Username: <input type = "text" name = "username"> (required)</b></p>
			<br/>
			<p> <b>Password: <input type = "text" name = "password"> (required)</b></p>
			<br/>
			<input type = "submit" name = "submit" value = "Log in"> 
		</form>
	</body>
</html>