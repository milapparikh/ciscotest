<?php

// Excercise 2: 2 telent to the server create n number of file, zipp all the files created and then download the files and extract the files
$filepath = '';
if(count($argv) > 0){
	$zip = new ZipArchive;
	if ($zip->open('test_new.zip', ZipArchive::CREATE) === TRUE)
	{
		for ($i=0; $i < $argc; $i++) {
		    //echo $argv[$i] . "\n";
		    $myfile = fopen($argv[$i], "w");
		    $zip->addFile($filepath.$argv[$i]);

		}
	$zip->close();
	}
}

	header("Content-type: application/zip"); 
    header("Content-Disposition: attachment; filename=$archive_file_name"); 
    header("Pragma: no-cache"); 
    header("Expires: 0"); 
    readfile($filepath);
    exit;


?>