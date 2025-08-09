<?php
function export_saved_data() {
	// Check if zip already exist and cleanup
	if(file_exists('../exported/modpack.zip')) unlink('../exported/modpack.zip');
	
	// Create new zip file
	$zip = new ZipArchive();
	$zip->open('../exported/modpack.zip', ZipArchive::CREATE);
	$folder = realpath('../savedData');

	if(is_dir($folder)) {
		// Create iterator
		$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder), RecursiveIteratorIterator::LEAVES_ONLY);
	
		foreach($files as $name => $file) {
			// Get real and relative path for current file
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($folder) + 1);
		
			// Add current file to archive
			if(!$file->isDir())
				$zip->addFile($filePath, $relativePath);
			else if($relativePath !== false)
				$zip->addEmptyDir($relativePath);
		}
	}
	else {
		echo('Saved data folder does not exist. Creating it...');
		mkdir('../savedData');
	}
	
	$zip->close();
}
export_saved_data();
?>