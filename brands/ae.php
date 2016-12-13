<?php


if(isset($_GET['url']))
{
    $link = file_get_contents($_GET['url']);
}
else
{
    $link = file_get_contents("https://www.ae.com/women-gifts-aeo-soft-sexy-jegging-tank-true-black/web/s-prod/2360_2504_073?cm=sUS-cUSD&catId=cat6280046");
}

$title = $link;

$scrape1 = '<title>';
$title = strstr($title, $scrape1);
$title = str_replace($scrape1, '', $title);


$scrape2 = '</title>';
$title = substr($title, 0, strpos($title, $scrape2));

$title = str_replace(array('"','>'), '', $title);

if(strpos($link, "ae.com") != false)
{
    $color = substr(strstr($title, ','), strlen(','));
    $color = substr($color, 0, strpos($color, "|"));
    $color = trim($color);
    $title = substr($title, 0, strpos($title, ","));
}

echo "Title: " . $title . "<br>";

// Now getting Price

$price = $link;

$scrape1 = 'salePrice":"';
$price = strstr($price, $scrape1);
$price = str_replace($scrape1, '', $price);

$scrape2 = '",';
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

echo "Color: " . $color . "<br>";

$images = $link;

$scrape1 = 'colorName":"'. $color .'",';
$images = strstr($images, $scrape1);
$images = str_replace($scrape1, '', $images);

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
