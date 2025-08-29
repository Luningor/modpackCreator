<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Viewer</title>
</head>
<body>
	<ol>
	<?php
		include 'functions/file_to_json.php';
		$itemData = file_to_json('generatedData/itemData.json');
		foreach ($itemData->data as $item => $value) {
			echo "<li>";
			// Same image as ID
			if(file_exists("savedData/icon-exports-x32/{$itemData->data->$item->icon}.png")) 
				echo "	<img width=\"32\" height=\"32\" src=\"savedData/icon-exports-x32/{$itemData->data->$item->icon}.png\">";
			// First variant
			else if(!empty($itemData->data->$item->variants))
				echo "	<img width=\"32\" height=\"32\" src=\"{$itemData->data->$item->variants[0]}\">";
			else
			// No item icon, fallback to missing texture
				echo "	<img width=\"32\" height=\"32\" src=\"pageresources/missing_texture.png\">";
			echo "  <p style=\"display: inline\">{$item}</p>";
			echo "</li>";
		}
	?>
	</ol>
</body>
</html>