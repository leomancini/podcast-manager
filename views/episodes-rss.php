<?php
	// –––––––––––––––––––––––––––––––– ITUNES INFO ––––––––––––––––––––––––––––––––

	$base_url = "PODCAST BASE URL";

	$podcast["author"] = "PODCAST AUTHOR";
	$podcast["author_email"] = "PODCAST EMAIL";

	$podcast["title"] = "PODCAST TITLE";
	$podcast["subtitle"] = "PODCAST SUBTITLE";
	$podcast["description"] = "PODCAST SUMMARY";
	$podcast["cover_art_link"] = "PODCAST COVER ART";
	$podcast["itunes_link"] = "PODCAST WEBSITE";

	$podcast["category_broad"] = "PODCAST CATEGORY BROAD";
	$podcast["category_specific"] = "PODCAST CATEGORY SPECIFIC";
	
	// –––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––

	$include_path = "../";
	include("../resources/php/functions.php");

	$query = "SELECT * FROM episodes ORDER BY id DESC";
	$result = mysqli_query($db, $query);

	$episodes = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	mysqli_free_result($result);
	mysqli_close($db);
	
	header('Content-Type: application/rss+xml; charset=utf-8');
	echo '<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>'.$podcast["title"].'</title>
		<link>'.$podcast["itunes_link"].'</link>
		<language>en-us</language>
		<copyright>&#8471; &amp; &#xA9; '.date("Y").' '.$podcast["author"].'</copyright>
		<itunes:subtitle>'.$podcast["subtitle"].'</itunes:subtitle>
		<itunes:author>'.$podcast["author"].'</itunes:author>
		<itunes:summary>'.$podcast["description"].'</itunes:summary>
		<description>'.$podcast["description"].'</description>
		<itunes:type>serial</itunes:type>
		<itunes:owner>
			<itunes:name>'.$podcast["author"].'</itunes:name>
			<itunes:email>'.$podcast["author_email"].'</itunes:email>
		</itunes:owner>
		<itunes:image href="'.$podcast["cover_art_link"].'"/>
		<itunes:category text="'.$podcast["category_broad"].'">
			<itunes:category text="'.$podcast["category_specific"].'"/>
		</itunes:category>
		<itunes:explicit>no</itunes:explicit>';
				echo "\n		";
		
		if($episodes) {
			foreach($episodes as $episode) {
				echo "\n		";
				echo '<item>'; echo "\n			";
				echo '<itunes:episodeType>full</itunes:episodeType>'; echo "\n			";
				echo '<itunes:title>'.$episode["name"].'</itunes:title>'; echo "\n			";
				echo '<itunes:episode>'.intval($episode["id"]).'</itunes:episode>'; echo "\n			";
				echo '<itunes:season>1</itunes:season>'; echo "\n			";
				echo '<title>'.$episode["name"].'</title>'; echo "\n			";
				echo '<itunes:author>'.$podcast["author"].'</itunes:author>'; echo "\n			";
				echo '<itunes:subtitle>'.$episode["description"].'</itunes:subtitle>'; echo "\n			";
				echo '<itunes:summary>'.$episode["description"].'</itunes:summary>'; echo "\n			";
				echo '<description>'.$episode["description"].'</description>'; echo "\n			";
				echo '<content:encoded><![CDATA['.urlencode($episode["description"]).' Listen on <a href="'.$podcast["itunes_link"].'">Apple Podcasts</a>]]>.</content:encoded>'; echo "\n			";
				echo '<enclosure length="498537" type="audio/mpeg" url="'.$base_url.$episode["file_name"].'"/>'; echo "\n			";
				echo '<guid>'.$base_url.$episode["file_name"].'</guid>'; echo "\n			";
				echo '<pubDate>'.date("D, d M Y h:i:s O", strtotime($episode["date_shown"])).'</pubDate>'; echo "\n			";
				echo '<itunes:duration>'.$episode["duration"].'</itunes:duration>'; echo "\n			";
				echo '<itunes:explicit>no</itunes:explicit>'; echo "\n		";
				echo '</item>';
			}
		}
		
echo '
	</channel>
</rss>';
?>
