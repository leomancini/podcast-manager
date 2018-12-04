<?php
	$include_path = "../../";
	include("../../resources/php/functions.php");
	
	$query = "SELECT * FROM episodes ORDER BY id DESC";
	$result = mysqli_query($db, $query);

	$episodes = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	mysqli_free_result($result);
	mysqli_close($db);
	
	if($episodes) {
?>		
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<th><b>#</b></th>
		<th><b>Episode</b></th>
		<!--<th><b>File Name</b></th>-->
		<th><b>Duration</b></th>
		<th><b>Date</b></th>
		<!--<th><b>Uploaded</b></th>-->
	</tr>
	<?php foreach($episodes as $episode) { ?>
		<tr>
			<td style="width: 50px;"><center><?php echo $episode["id"]; ?></center></td>
			<td><b><?php echo $episode["name"]; ?></b><br><?php echo $episode["description"]; ?></td>
			<!--<td><?php echo $episode["file_name"]; ?></td>-->
			<td style="width: 50px;"><center><?php echo $episode["duration"]; ?></center></td>
			<td style="width: 200px;"><?php echo date("F j, Y", strtotime($episode["date_shown"])); ?></td>
			<!--<td><?php echo date("F j, Y \a\\t g:ia", intval($episode["uploaded_datetime"])); ?></td>-->
		</tr>
	<?php } ?>
</table>
<?php
	} else {
?>
	<div class="loading-placeholder">No episodes yet</div>
<?php
	}
?>