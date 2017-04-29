
<?php
//set my title
$title = 'PHP HW';
//set header
$header = 'Create Invoice';
/*
 * include start structure
 */
include('../Structure/Header.php');

/*
 * 
 * padding left breaks add invoice form
 * 
 * css wont link externally
 * 
 * 
 * Write a simple web application in PHP and MySQL using PHP Data Objects
 *  that allows a company to enter invoice items. The web application has 
 *  two tables, invoiceheader and invoicedetails. 
 *  
 *  The invoiceheader table 
 *  has information about the invoice number and the customer name only 
 *  
 *  while the invoicedetails table has information about the description, 
 *  quantity and price only for multiple items related to the invoice 
 *  number.

 * The web application should create the invoices database and the two 
 * tables mentioned above. 
 */


// invoice header = invoice number + customer name.

// invoice details =  description + quantity + price

//$errors = 0;

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


?>
	<form action= method="POST">

		<h3>Team</h3>
		Team ID:<br><input type="text" name="teamId"  id="teamId"  value="">
		Team Name:<br><input type="text" name="teamName"  id="teamName"  value="">
		Team Manager:<br><input type="text" name="teamManager" id="teamManager" value="">
	 		<input type="submit" name = "createTeam" value="Add Team">
	 
	 </form>
	 
	 
 	<form action= method="POST">
 
		<h3>Driver</h3>
		Driver Name:<br><input type="text" name="driverName" id="driverName" value="">
		Date of birth:<br><input type="text" name="driverDOB" id="driverDOB" value="">

	<form/>
<?

if(isset($_POST['teamId']) && (isset($_POST['teamName']) && isset($_POST['teamManager']) && isset($_POST['createTeam']))){
	
$teamId = $_POST['teamId'];
$teamName = $_POST['teamName'];
$teamManager = $_POST['teamManager'];



	
	/*
	 * Team TableTeam TableTeam TableTeam TableTeam Table
	 * Team TableTeam TableTeam TableTeam TableTeam Table
	 * Team TableTeam TableTeam TableTeam TableTeam Table
	 * Team TableTeam TableTeam TableTeam TableTeam Table
	 */
	$query = "CREATE TABLE Team (TeamID VARCHAR(30) NOT NULL PRIMARY KEY ,TeamName VARCHAR(40) NOT NULL, TeamManager VARCHAR(40) NOT NULL)";
	
	
	$db->exec($query);
	
	
	$query = "INSERT INTO Team VALUES ('$teamId', '$teamName', '$teamManager')";
	
	$db->exec($query);
	?>
	
	<?php
	
	
	/*
	 * Driver tableDriver tableDriver tableDriver tableDriver table
	 * Driver tableDriver tableDriver tableDriver tableDriver table
	 * Driver tableDriver tableDriver tableDriver tableDriver table
	 */
	
	if(isset($_POST['driverId']) && isset($_POST['driverName']) && isset($_POST['driverDob'])){
		$driverId= $_POST['driverId'];
		$driverName = $_POST['driverName'];
		$driverDob= $_POST['driverDob'];
		
	}

	$query = "CREATE TABLE Driver (DriverID VARCHAR(30) NOT NULL PRIMARY KEY ,DriverName VARCHAR(40) NOT NULL, DriverDOB VARCHAR(40) NOT NULL)";
	
	
	$db->exec($query);

	$query = "INSERT INTO Driver VALUES ('$driverId', '$driverName', '$driverDob')";
	
	$db->exec($query);
	
	/*
	 * Team driver tableTeam driver tableTeam driver tableTeam driver table
	 * Team driver tableTeam driver tableTeam driver tableTeam driver table
	 * Team driver tableTeam driver tableTeam driver tableTeam driver table
	 * Team driver tableTeam driver tableTeam driver tableTeam driver table
	 */
	
	$query = "CREATE TABLE TeamDriver ( TeamID VARCHAR(30) NOT NULL,DriverID VARCHAR(30) NOT NULL, FOREIGN KEY (TeamID) REFERENCES Team (TeamID), FOREIGN KEY (DriverID) REFERENCES Driver (DriverID));";
	
	
	$db->exec($query);
	
	$query = "INSERT INTO Driver VALUES ('$teamId', '$driverId')";
	
	$db->exec($query);

}
?>
<div id = "AddInvoice">


