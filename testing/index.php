<?php
function hoverableItem($size, $id, $name, $iconPath, $visible = true, $hideID = false) {
	$hidden  = $visible ? "" : " hidden";
	$hide_ID = $hideID  ? " hidden" : "";
	$hovItem = <<<HTML
		<div class="hoverable-icon-div">
			<img src="{$iconPath}" width="{$size}px" height="{$size}px"{$hidden}>
		</div>
		<div class="info-toast">
			<p class="info-toast-name">{$name}</p>
			<p class="info-toast-id"{$hide_ID}>{$id}</p>
		</div>
	HTML;

	return $hovItem;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type=image/x-icon href="../pageresources/svg/logo.svg">
	<link rel="stylesheet" type="text/css" href="../pageresources/itemdisplay.css">
	<title>Testing</title>
</head>
<body>
	<?php
		echo hoverableItem(16, "minecraft:oak_log", "Oak log", "..\savedData\icon-exports-x32\minecraft__oak_log.png", true, true);
	?>
</body>
</html>