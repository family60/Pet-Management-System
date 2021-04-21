<?php
session_start();
?>
<html>
	<head>
	<style>
	body
	{
	background-image: url("https://storage.googleapis.com/pr-newsroom-wp/1/2020/01/Spotify_Pets_Header_final.jpg");
	background-position: center;
	background-size: cover;
	background-repeat: no-repeat;
	margin: right;
	border-style: double;
}
	p 
	{
		text-align:center;
	}
	div 
	{
		
		text-align:center;
	}
	h1 { color: #CEF0D4; 
	font-family: 'Rouge Script', cursive; 
	font-size: 130px; 
	font-weight: normal; 
	line-height: 48px; 
	margin: 50px; 
	text-align: center; 
	text-shadow: 1px 1px 2px #082b34; 
	}
	input[type=text] 
	{
  border: 2px solid blue;
  border-radius: 4px;
  display: inline-block;
}
input[type=submit] {
  background: #222;
  height: 50px;
  min-width: 150px;
  border: 2px solid blue;
  border-radius: 10px;
  color: #eee;   
}
table {
	margin-left: auto;
	margin-right: auto;
}

	</style>
	</head>
	
	<body>

<header>
<h1>The Pets Management</h1>

</header>
										<!--Form-->
	<form method="POST" action= "<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
	<!-- Input Tags for PetId, PetName, Breed, DoB, Category, Sold -->
	<p id= "petid"><input type="text" name="pet_Id" Placeholder="Pet Id"/></p> 
	<div><input type="submit" name="search" value="search"/><div>
	<p><input type="text" name="pet_Name" placeholder ="Pet Name" /></p>
	<p><input type="text" name="breed" placeholder="Breed" /></p>
	<p><input type="text" name="DoB" placeholder="DateOfBirth" /></p>
	<p><input type="text" name="category" placeholder="Category" /></p>
	<p><input type="text" name="sold" placeholder="Status" /></p>
	<!-- Buttons For Insert, Update, Delete -->
	<br><br><br><br><br><br>
	<div>
		<input type="submit" name="insert" value="Insert"/> 
		<input type="submit" name="update" value="Update"/> 
		<input type="submit" name="delete" value="Delete"/>
	</div>
	<div><input type="submit" name="Back" value= "Selection Page"/></div>
<?php
//Server Join
$servername = "localhost";
$username = "root";
$password = "";
//So when creating table it will tell put the table in this database
$dbname="Pet_Store_Db";
//Create Connection
$conn=mysqli_connect($servername,$username,$password,$dbname);

$pet_Id="";
$pet_Name="";
$breed="";
$DoB="";
$category="";
$sold="";

$Success="";

if (isset($_POST['pet_Id']))
{
	$pet_Id = $_POST['pet_Id'];
};

if (isset($_POST['pet_Name']))
{
	$pet_Name = $_POST['pet_Name'];
};

if (isset($_POST['breed']))
{
	$breed = $_POST['breed'];
};

if (isset($_POST['DoB']))
{
	$DoB = $_POST['DoB'];
};

if (isset($_POST['category']))
{
	$category = $_POST['category'];
};

if (isset($_POST['sold']))
{
	$sold = $_POST['sold'];
};

if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		//If Search Button pressed it would run the sql query
		if(isset ($_POST['search']))
		{
			$sql="select pet_Id, pet_Name, breed, DoB, category, sold from pets_Table where pet_Id = ('$pet_Id') or category = ('$category'); ";
			$results=mysqli_query($conn,$sql);
		
			if(mysqli_num_rows($results)>0)
			{
				while($row=mysqli_fetch_assoc($results))
				{
					$pet_Id = $row["pet_Id"];
					$pet_Name = $row["pet_Name"];
					$breed = $row["breed"];
					$DoB = $row["DoB"];
					$category = $row["category"];
					$sold = $row["sold"];
					
					echo "<table border= 1><tr><th>PetId</th><th>PetName</th><th>Breed</th><th>DateOfBirth</th><th>Category</th><th>Sold</th></tr>";
					echo "<tr>";
					echo "<th>";
					echo "$pet_Id";
					echo "</th>";
					echo "<th>";
					echo "$pet_Name";
					echo "</th>";
					echo "<th>";
					echo "$breed";
					echo "</th>";
					echo "<th>";
					echo "$DoB"; 
					echo "</th>";
					echo "<th>";
					echo "$category";
					echo "</th>";
					echo "<th>";
					echo "$sold";
					echo "</th>";
					echo "</tr>";
				}
			}
			else
			{
				$Success = "No results to display:	".mysqli_error($conn);
			}
		}
		
		if (isset($_POST['insert'])) 
		{
        $sql = "insert into pets_Table (pet_Id, pet_Name, breed, DoB, category, sold) values 
		('$pet_Id','$pet_Name', '$breed','$DoB', '$category', '$sold');";
        if(mysqli_query($conn,$sql))
		{
            $Success = "Pet Information Inserted Successfully" . "<br>";
        }
			else
			{
				$Sucess= "Error in Insertion: ".mysqli_error($conn);
			}
		}
		if(isset($_POST["update"]))
		{
			$sql = "update pets_Table set pet_Id = '$pet_Id',
				pet_Name = '$pet_Name', breed = '$breed', DoB = '$DoB', category = '$category', sold='$sold' 
				where pet_Id = ('$pet_Id');";
			if(mysqli_query($conn,$sql))
			{
				// Will Output Information
				$Success = "Updated Successfully" . "<br>";
			}
			else
			{
				// Will Output Information
				$Success = "Error while Updating: ".mysqli_error($conn);
			}
		}
		if(isset($_POST["delete"]))
		{
			$sql = "delete from pets_Table where pet_Id = ('$pet_Id');";
			if(mysqli_query($conn,$sql))
			{
				$Success = "Deleted Succesfully" . "<br>";	
			}
			else
			{
				$Success = "Error while deleting: ".mysqli_error($conn);
			}
		}	
		mysqli_close($conn);
	}
	

?>
	</form>

<?php
echo $Success;
?>


	</body>
</html>