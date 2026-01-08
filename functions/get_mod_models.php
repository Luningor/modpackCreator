<?php
include 'remove_folder_contents.php';
// As this function takes forever, it's best to disable the execution max time for the entire duration of it
	$limit = ini_get('max_execution_time');
	set_time_limit(0);

$decompilerLocation = '../required/jd-cli-1.3.0-beta-1-dist/jd-cli.jar';
$modFolder = 'C:\Users\Luningor\AppData\Roaming\PrismLauncher\instances\DEBUGTESTING\minecraft\mods';

// Initialize temp folder
if(!is_dir('../temp')) mkdir('../temp');

// Folder cleanup
$tempLocation = "../temp";
remove_folder_contents($tempLocation);

// Getting file list
//$jarFiles = '';
$files = glob("{$modFolder}\*");

// Retrieving .jar files
foreach($files as $f)
	if(is_file($f))
		if(pathinfo($f, PATHINFO_EXTENSION) == 'jar') {
			$cleanPath = str_replace("\\", "/", $f);
			$folderName = $tempLocation . "/" . pathinfo($f, PATHINFO_FILENAME);
			mkdir($folderName);

			$output = `java -jar {$decompilerLocation} -oc true -od {$folderName} {$cleanPath}`;
			// Right about here you should locate the entity models, isolate the assets folder 
			// and retrieve them on a readable way (json model).
			// Fuck me raw in the ass if I know now but oh well. We'll see.
		}

// Reset max_execution_time
	set_time_limit($limit);
?>