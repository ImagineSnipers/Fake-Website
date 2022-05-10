<?php
    include "connection.php";

    if ($con = openCon()) {
        $first_name = htmlspecialchars($_POST['first']);
        $last_name = htmlspecialchars($_POST['last']);
        $email = htmlspecialchars($_POST['email']);
        $joke_question = htmlspecialchars($_POST['jokequestion']);
        $joke_answer = htmlspecialchars($_POST['jokeanswer']);
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO JokeSuggestions (FirstName, LastName, Email, JokeQuestion, JokeAnswer, CreationDate) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$joke_question."', '".$joke_answer."', '".$date."');";
        if (mysqli_query($con, $sql)) {
            echo "Joke submitted successfully.";
        } else {
            echo "An error occured. Please try again later.";
        }
    } else {
        print("Error connecting to database.");
    }
?>