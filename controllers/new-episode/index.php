<?php
	$include_path = "../../";
	require("../../resources/php/functions.php");
	require('UploadHandler.php');
	
	error_reporting(E_ALL | E_STRICT);
	
	$upload_handler = new UploadHandler();
	
	$uploaded_episode = mysqli_query($db, "SELECT * FROM episodes ORDER BY id DESC LIMIT 1");
	$uploaded_episode_info = mysqli_fetch_assoc($uploaded_episode);
	
	$duration_info = shell_exec($path_to_ffmpeg."ffmpeg -i ".$path_to_episodes_directory.$uploaded_episode_info["file_name"]."  2>&1 | grep Duration");	
	preg_match("/Duration: (.*), start/", $duration_info, $duration_info_parsed);
	$duration = $duration_info_parsed[1];
	$duration = substr($duration, 0, strrpos( $duration, '.'));
	
	mysqli_query($db, "UPDATE episodes SET duration='".$duration."' WHERE id=".$uploaded_episode_info["id"]);
	
	mysqli_close($db);
?>