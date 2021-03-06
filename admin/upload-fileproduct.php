<?php
ob_start();
session_start();
/**
 * upload.php
 *
 * Copyright 2013, Moxiecode Systems AB
 * Released under GPL License.
 *
 * License: http://www.plupload.com/license
 * Contributing: http://www.plupload.com/contributing
 */

#!! IMPORTANT:
#!! this file is just an example, it doesn't incorporate any security checks and
#!! is not recommended to be used in production environment as it is. Be sure to
#!! revise it and customize to your needs.
//var_dump($_REQUEST); var_dump($_FILES); exit();


// Make sure file is not cached (as it happens for example on iOS devices)
header("Expires: Mon, 26 Jul 2018 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

/*
// Support CORS
header("Access-Control-Allow-Origin: *");
// other CORS headers if any...
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	exit; // finish preflight CORS requests here
}
*/

// 5 minutes execution time
@set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);

// Settings
//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
$subfolder = (null !== $_GET['imagePath']) ? $_GET['imagePath'] : 'images';//die();
//$subfolder = (null !== $session->get('imagePath')) ? $session->get('imagePath') : 'images';
$tmpname=$_REQUEST["name"];
$exp=explode('.', $tmpname);
$ext=end($exp);
$targetDir = '../upload/';
//$targetDir = 'assets/img/';//die();
$cleanupTargetDir = true; // Remove old files
$maxFileAge = 5 * 3600; // Temp file age in seconds


// Create target dir
if (!file_exists($targetDir)) {
	@mkdir($targetDir);
}
//echo 'navin'; die();thumbnail features	
// Get a file name
if (isset($_REQUEST["name"])) {
	$fileName =  $subfolder.'/'.$_REQUEST["name"];
} elseif (!empty($_FILES)) {
	$fileName =  $subfolder.'/'.$_FILES["file"]["name"];
} else {
	$fileName = uniqid("file_");//userId
	$fileName =  $subfolder.'/'.$_GET['userId'].'_'.$subfolder;
}
//echo $_REQUEST["name"];//die();
//echo '==='.$_SESSION['video'] = $_REQUEST["name"];;
//if($subfolder == 'video'){
	
	//print_r($_SESSION['video']);die();
//}
/*if($subfolder == 'gallery'){
	if(!isset($i)){
			$i==0;
	}else{
		$i++;	
	}
	echo $_SESSION['video'][$i] = $_REQUEST["name"];
			//array_push($_SESSION['video'], $_REQUEST["name"]);
	
	
}*/
/*$fileName = uniqid("file_");
//print_r($_REQUEST);die();
$fileName = $subfolder.'/'.$fileName.'.'.$ext;*/

$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

// Chunking might be enabled
$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;



// Remove old temp files
if ($cleanupTargetDir) {
	if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
	}

	while (($file = readdir($dir)) !== false) {
		$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

		// If temp file is current file proceed to the next
		if ($tmpfilePath == "{$filePath}.part") {
			continue;
		}

		// Remove temp file if it is older than the max age and is not the current file
		if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
			@unlink($tmpfilePath);
		}
	}
	closedir($dir);
}


// Open temp file
if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
	die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
}

if (!empty($_FILES)) {
	if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
	}

	// Read binary input stream and append it to temp file
	if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
	}
} else {
	if (!$in = @fopen("php://input", "rb")) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
	}
}

while ($buff = fread($in, 4096)) {
	fwrite($out, $buff);
}

@fclose($out);
@fclose($in);

//$extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
//echo $extension;
//$videos = array('mp4', 'avi', 'mkv', 'mov');
//if(in_array($extension, $videos)):
//    $video_file_preview = 'video_preview_' . substr(sha1('jsaofiaj324rfjasd' . rand(1, 5000)), 0, 15) . '.'.$extension;
//
//    shell_exec(__DIR__.'/__lib/ffmpeg/bin/ffmpeg -ss 00:00:00 -i ' . PUBLIC_DIR_URI . $out . ' -t 00:00:03 -c copy ' . PUBLIC_DIR_URI . $video_file_preview);
//endif;

// Check if file has been uploaded
if (!$chunks || $chunk == $chunks - 1) {
	// Strip the temp .part suffix off
	rename("{$filePath}.part", $filePath);
}

// Return Success JSON-RPC response
//$session->set($_REQUEST['fileInpName'], basename($filePath));
if($ext!='pdf'){
	//Thumbnail Start
	$tnPath  = $thumbnailDir.'/'.$fileName;
	$copy = copy($filePath, $tnPath);//$tnPath //$filePath
	$sourcefile = $tnPath;
	$targetfile = $tnPath;
	$dest_x = 350;
	$dest_y = 350;
	$jpegqual = 100;
	
	resize($sourcefile, $dest_x, $dest_y, $targetfile);
	//Thumbnail Start
}
die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

// crops proportionally based on width and height
function resize($img, $w, $h, $newfilename) {

    //Check if GD extension is loaded
    if (!extension_loaded('gd') && !extension_loaded('gd2')) {
        trigger_error("GD is not loaded", E_USER_WARNING);
        return false;
    }
     
    //Get Image size info
    $imgInfo = getimagesize($img);
    
    switch ($imgInfo[2]) {
    
        case 1: $im = imagecreatefromgif($img); break;
        case 2: $im = imagecreatefromjpeg($img);  break;
        case 3: $im = imagecreatefrompng($img); break;
        default:  trigger_error('Unsupported filetype!', E_USER_WARNING);  break;
    }
     
    //If image dimension is smaller, do not resize
    if ($imgInfo[0] <= $w && $imgInfo[1] <= $h) {
        $nHeight = $imgInfo[1];
        $nWidth = $imgInfo[0];
    }
    else{
    // yeah, resize it, but keep it proportional
        if ($w/$imgInfo[0] > $h/$imgInfo[1]) {
            $nWidth = $imgInfo[0]*($h/$imgInfo[1]);
            $nHeight = $h;            
        }else{
            $nWidth = $w;
            $nHeight = $imgInfo[1]*($w/$imgInfo[0]);
        }
    }
     
    $nWidth = round($nWidth);
     
    $nHeight = round($nHeight);
     
    $newImg = imagecreatetruecolor($nWidth, $nHeight);
     
    /* Check if this image is PNG or GIF, then set if Transparent*/  
    
    if(($imgInfo[2] == 1) OR ($imgInfo[2]==3)){
        imagealphablending($newImg, false);
        imagesavealpha($newImg,true);
        $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
        imagefilledrectangle($newImg, 0, 0, $nWidth, $nHeight, $transparent);
    }
     
    imagecopyresampled($newImg, $im, 0, 0, 0, 0, $nWidth, $nHeight, $imgInfo[0], $imgInfo[1]);
     
    //Generate the file, and rename it to $newfilename
    switch ($imgInfo[2]) {
        case 1: imagegif($newImg,$newfilename); break;
        case 2: imagejpeg($newImg,$newfilename);  break;
        case 3: imagepng($newImg,$newfilename); break;
        default:  trigger_error('Failed resize image!', E_USER_WARNING);  break;
    }
     
    return $newfilename;

}