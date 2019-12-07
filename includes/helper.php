<?php
$CATEGORIES = array(
	"Technology",
	"Science",
	"Math",
	"Art",
	"Food",
	"Lifestyle",
	"Nature",
	"Music",
	"Exercise",
	"Other"
);

function render($template, $data = array()) {
	$path = __DIR__ . '/../templates/' . $template . '.php';
	if (file_exists($path))
	{ 
		extract($data);
		require($path);
	}
}

function viewTutorial($connection, $tutorialid) {
	// tutorial information
	$tutorialSQL = sprintf("SELECT `username`, `title`, `description`, `category`, `views`, `likes` FROM `tutorial`, `users` WHERE `tutorialid` = %d AND `users`.`id` = `userid`;", $tutorialid);
	$res = queryDatabase($tutorialSQL, $connection);
	if ($res === false) {
		die("Could not query database");
	}
	$title = "";
	$views = 0;
	while ($tutorial = $res->fetch_assoc()) {
		echo "<h1>" . $tutorial["title"] . "</h1>";
		echo "<p>" . $tutorial["description"] . "</p>";
		echo "<p><b>Category</b>: " . $tutorial["category"] . "<br /><b>Views</b>: " . $tutorial["views"] . "<br /><b>Likes</b>: " . $tutorial["likes"] . "<br /><b>Creator</b>: " . $tutorial["username"] . "</p>";
		$title = $tutorial["title"];
		$views = $tutorial["views"];
	}

	// update views
	$sql = sprintf("UPDATE `tutorial` SET `views` = %d WHERE `tutorialid` = %d", $views+1, $tutorialid);
	$res = queryDatabase($sql, $connection);
	if ($res === false) {
		die("Could not query database");
	}

	// display entries
	$entrySQL = sprintf("SELECT `data`, `type`, `number` FROM `entry` WHERE `tutorialid` = %d;", $tutorialid);
	$res = queryDatabase($entrySQL, $connection);
	if ($res === false) {
		die("Could not query database");
	}
	while ($entry = $res->fetch_assoc()) {
		if ($entry["type"] === "Header") {
			echo "<h4>" . $entry["data"] . "</h4>";
		} else if ($entry["type"] === "Text") {
			echo "<p>" . $entry["data"] . "</p>";
		} else if ($entry["type"] === "Picture") {
			echo "<img src=\"" . $entry["data"] . "\" alt=\"Image from " . $title . "\" width=\"600\" height=\"500\">";
		} else if ($entry["type"] === "Video") {
			echo "<iframe width=\"600\" height=\"400\" src=\"" . $entry["data"] . "\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
		}
	}
}
?>