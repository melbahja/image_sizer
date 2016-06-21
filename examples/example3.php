<?php


require('../image_sizer.php');


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
 * saveTo
 * save image
 * $img->saveTo(full path and name, quality); 
 * return boolean
 */
var_dump($img->saveTo('new_image.png', 100)); // save image png type

//$img->saveTo('new_image.jpg', 100); // save image jpg type
//$img->saveTo('new_image.jpeg', 100); // save image jpg type
//$img->saveTo('new_image.gif'); // save image gif type
