<?php
echo "asdf";die;
error_reporting(1);
display_errors(1);
class createDirZip extends createZip {
 
	function get_files_from_folder($directory, $put_into) {
		echo "asdf";die;
		if ($handle = opendir($directory)) {
			while (false !== ($file = readdir($handle))) {
				if (is_file($directory.$file)) {
					$fileContents = file_get_contents($directory.$file);
					$this->addFile($fileContents, $put_into.$file);
				} elseif ($file != '.' and $file != '..' and is_dir($directory.$file)) {
					$this->addDirectory($put_into.$file.'/');
					$this->get_files_from_folder($directory.$file.'/', $put_into.$file.'/');
				}
			}
		}
		closedir($handle);
	}
}

//echo "asdf";die;
$createZip = new createDirZip;
//$createZip->addDirectory(dirname(realpath(__FILE__)));
echo dirname(_FILE_);die;
$createZip->get_files_from_folder(dirname(_FILE_), dirname(_FILE_));
?>