<?php

class image_sizer
{

	protected $imageInfo, $imageFile, $imageData;
	public $newWidth;
	public $newHeight;


	/**
	 * @param string $imgfile [ image path or url ]
	 */
	public function setImage($imgfile)
	{

		$imgex = end(explode('.', $imgfile));

		if($imgex === 'png' || $imgex === 'jpg' || $imgex === 'jpeg' || $imgex === 'gif') {
			
			$this->imageInfo = @getimagesize($imgfile);

			if($this->imageInfo === false) {

				exit('Read error!');
			}

			$this->imageFile = $imgfile;

		} else {

			exit('File Type Not Supported');
		}

	}

	/**
	 * @param intiger $width  [new image width 100 = 100px]
	 * @param intiger $height [new image width 100 = 100px]
	 */
	public function setSize($width = null, $height = null)
	{
		if(!is_null($width)) {

			$this->newWidth  = $width;

		} else {

			$this->newWidth = $this->imageInfo[0];
		}	

		if(!is_null($height)) {

           $this->newHeight = $height;

		} else {

 		   $this->newHeight = $this->imageInfo[1];
		}

	}

	/**
	 * 
	 * @param  string  $showType [image show type : png or jpg or gif]
	 * @param  integer $quality  [image show quality 100 = 100%]
	 * @return void   
	 */
	public function show($showType = 'jpeg', $quality = 100)
	{

		if (headers_sent($file, $line)) exit("Error : Headers sent in $file on line $line");

		if($showType === 'jpeg' || $showType === 'jpg') {

			header('Content-type: image/jpeg');
			imagejpeg($this->getResizedImage(), null, $quality);

		} elseif($showType === 'png') {

			header('Content-type: image/png');
			imagepng($this->getResizedImage(), null, $quality);

		} elseif($showType === 'gif') {

			header('Content-type: image/gif');
			imagegif($this->getResizedImage());
		}

		imagedestroy($this->getResizedImage());
	}


	/**
	 * 
	 * @param  string $pathName [ full path and file name ex : 'images_dir/image_name.png']
	 * @return boolean
	 */
	public function saveTo($pathName)
	{
		$type = end(explode('.', $pathName));

		if(!is_writable(dirname($pathName))) return false;

		if($type === 'jpeg' || $type === 'jpg') {

			return imagejpeg($this->getResizedImage(), $pathName);
			
		} elseif($type === 'png') {

			return imagepng($this->getResizedImage(), $pathName);	

		} elseif($type === 'gif') {

			return imagegif($this->getResizedImage(), $pathName);			
		}

		return false;
	}


	protected function getResizedImage()
	{

		$type = substr($this->imageInfo['mime'], 6);

		if($type === 'jpeg' || $type === 'jpg') {

			$this->imageData = imagecreatefromjpeg($this->imageFile);

		} elseif($type === 'png') {

			$this->imageData = imagecreatefrompng($this->imageFile);

		} elseif($type === 'gif') {

			$this->imageData = imagecreatefromgif($this->imageFile);
		}

		$resizedImage = imagecreatetruecolor($this->newWidth, $this->newHeight);

		$imageColora = imagecolorallocate($resizedImage, 0, 0, 0);
		imagecolortransparent($resizedImage, $imageColora);
        imagealphablending($resizedImage, false);
		imagesavealpha($resizedImage, true);
		imagecopyresampled($resizedImage, $this->imageData, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $this->imageInfo[0], $this->imageInfo[1]);
		return $resizedImage;  
	}


}
