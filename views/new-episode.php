<?php
	include("resources/php/functions.php");
?>
<!DOCTYPE HTML>
<html>

	<head>
		<title>Podcasts</title>
		<link rel="stylesheet/less" href="../resources/css/style.less">
		<script src="../resources/js/lib/less.js"></script>
		<script src="../resources/js/lib/jquery.js"></script>
		<script src="../resources/js/main.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>	
		<a href="../">&larr; back to episode list</a> 
		<h1>New Episode</h1>
		<form action="../controllers/new-episode.php" method="POST" enctype="multipart/form-data">
			<label>Name:</label> <input type="text" name="name" id="name">
			<br><br>
	        <label>File:</label> <input type="file" name="file" id="file">
			<br><br>
			<input type="submit" value="Upload">
		</form>

	</body>
</html>