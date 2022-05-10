<?php
	include "connection.php";
	
	if ($con = openCon())
		echo "Connected successfully.";
	
	mysqli_query($con, 'DROP TABLE IF EXISTS JokeSuggestions;');
	
	$sql = "CREATE TABLE JokeSuggestions(";
	$sql .= "id INT AUTO_INCREMENT, PRIMARY KEY (id),";
	$sql .= "FirstName VARCHAR(26),";
	$sql .= "LastName VARCHAR(26),";
	$sql .= "Email VARCHAR(64),";
	$sql .= "JokeQuestion VARCHAR(100),";
    $sql .= "JokeAnswer VARCHAR(100),";
    $sql .= "CreationDate DATETIME";
	$sql .= ");";
	
	if (mysqli_query($con, $sql)) {
		echo "Table created.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	
	//TODO: Load resetscript
	$sql = "INSERT INTO JokeSuggestions (FirstName, LastName, Email, JokeQuestion, JokeAnswer, CreationDate) VALUES ";
	$sql .= "('Luke', 'Nielson', 'lukesmail@gmail.com', 'What did one pirate say to the other when he beat him at chess?', 'Checkmatey.', '2022-05-01 09:53:05'),";
	$sql .= "('JOD', NULL, 'jodsmail@gmail.com', 'I broke my arm in two places.', 'My doctor told me to stop going to those places.', '2022-05-02 11:32:53'),";
	$sql .= "('Emma', 'Anderson', 'emmasmail@gmail.com', 'I used to work at a soft drink can crushing company...', 'it was soda pressing.', '2022-04-29 08:35:22'),";
	$sql .= "('Parker', 'Anderson', 'parkersmail@gmail.com', 'What kind of music do astronauts listen to?', 'Neptunes.', '2022-04-28 12:53:12'),";
	$sql .= "('Daryl', 'Anderson', 'darylsmail@gmail.com', 'Rest in peace, boiled water.', 'You will be mist.', '2022-04-29 09:45:33'),";
	$sql .= "('Parker', 'Anderson', 'parkersmail@gmail.com', 'Whats Forrest Gumps password?', '1forrest1', '2022-04-30 10:23:59'),";
	$sql .= "('Carson', 'Swain', 'carsonsmail@gmail.com', 'Spring is here!', 'I got so excited I wet my plants!', '2022-04-28 11:23:50'),";
	$sql .= "('JOD', NULL, 'jodsmail@gmail.com', 'Dont trust atoms.', 'They make up everything!', '2022-04-28 12:45:32'),";
	$sql .= "('Connor', 'Snow', 'connorsemail@gmail.com', 'Why couldnt the bike standup by itself?', 'It was two tired.', '2022-04-29 10:12:32'),";
	$sql .= "('Parker', 'Anderson', 'parkersmail@gmail.com', 'I made a pencil with two erasers.', 'It was pointless.', '2022-05-01 09:53:12');";
	
	if (mysqli_query($con, $sql)) {
		echo "Review submitted successfully.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	
	closeCon($con);
?>