</div> 

<!--  
New form
new form
new form 
-->
<form name="raceInfo" method="POST" action="#">
				<fieldset>
					<legend>Race Info</legend>
					Race ID: <input type="text" name="raceId1" id="raceId1"/><br>
					Race Name: <input type="text" name="raceName" id="raceName"/><br>
					Race Location: <input type="text" name="raceLocation" id="raceLocation"/><br>
					Race Date: <input type="text" name="raceDate" id="raceDate"/><br>
					<input type="submit" name="raceForm" id="raceForm" value="Submit Race">
				</fieldset>
			<form>
		
<?php 
if (isset($_POST['raceId1'])){
	$raceID = $_POST['raceId1'];
}
if (isset($_POST['raceName'])){
	$raceName = $_POST['raceName'];
}
if (isset($_POST['raceLocation'])){
	$raceLocation= $_POST['raceLocation'];
}
if (isset($_POST['raceDate'])){
	$raceDate= $_POST['raceDate'];
}

if (isset($_POST['raceId1']) && isset($_POST['raceName']) && isset($_POST['raceLocation'])&& isset($_POST['raceDate']) &&isset($_POST['raceForm'])){
	
	//Make insert statement
	//Make insert statement
	//Make insert statement
	//Make insert statement
	//Make insert statement
	//Make insert statement
	//Make insert statement
	
	
	$query = "CREATE TABLE Race (RaceID VARCHAR(30) NOT NULL PRIMARY KEY , RaceName VARCHAR(30) NOT NULL, RaceLocation VARCHAR(30) NOT NULL, RaceDate VARCHAR(30) NOT NULL);";
	
	$db->exec($query);
}
?>
	<form name="raceParticipant" method="POST" action="#">
				<fieldset>
					<legend>Race Participant</legend>
				 	Race ID: <input type="text" name="raceId2" id="raceId2"/><br>
					Team ID: <input type="text" name="teamId" id="teamId"/><br>
					Driver ID: <input type="text" name="driverId" id="driverId"/><br>
					Position Finished: <input type="text" name="positionFinished" id="positionFinished"/><br>
					<input type="submit" name="participantForm" id="participantForm" value="Submit Participant">
				</fieldset>
			<form>
<?php 

/*
 * Race participants
 * creat this table if
 * reace table exists
 * 
 */
if (isset($_POST['positionFinished']) && isset($_POST['participantForm'])&& isset($_POST['raceId2'])&& isset($_POST['teamId'])&& isset($_POST['driverId'])){
	$raceDate= $_POST['positionFinished'];
	
	$raceId2= $_POST['raceId2'];
	
	$teamId= $_POST['teamId'];
	
	$driverId= $_POST['driverId'];
	
	
$query = "CREATE TABLE RaceParticipant (
	RaceID VARCHAR(30) NOT NULL,
	TeamID VARCHAR(30) NOT NULL,
	DriverID VARCHAR(30) NOT NULL,
	PositionFinished varchar(30),
	FOREIGN KEY (RaceID) REFERENCES Race(RaceID),
	FOREIGN KEY (TeamID) REFERENCES Team(TeamID),
	FOREIGN KEY (DriverID) REFERENCES Driver(DriverID)
);";

$db->exec($query);

$query = "INSERT INTO RaceParticipant VALUES ('$raceID','$raceName','$raceLocation','$raceDate')";
 
}
?>


<?php


echo '<br>';
/*
 * include end structure
 */
include('../Structure/Footer.php');


?>