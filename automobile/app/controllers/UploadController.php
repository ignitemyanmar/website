<?php

class UploadController extends BaseController {

	function bytesToSize1024($bytes, $precision = 2) {
	    $unit = array('B','KB','MB');
	    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
	}

	public function postFileUpload($path){
		// dd($path);
		$sFileName = $_FILES['image_file']['name'];
		$sFileType = $_FILES['image_file']['type'];
		
		$sFileSize = $this->bytesToSize1024($_FILES['image_file']['size'], 1);
		Input::file('image_file')->move($path, $sFileName);
			echo "
			<p>Your file: $sFileName has been successfully received.</p>
			<p>Type: $sFileType</p>
			<p>Size: $sFileSize</p>
			";
	}

	public function postremovefile(){
		$filename=Input::get('filename');
		$path=Input::get('path');
		$length=0;

		if($filename){
			$length=strlen($filename);
		}
		$path=str_replace('%20', ' ', $path);
		$path=str_replace('%28', '(', $path);
		$path=str_replace('%29', ')', $path);
		$length +=10;
		$parentpath=substr($path, 0,- $length);
		$parentpath=substr($parentpath, 24);
		$thumbpath=substr($path, 24);
		// dd($parentpath);
		@unlink($parentpath.$filename);
		@unlink($parentpath.'medium/'.$filename);
		@unlink($thumbpath);
		return 'success';

	}

	

}