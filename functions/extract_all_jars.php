<?php
include_once 'remove_folder_contents.php';

function extract_all_jars($location, $clean, $readOnly) {
	// As this function takes forever, it's best to disable the execution max time for the entire duration of it
		$limit = ini_get('max_execution_time');
		set_time_limit(0);

	$decompilerLocation = '../required/jd-cli-1.3.0-beta-1-dist/jd-cli.jar';
	$modFolder = str_replace('\\', '/', $location);

	// Initialize temp folder
	if(!is_dir('../temp')) mkdir('../temp');

	// Folder cleanup
	$tempLocation = "../temp";
	if($clean) remove_folder_contents($tempLocation);

	if($clean && count(glob("../temp/")) > 1) return;

	// Getting file list
	$files = glob("{$modFolder}/*.*");

	// Retrieving .jar files
	foreach($files as $f)
		if(is_file($f))
			if(pathinfo($f, PATHINFO_EXTENSION) == 'jar') {
				$cleanPath = str_replace("\\", "/", $f);
				$folderName = $tempLocation . "/" . pathinfo($f, PATHINFO_FILENAME);
				if(!file_exists($folderName) && !$readOnly) mkdir($folderName);
				else continue;

				if(!$readOnly) $output = `java -jar {$decompilerLocation} -oc true -od "{$folderName}" "{$cleanPath}"`;
				//echo $output . "\n";
				echo "Mod " . pathinfo($f, PATHINFO_FILENAME) . "exported\n\n";
			}

	// Reset max_execution_time
		set_time_limit($limit);
}
?>