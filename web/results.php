<!DOCTYPE html>
<html>
	<head>
	
	</head>

	<body>
		<?php  
			$name = $_POST["name"];
		 	$gender = $_POST["gender"]; 
		 	$ageGroup = $_POST["ageGroup"]; 
			$expectation = $_POST["expectation"];

			$comment = $_POST["comment"];	
		
			if (empty($name) || empty($gender) || empty($ageGroup) || empty($comment))
			{
				echo "Error found!\n There are missing spot\n";
				echo "\n";
			}

			else
			{
				
		
				$file = "./results.txt";
				$write = "Let me double Check your info.\n Name: $name\n Gender: $gender\n Age group: I am in the $ageGroup group\n I am seeking for $expectation\n Additional comments: $comment\n\n";

				file_put_contents($file, $write, FILE_APPEND);
			}

			$file = "./results.txt";
			$result = file_get_contents($file);
			$lines = explode("\n", $result);
			foreach ($lines as $newline) {
				echo $newline . '<br>';
			}
		?>
        <br>
        <br>
        
    <a href="survey.html">Back to Form</a><br><br>
	</body>
</html>