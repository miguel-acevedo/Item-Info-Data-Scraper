<?php

// $test = file_get_contents("https://www.ae.com/men-aeo-360-extreme-flex-long-sleeve-t-shirt-bold-black/web/s-prod/2171_8522_064");
$test = file_get_contents("https://www.ae.com/men-t-shirts/web/s-cat/90012");

$scrape1 = '<img class="item active category-product-image category-product-image-front img-responsive lazyload"';
$title = strstr($test, $scrape1);

$test = str_replace($scrape1, '', $test);

$scrape = 'sizes="(max-width: 768px) 50px, (min-width: 769px) 390px"';
$test = substr($test, 0, strpos($test, $scrape));

// echo $test;


$link = file_get_contents("https://www.ae.com/men-t-shirts/web/s-cat/90012");

$scrape1 = 'col-md-3 col-sm-6 col-xs-6" itemscope itemtype="http://schema.org/Product">';
$link = strstr($link, $scrape1);
$link = str_replace($scrape1, '', $link);

$link = strstr($link, '<a href="');
$link = str_replace('<a href="', '', $link);

$scrape2 = 'data-qa-link-to="p';
$link = substr($link, 0, strpos($link, $scrape2));

echo $link;


//<div class="product-info AEO">

// <img class="item active category-product-image category-product-image-front img-responsive lazyload"

?>
