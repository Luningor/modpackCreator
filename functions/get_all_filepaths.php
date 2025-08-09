<?php
function get_all_filepaths($dir) {
	$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

    $files = array(); 
    foreach($rii as $file)
        if(!$file->isDir())
            $files[] = str_replace('\\', '/', $file->getPathname());

    return $files;
}
?>