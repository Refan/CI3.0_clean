<?php

	//1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 
	//7 = TIFF(orden de bytes intel), 8 = TIFF(orden de bytes motorola), 
	//9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM.
	
	function getResizePercent($in_width, $in_height, $from, $save){
	
		if($from==NULL || $from=="") return false;
		
		$file_info = getimagesize($from);
		
		if($file_info["2"] == 3){//PNG
			$image = imagecreatefrompng($from);
		}else if ($file_info["2"] == 1){//GIF
			$image = imagecreatefromgif($from);
		}else if ($file_info["2"] == 2){//JPG
			$image = imagecreatefromjpeg($from);
		}else{
			return false;
		}
		
		$width = $file_info["0"];
		$height = $file_info["1"];

		if($width < $in_width && $height < $in_height){
			$percent = 1; // Percent = 1, 如果都比預計縮圖的小就不用縮
		}else{
			$w_percent = $in_width / $width;
			$h_percent = $in_height / $height;
			$percent = ($w_percent > $h_percent) ? $h_percent : $w_percent;
		}

		$new_width  = $width * $percent;
		$new_height = $height * $percent;
		
		if($file_info["2"] == 1){//gif
			$rs = copy($from,$save);
			return $rs;
		}elseif($file_info["2"] == 3){//PNG
			imagesavealpha($image,true);
			$image_new = imagecreatetruecolor($new_width, $new_height);
			imagealphablending($image_new,false);
			imagesavealpha($image_new,true);
			imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			$rs = imagepng($image_new, $save);
			return $rs;
		}else{
			$image_new = imagecreatetruecolor($new_width, $new_height);

			imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			$rs = imagejpeg($image_new, $save, 90);
			return $rs;
		}
	}
	
	function getrandname($name,$len=4){
		 $array_name=explode(".",$name);
		 $newname=$array_name[0].generatorPassword($len).".".$array_name[1];
		 return $newname;
	} 
	function generatorPassword($password_len){   
		$password = '';
		$word = 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ23456789';
		$len = strlen($word);
		for ($i = 0; $i < $password_len; $i++) {
			$password .= $word[rand() % $len];
		}
		return $password;
	}
?>