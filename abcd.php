<?php 

// Get real path for our folder
$rootPath = dirname(realpath(__FILE__)).DIRECTORY_SEPARATOR;
// echo "<pre>";
// print_r(get_declared_classes());die;
$zip = new ZipArchive();
$zip->open('file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
 // echo "asdf";die;
// // Create recursive directory iterator
// /** @var SplFileInfo[] $files */
// $files = new RecursiveIteratorIterator(
//     new RecursiveDirectoryIterator($rootPath),
//     RecursiveIteratorIterator::LEAVES_ONLY
// );
// echo "<pre>";
// print_r($files);die;
// foreach ($files as $name => $file)
// {
//     // Skip directories (they would be added automatically)
//     if (!$file->isDir())
//     {
//         // Get real and relative path for current file
//         $filePath = $file->getRealPath();
//         $relativePath = substr($filePath, strlen($rootPath) + 1);

//         // Add current file to archive
//         $zip->addFile($filePath, $relativePath);
//     }
// }

$zip->addFile($rootPath . "composer.lock","abcd/composer.lock");
echo "numfiles: " . $zip->numFiles . "\n";
echo "status:" . $zip->status . "\n";
$zip->close();
?>