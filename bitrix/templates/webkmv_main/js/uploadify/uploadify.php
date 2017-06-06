<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/uploads'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);

    if (file_exists($targetFile)) {
        $targetFile = rtrim($targetPath,'/') . '/' . $millitime = round(microtime(true) * 1000)."_".$_FILES['Filedata']['name'];
        move_uploaded_file($tempFile,$targetFile);
        echo "Файл $targetFile существует";
    } else {
        move_uploaded_file($tempFile,$targetFile);
    }

}
?>