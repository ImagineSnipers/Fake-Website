<?php
    include "connection.php";

    if ($con = openCon()) {
        $first_name = htmlspecialchars($_POST['first']);
		$first_name_filtered = str_replace("'", "\'", $first_name);
		
        $last_name = htmlspecialchars($_POST['last']);
		$last_name_filtered = str_replace("'", "\'", $last_name);
		
        $email = htmlspecialchars($_POST['email']);
		$email_filtered = str_replace("'", "\'", $email);
		
        $joke_question = htmlspecialchars($_POST['jokequestion']);
		$joke_question_filtered = str_replace("'", "\'", $joke_question);
		
        $joke_answer = htmlspecialchars($_POST['jokeanswer']);
		$joke_answer_filtered = str_replace("'", "\'", $joke_answer);
		
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO JokeSuggestions (FirstName, LastName, Email, JokeQuestion, JokeAnswer, CreationDate) VALUES ('".$first_name_filtered."', '".$last_name_filtered."', '".$email_filtered."', '".$joke_question_filtered."', '".$joke_answer_filtered."', '".$date."');";
        if (mysqli_query($con, $sql)) {
			header('Location: http://localhost/index.php');
        } else {
            echo "An error occured. Please try again later.";
        }
    } else {
        print("Error connecting to database.");
    }
?>