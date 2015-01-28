<!-- index.html-->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"
	charset=ISO-8859-1">
	<title>SmartPakku Remote Access Page</title>
	<link rel="stylesheet" type="text/css" href="submenustyle.css">
	<link href='http://fonts.googleapis.com/css?family=Oswald'
		rel='stylesheet' type='text/css'>	
	<script src="https://code.jquery.com/jquery-2.1.1.js"></script>	
</head>

<body>
	<div id = "grad">
		<div id ="pagetitle" >
			<h1 class = "R_title"> SmartPakku Remote Access Page</h1>
		</div>
		<div id="page">
		
			<?php			
			$STRINGY = 'https://api.mongolab.com/api/1/databases/smartpakku/collections/state?q={"_id":{"$oid":"' . $_POST["privatekey"] . '"}}&apiKey=b6MjZVfMLjMkaYEWGiOgkqAOYshLnzMg';
			$data = file_get_contents($STRINGY);
			
			if (empty($data))
				echo "You entered an invalid string_ID, please try again.";
			
			$data1 = json_decode($data, true);		
			$data2 = $data1[0];
			?>
			
			<h1>Backpack Status</h1>
			<p>
			The backpack is reporting back a state of
			<?php
			echo $data2['state'];
			?>
			
			</p>
			<h1>Sensor Detection</h1>
			<p>
			The left shoulder sensor is			
			<?php 
			if ($data2['fsrPressed0'])
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
			?></br>
			
			The right shoulder sensor is 
			<?php 
			if ($data2['fsrPressed1'])
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
			?></br>
			
			The left waist sensor is
			<?php 
			if ($data2['fsrPressed2'])
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
			?></br>
			
			The right waist sensor is
			<?php 
			if ($data2['fsrPressed3'])
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
			?></br>
			
			</p>
			<h1>Weight Detection</h1>
			<p>
			The left shoulder weight is <?php echo $data2['fsrForces0'];?></br>
			The right shoulder weight is <?php echo $data2['fsrForces1'];?></br>
			The left waist weight is <?php echo $data2['fsrForces2'];?></br>
			The right waist weight is <?php echo $data2['fsrForces3'];?></br>
			</p>			
		</div>
	</div>	
</body>

<footer>
Copyright 2015 Anthony Nguyen 
</footer>

</html>