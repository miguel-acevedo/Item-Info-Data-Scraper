<?php

$url = 'https://pics.ae.com/is/image/aeo/0432_9589_456_f?$cat-main_large$';

$headers = @get_headers($url, 1); // @ to suppress errors. Remove when debugging.
if (isset($headers['Content-Type'])) {
  if (strpos($headers['Content-Type'], 'image/') === FALSE) {
    echo "404";
  }
  else {
    echo "Image";
	list($width, $height) = getimagesize($url);
	echo "width: " . $width . "<br />";
	echo "height: " .  $height;
  }
}
else {
  echo "Not Image";
}

?>
