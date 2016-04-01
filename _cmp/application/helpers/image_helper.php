<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Image Helper - Custom Helper (not a part of CodeIgniter's)
	
	All functions regarding Imagem manipulation goes here
*/

function img_url( $image, $thumb_type = NULL ) {
	$CI =& get_instance();
	$params = $CI->config->item('site_params');

	$img_path = $params['site_root'] . "files/";

	$url = "";

	if( $thumb_type != NULL ) {
		list($name, $ext) = explode(".", $image);
		$url = $img_path . $name."_".$thumb_type.".".$ext;
	} else {
		$url = $img_path . $image;
	}

	return $url;
}

function create_thumb($imgFullPath, $type, $size) {

	$desired_w = $desired_h = 0;
	list($desired_w, $desired_h) = explode("x", $size);

	// generate thumb
	$img_type = exif_imagetype( $imgFullPath );
	switch( $img_type ) {
		case IMAGETYPE_JPEG:
			$img = imagecreatefromjpeg( $imgFullPath );
			break;
		case IMAGETYPE_GIF:
			$img = imagecreatefromgif( $imgFullPath );
			break;
		case IMAGETYPE_PNG:
			$img = imagecreatefrompng( $imgFullPath );
			break;
		default:
			return;
	}

	$width = imagesx( $img );
	$height = imagesy( $img );

	$newH = $newW = 0;
	$limiting_dim = 0;

	if ($width > $height) {
        $newW = $desired_w;
        $newH = intval( $height * $newW / $width);
    } else {
        $newH = $desired_h;
        $newW = intval( $width * $newH / $height);
    }

    $dest_x = intval( ($desired_w - $newW) / 2 );
    $dest_y = intval( ($desired_h - $newH) / 2 );

	$tmp_img = imagecreatetruecolor( $desired_w, $desired_h );
	imagecopyresampled( $tmp_img, $img , 0, 0, $dest_x , $dest_y, 
		$desired_w , $desired_h , $width , $height );

	// novo nome
	$newFileArray = pathinfo( $imgFullPath );
	$thmbFileName = $newFileArray['dirname']."/".$newFileArray['filename']."_".$type.".jpg";

	imagejpeg( $tmp_img, $thmbFileName );

	imagedestroy( $img );
	imagedestroy( $tmp_img );
}

