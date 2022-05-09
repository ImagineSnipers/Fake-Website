<?php
	include "connection.php";
	
	if ($con = openCon())
		echo "Connected successfully.";
	
	mysqli_query($con, 'DROP TABLE IF EXISTS Comments;');
	
	$sql = "CREATE TABLE Comments(";
	$sql .= "id INT AUTO_INCREMENT, PRIMARY KEY (id),";
	$sql .= "FirstName VARCHAR(26),";
	$sql .= "LastName VARCHAR(26),";
	$sql .= "Email VARCHAR(64),";
	$sql .= "JokeQuestion VARCHAR(100),";
    $sql .= "JokeAnswer VARCHAR(100),";
    $sql .= "Date DATETIME";
	$sql .= ");";
	
	if (mysqli_query($con, $sql)) {
		echo "Table created.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	
	//TODO: Load resetscript
	$sql = "INSERT INTO Comments (FirstName, LastName, Email, JokeQuestion, JokeAnswer, Date) VALUES ";
	$sql .= "('Luke', 'Nielson', 'lukesmail@gmail.com', 'What did one pirate say to the other when he beat him at chess?', 'Checkmatey.', '2022-05-01 09:53:05'),";
	$sql .= "('JOD', NULL, 'jodsmail@gmail.com', 'I broke my arm in two places.', 'My doctor told me to stop going to those places.', '2022-05-02 11:32:53'),";
	$sql .= "('Emma', 'Anderson', 'emmasmail@gmail.com', 'I used to work at a soft drink can crushing company...', 'it was soda pressing.', '2022-04-29 08:35:22'),";
	$sql .= "('Parker', 'Anderson', 'parkersmail@gmial.com', 'Needs a lot of work, maybe Ill finish it.', '2022-04-28 12:53:12'),";
	$sql .= "('Daryl', 'Anderson', 'darylsmail@gmail.com', 'Dad jokes are great.', '2022-04-29 09:45:33'),";
	$sql .= "('Parker', 'Anderson', 'parkersmail@gmail.com', 'Cant agree more.', '2022-04-30 10:23:59'),";
	$sql .= "('Carson', 'Swain', 'carsonsmail@gmail.com', 'Dad jokes go brrr', '2022-04-28 11:23:50'),";
	$sql .= "('JOD', NULL, 'jodsmail@gmail.com', 'JOD agrees.', 1, 0, '2022-04-28 12:45:32'),";
	$sql .= "('Connor', 'Snow', 'connorsemail@gmail.com', 'But can it play Goldeneye?', 0, 0, '2022-04-29 10:12:32'),";
	$sql .= "('Parker', 'Anderson', 'parkersmail@gmail.com', 'Its a Raspberry Pi, so anythings possible', 1, 0, '2022-05-01 09:53:12');";
	
	if (mysqli_query($con, $sql)) {
		echo "Review submitted successfully.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	
	closeCon($con);
?>