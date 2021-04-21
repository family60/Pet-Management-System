<?php SESSION_START()?>
<html>
	<head>
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
			input[type=text] {
  				border: 3px solid #24B2F4;
  				border-radius: 4px;
			}
		</style>
	</head>
	<h1> Where would you like to go? </h1>
	<body>
		<?php
		//upon the server's request of the POST method, check to see which button is pressed, then send the Admin to the corresponding webpage
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				if($_POST["customers"]){
					header('Location: http://localhost/fileNameForCustomersTable.php');
					exit();
				}else if($_POST["pets"]){
					header('Location: http://localhost/fileNameForPetsTable.php');
					exit();
				}else if($_POST["soldPets"]){
					header('Location: http://localhost/fileNameForSoldPetsTable.php');
					exit();
				}
			}
		?>
		<!-- form that contains three buttons, each take the Admin to their corresponding webpages -->
		<form action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" method = "POST">
			<p><input type = "submit" name = "customers" value = "Customers Table"></p>
			<p><input type = "submit" name = "pets" value = "Pets Table"></p>
			<p><input type = "submit" name = "soldPets" value = "Sold Pets Table"></p>
		</form>
	</body>
</html>