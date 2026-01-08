<?php
function remove_folder_contents($path) {
	$dir = new RecursiveDirectoryIterator(
	    $path, FilesystemIterator::SKIP_DOTS);
	 
	// Reducing file search to given root
	// directory only
	$dir = new RecursiveIteratorIterator(
	    $dir,RecursiveIteratorIterator::CHILD_FIRST);
	 
	// Removing directories and files inside
	// the specified folder
	foreach ($dir as $leftoverFile)
	    $leftoverFile->isDir() ?  rmdir($leftoverFile) : unlink($leftoverFile);
}

?>