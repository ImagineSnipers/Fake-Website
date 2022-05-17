<!DOCTYPE html>
<html>
	<head>
		<title>Customer Reviews</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script>
			<?php
				include "../database/connection.php";
				$con = openCon();
			?>
			
			var table = "<?php
				
				$html = "<table>";
			
				$sql = "SELECT * FROM JokeSuggestions;";
				$query = mysqli_query($con, $sql);
				$size = mysqli_num_fields($query);
				
				while ($row = mysqli_fetch_array($query)) {
					$html .= "<tr>";
					
					for ($i = 0; $i < $size; $i++)
						$html .= "<td>".$row[$i]."</td>";
					
					$html .= "</tr>";
				}
				
				$html .= "</table>";
				
				echo $html;
			?>";
			
			$(document).ready(function() {
				$('#table_contents').append(table);
			});
			
		</script>
	</head>
	<body>
		<h1>Customer Reviews</h1>
		<div id="table_contents"></div>
	</body>
</html>