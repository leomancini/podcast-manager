<?php
	include("resources/php/functions.php");
?>
<!DOCTYPE HTML>
<html>

	<head>
		<title>Podcasts</title>
		<link rel="stylesheet/less" href="resources/css/style.less">
		<script src="resources/js/lib/less.js"></script>
		<script src="resources/js/lib/jquery.js"></script>
		<script src="resources/js/upload/jquery.ui.widget.js"></script>
		<script src="resources/js/upload/jquery.iframe-transport.js"></script>
		<script src="resources/js/upload/jquery.fileupload.js"></script>
		<script src="resources/js/main.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<h1>Podcast Manager</h1>
		<div id="content">
			<h3 id="create-new-episode">Create New Episode</h3>
			<form id="fileupload" action="controllers/new-episode/" method="POST" enctype="multipart/form-data">
		        <label><span class="text">Name:</span><input type="text" name="name" autocomplete="off"></label>
				<br><br><br>
		        <label><span class="text">Date:</span><input type="date" name="date_shown" value="<?php echo date("Y-m-d"); ?>"></label>
				<br><br><br>
		        <label><span class="text">Description:</span><textarea name="description"></textarea></label>
				<br>
				<label id="fileupload-label"><span class="text">File:</span></label>
				<div id="fileupload-filename"></div>
				<label id="fileupload"><span>Choose File</span>
					<input id="fileupload" type="file" name="files[]">
				</label>
				<br>
				<input type="submit" value="Create New Episode" id="upload-button">
			</form>
		
			<div id="status"></div>
			<div id="progress">
			    <div class="bar" style="width: 0%;"></div>
			</div>

			<br>
		
			<h3>List of Episodes</h3>
		
			<div id="episode-list">
				<div class="loading-placeholder">Loading...</div>
			</div>
		</div>
	</body>
</html>