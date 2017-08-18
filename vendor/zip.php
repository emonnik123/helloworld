<?php 
// echo $_SERVER['DOCUMENT_ROOT'];die;
// Get real path for our folder
// $zipfile=zip.php
// echo $_SERVER["PHP_SELF"];die;
// echo basename(__FILE__);
$remainingpathoffile=substr(realpath(__FILE__), strlen($_SERVER['DOCUMENT_ROOT'])+1);

$data=explode('/', $remainingpathoffile);
$rootPath = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$data[0];
// echo  $rootPath;die;
//  echo substr(
// ,
// basename(__FILE__)
// );die;
// $rootPath = dirname(realpath(__FILE__));
//.DIRECTORY_SEPARATOR;
// echo $rootPath;die;
// echo "<pre>";
// print_r(get_declared_classes());die;
$zip = new ZipArchive();
$zip->open('file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);
// print_r(get_class_methods(RecursiveDirectoryIterator));die;
// print_r($files);die;
$it=$files;
// print_r($it);die;
// $it->rewind();
// $all=array();
$i=0;
while($it->valid()) {
    if (!$it->isDir())
    {
        if($it->isDot()){
            echo "yes";
        }
        $filePath=$it->getRealPath();
        $all[$i]["filePath"]=$it->getRealPath();
        $relativePath=substr($filePath, strlen($rootPath) + 1);
        $all[$i]["relativePath"]=$relativePath;
        $zip->addFile($filePath, $relativePath);
        // $all[$i]["Key"]=$it->key();
        // Get real and relative path for current file
        // $filePath = $it->getRealPath();
        // echo  $filePath;
        // $relativePath = substr($filePath, strlen($rootPath) + 1);
        // echo $relativePath;
        // Add current file to archive
        // $zip->addFile($filePath, $relativePath);
    }
    // if (!$it->isDot()) {
    //     $all[$i]["SubPathName"]=$it->getSubPathName();
    //     $all[$i]["SubPath"]=$it->getSubPath();
    //     $all[$i]["Key"]=$it->key();

    //     // echo 'SubPathName: ' . $it->getSubPathName() . "\n";
    //     // echo 'SubPath:     ' . $it->getSubPath() . "\n";
    //     // echo 'Key:         ' . $it->key() . "\n\n";
    // }

    $it->next();
    $i++;
}
// echo "<pre>";
// print_r($all);die;
// echo $i;die;
// echo "<pre>";
// print_r($all);die;
// foreach ($all as $name => $file)
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

// Zip archive will be created only after closing object
$zip->close();
?>