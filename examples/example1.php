<?php

require('../image_sizer.php');

$img = new image_sizer();


/**
 * setImage()
 * url : http://localhost/example1.php?img=https://upload.wikimedia.org/wikipedia/commons/c/c1/PHP_Logo.png
 * 
 */
$img->setImage($_GET['img']);


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
$img->show('png', 100);
