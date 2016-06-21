<?php

require('image_sizer.php');

$img = new image_sizer();


/**
 * setImage(path)
 * path : path/to/image.png
 * 
 */
$img->setImage('php.png');


/**
 * setSize
 * New image size
 * $img->setSize(Width, Height)
 */
$img->setSize(100, 60);

/**
 * show image
 * 
 * $img->show(type, quality);
 * type : png, jpeg, jpg, gif
 * quality : image show quality 100 = 100%
 */
$img->show('jpeg', 100);



/**
 * saveTo
 * save image
 * $img->saveTo(full path and name, quality); 
 */
//$img->saveTo('new_image.png', 100); // save image png type
//$img->saveTo('new_image.jpg', 100); // save image jpg type
//$img->saveTo('new_image.jpeg', 100); // save image jpg type
//$img->saveTo('new_image.gif'); // save image gif type
