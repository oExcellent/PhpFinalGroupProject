	 <?php 
	 $dsn = 'mysql:host=localhost;dbname=racing';
	 $username = 'uno';
	 $password = '';
	 
	 // creates PDO object
	 try {
	 	$db = new PDO($dsn, $username, $password);
	 	//echo '<p>You are connected to the database!</p>';
	 	
	 } catch (PDOException $e) {
	 	$error_message = $e->getMessage();
	 	echo "<p>An error occurred while connecting to the database: $error_message </p>";
	 }

$title = 'PHP HW';
//set header
$header = 'Create Invoice';
/*
 * include start structure
 */
include('../Structure/Header.php');
	?>
	
	<form action= method="POST">
		<h3>Race</h3>
		Race name:<br><input type="text" name="raceName"  id="raceName"  placeholder="Race name..">
	 		<input type="submit" name = "searchRace" value="Search Race">
	 </form>

<?php

if (isset($_POST['raceName']) && isset($_POST['searchRace'])){
	$race = $_POST['raceName'];
	
	$query = 'SELECT * FROM ';
}

echo '<br>';
/*
 * include end structure
 */
include('../Structure/Footer.php');


?>