<?php
function file_to_json($filePath) {
	//header("Content-Type: application/json; charset=UTF-8");
	$file = fopen($filePath, 'r');
	$stream = fread($file, filesize($filePath));
	fclose($file);
	$json = json_decode($stream);
	return $json;
}
?>