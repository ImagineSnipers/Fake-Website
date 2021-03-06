<!DOCTYPE html>
<html>
	<head>
		<title>Dad Jokes - Home</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
		<link rel="manifest" href="favicons/manifest.json">
		<link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#aaaaaa">
		<meta name="msapplication-config" content="favicons/browserconfig.xml" />
		<link rel="stylesheet" href="styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="scripts/script.js"></script>

		<!-- Bootstrap core CSS -->
		<link href="styles/bootstrap.min.css" rel="stylesheet">	
		<link href="styles/headers.css" rel="stylesheet">
		<link href="styles/heroes.css" rel="stylesheet">
		<link href="styles/features.css" rel="stylesheet">
		
		<script>		
			<?php
				include "database/connection.php";
				$con = openCon();
			?>

			var jokeQuestions = [<?php
				$values = array();

				$sql = "SELECT JokeQuestion FROM JokeSuggestions;";
				$query = mysqli_query($con, $sql);
				$size = mysqli_num_fields($query);
				
				while ($row = mysqli_fetch_array($query)) {
					for ($i = 0; $i < $size; $i++) 
						$html = $row[0];
						$html = str_replace("&quot;", "\'", $html);
						$html_formated = "\"$html\",";
						echo $html_formated;
				}
			?>];
			console.log(jokeQuestions);

			var jokeAnswers = [<?php
				$values = array();

				$sql = "SELECT JokeAnswer FROM JokeSuggestions;";
				$query = mysqli_query($con, $sql);
				$size = mysqli_num_fields($query);
				
				while ($row = mysqli_fetch_array($query)) {
					for ($i = 0; $i < $size; $i++) 
						$html = $row[0];
						$html = str_replace("&quot;", "\'", $html);
						$html_formated = "\"$html\",";
						echo $html_formated;
				}
			?>];
			console.log(jokeAnswers);

			var jokeQuestionElement = document.getElementById("joke-question");
			var jokeAnswerElement = document.getElementById("joke-answer");
			var inst = setInterval(updateJoke, 3000);

			function updateJoke() {
				var index = Math.floor(Math.random() * jokeQuestions.length);
				document.getElementById("joke-question").textContent = jokeQuestions[index];
				document.getElementById("joke-answer").textContent = jokeAnswers[index];
				//alert(jokeQuestions[2] + "\n" + jokeAnswers[0]);
			}
			
		</script>
	</head>
	<body>
		<div class="container">
			<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
				<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
				<img class="bi me-2" width="40" height="32" src="favicons/safari-pinned-tab.svg"></img>
				<span class="fs-4">Dad Jokes</span>
			  </a>
		
			  <ul class="nav nav-pills">
				<li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
				<li class="nav-item"><a href="pages/about.html" class="nav-link">About</a></li>
				<li class="nav-item"><a href="pages/contact.html" class="nav-link">Contact</a></li>
				<li class="nav-item"><a href="pages/locations.html" class="nav-link">Locations</a></li>
			  </ul>
			</header>
		</div>

		<div class="px-4 py-5 my-5 text-center">
			<img class="d-block mx-auto mb-4" src="favicons/safari-pinned-tab.svg" alt="" width="72" height="57">
			<h1 class="display-5 fw-bold">Dad Jokes?</h1>
			<div class="col-lg-6 mx-auto">
				<div class="pt-3 pb-4">
					<p id="joke-question" class="lead h3">I broke my arm in two places.</p>
					<p class="lead h2"><strong id="joke-answer">My doctor told me to stop going to those places.</strong></p>
				</div>
				<div class="d-grid gap-2 d-sm-flex justify-content-sm-center pb-3">
					<a href="pages/joke_form.html" class="btn btn-primary btn-lg px-4 gap-3" role="button">Submit Joke</a>
					<a href="pages/contact.html" class="btn btn-outline-secondary btn-lg px-4" role="button">Contact</a>
					<!--<button type="button" class="btn btn-primary btn-lg px-4 gap-3">Learn More</button>
					<button type="button" class="btn btn-outline-secondary btn-lg px-4">Contact</button>-->
				</div>
			</div>
		</div>
	</body>
</html>
