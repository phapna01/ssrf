<?php
$backlist = array('localhost', '127.0.0.1', 'file://');
if(isset($_GET['url'])){
  $url = $_GET['url'];
  foreach ($backlist as $banned) {
    die ('Access denied');
  }
}
$response = file_get_contents($url);
echo $response;

$whitelist = array('phapna4.000webhost.com', 'api.example.com');

// Get the URL to fetch from the user input
$url = $_GET['url'];

// Parse the URL to extract the hostname
$parsed_url = parse_url($url);
$hostname = $parsed_url['host'];

// Check if the hostname is in the allowed list
if (in_array($hostname, $whitelist)) {
    // The hostname is allowed, so fetch the URL
    $contents = file_get_contents($url);
    // Process the contents as needed
    echo $contents;
} else {
    // The hostname is not allowed, so return an error
    echo "Error: Hostname not allowed.";
}

  $img = "";
  if(isset($_POST['img_url'])){
    $remote_content = file_get_contents($_POST['img_url']);
    echo $remote_content;
    $image = "<img src=\"".$filename."\" width=\"100\" height=\"100\" />";
  }
  echo $image;

?>


