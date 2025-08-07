<?php 
function extract_zip($file, $destination) {
	if(!extension_loaded('zip')) die('Zip extension not loaded.');

	// Folder cleanup
	$files = glob('../savedData*');
	foreach($files as $f)
		if(is_file($f)) unlink($f);

	// Check for path validity
	if(is_dir('../exported')) {
		if(file_exists('../exported/modpack.zip')) {
			// Open zip
			$zip = new ZipArchive();
			$zip->open($file, ZipArchive::RDONLY);
			$zip->extractTo($destination);
		}
		else echo('File does not exist.');
	}
	else {
		echo('Export folder does not exist. Creating it...');
		mkdir('../exported');
	}
}
extract_zip('../exported/modpack.zip', '../savedData/');
?>