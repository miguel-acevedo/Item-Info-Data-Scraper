<?php


if(isset($_GET['url']))
{
    $link = $_GET['url'];
}
else
{
    $link = "http://www.adidas.com/us/adidas-athletics-x-reigning-champ-tee/BR5566.html";
}

$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL, $link);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Xampp');
$link = curl_exec($curl_handle);
curl_close($curl_handle);

$title = $link;

$scrape1 = '<title>';
$title = strstr($title, $scrape1);
$title = str_replace($scrape1, '', $title);


$scrape2 = '</title>';
$title = substr($title, 0, strpos($title, $scrape2));

$title = str_replace(array('"','>'), '', $title);

if(strpos($link, "adidas.com") != false)
{
    $color = substr(strstr($title, '-'), strlen('-'));
    $color = substr($color, 0, strpos($color, "|"));
    $color = trim($color);
    $title = substr($title, 0, strpos($title, "-"));
    $title = str_replace('adidas', '', $title);
    $title = trim($title);
}

echo "Title: " . $title . "<br>";

echo "Color: " . $color . "<br>";

// Now getting Price

$price = $link;

$scrape1 = 'data-locale="en_US">';
$price = strstr($price, $scrape1);
$price = str_replace($scrape1, '', $price);

$scrape2 = '</span>';
$price = substr($price, 0, strpos($price, $scrape2));
$price = trim($price);

echo "Price: $" . $price . "<br>";

// Get description

$desc = $link;

$scrape1 = 'metaDescription":"';
$desc = strstr($desc, $scrape1);
$desc = str_replace($scrape1, '', $desc);

$scrape2 = '"},';
$desc = substr($desc, 0, strpos($desc, $scrape2));

//echo "Description: " . $desc . "<br>";

// Get Pictures

//echo "Color: " . $color . "<br>";

$images = $link;

$scrape1 = 'pdp-image-carousel-active-item first';
$images = strstr($images, $scrape1);
$images = str_replace($scrape1, '', $images);

$scrape2 = 'last';
$images = substr($images, 0, strpos($images, $scrape2));

// </li> <li class="pdp-image-carousel-item has-thumb " >

//$images = str_replace(array('"','//'), '', $images);

$images = explode("</li>", $images);


for ($i = 0; $i < count($images); $i++)
{
    $scrape1 = 'data-image="';
    $images[$i] = strstr($images[$i], $scrape1);
    $images[$i] = str_replace($scrape1, '', $images[$i]);

    $scrape2 = '"';
    $images[$i] = substr($images[$i], 0, strpos($images[$i], $scrape2));
}

echo "<img src='" . $images[0] ."' >";
echo "<img src='" . $images[1] ."' >";
echo "<img src='" . $images[2] ."' >";


?>
