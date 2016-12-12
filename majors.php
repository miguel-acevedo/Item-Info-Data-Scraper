<?php

$main = file_get_contents("http://catalog.ucdavis.edu/catindex.html");

$link = $main;

$scrape1 = '<a href="programs/';
$link = strstr($link, $scrape1);
// $link = str_replace($scrape1, '', $link);

$scrape2 = '</a>';
$link = substr($link, 0, strpos($link, $scrape2));
$link .= '</a>';

// echo $link;

$saved_majors[0] = $link;

$main2 = $main;
$main2 = strstr($main2, $link);
$main2 = str_replace($link, '', $main2);

// echo $main2;

// Running the second instance

$link = $main2;

$scrape1 = '<a href="programs/';
$link = strstr($link, $scrape1);

$scrape2 = '</a>';
$link = substr($link, 0, strpos($link, $scrape2));
$link .= '</a>';


$saved_majors[1] = $link;

$main2 = $main;
$main2 = strstr($main2, $link);
$main2 = str_replace($link, '', $main2);

// Running third instance


$link = $main2;

$scrape1 = '<a href="programs/';
$link = strstr($link, $scrape1);

$scrape2 = '</a>';
$link = substr($link, 0, strpos($link, $scrape2));
$link .= '</a>';


$saved_majors[2] = $link;


// Displaying

echo $saved_majors[0];
echo "<br>";
echo $saved_majors[1];
echo "<br>";
echo $saved_majors[2];



?>
