<?php

// $test = file_get_contents("https://www.ae.com/men-aeo-360-extreme-flex-long-sleeve-t-shirt-bold-black/web/s-prod/2171_8522_064");
$link = file_get_contents("https://www.ae.com/men-aeo-flex-solid-pique-polo-burgundy/web/s-prod/1165_8500_613?cm=sUS-cUSD&catId=cat3130041&mmCat=cat8060002");

$title = $link;

$scrape1 = '<title>';
$title = strstr($title, $scrape1);
$title = str_replace($scrape1, '', $title);

//$title = strstr($title, '<a href="');
//$title = str_replace('<a href="', '', $title);

$scrape2 = '</title>';
$title = substr($title, 0, strpos($title, $scrape2));

$title = str_replace(array('"','>'), '', $title);

if(strpos($link, "ae.com") != false)
{
    $title = substr($title, 0, strpos($title, ","));
}

echo "Title: " . $title . "<br>";

// Now getting Price

$price = $link;

$scrape1 = 'salePrice":"';
$price = strstr($price, $scrape1);
$price = str_replace($scrape1, '', $price);

$scrape2 = '","seoTitle';
$price = substr($price, 0, strpos($price, $scrape2));

echo "Price: $" . $price . "<br>";

// Get description

$desc = $link;

$scrape1 = 'metaDescription":"';
$desc = strstr($desc, $scrape1);
$desc = str_replace($scrape1, '', $desc);

$scrape2 = '"},';
$desc = substr($desc, 0, strpos($desc, $scrape2));

echo "Description: " . $desc . "<br>";

// Get Pictures

$images = $link;

$scrape1 = '"largeImages":[';
$images = strstr($images, $scrape1);
$images = str_replace($scrape1, '', $images);

$scrape2 = '],';
$images = substr($images, 0, strpos($images, $scrape2));

$images = str_replace(array('"','//'), '', $images);
$images = explode(",", $images);

// arrays images[0];

echo "<img src='http://" . $images[0] ."' >";
echo "<img src='http://" . $images[1] ."' >";
echo "<img src='http://" . $images[2] ."' >";


?>
