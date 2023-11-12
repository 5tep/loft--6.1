<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);  
require_once 'vendor/autoload.php';

use BenMajor\ImageResize\Image;
use BenMajor\ImageResize\Watermark;

$image = new Image('https://images.vector-images.com/92/g408_sevastopol_city.gif');
$watermark = new Watermark('https://yt3.googleusercontent.com/ytc/APkrFKa8j5e6yF1Fu6W8BTyrE_4iI2X7Ut23v6Gc1KdMzA=s176-c-k-c0x00ffffff-no-rj');
$image->addWatermark( $watermark );
$image->resizeWidth(200);
$image->output();

?>