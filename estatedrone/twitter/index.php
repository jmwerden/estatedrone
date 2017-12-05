
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>EstateDrone</title>



  <!-- SlidesJS Required (if responsive): Sets the page width to the device width. -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- End SlidesJS Required -->

  <!-- CSS for slidesjs.com example -->
  <!-- <link rel="stylesheet" href="css/example.css"> -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <style>
     /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
     #map {
       height: 100%;
     }
     /* Optional: Makes the sample page fill the window. */
     /*html, body {
       height: 100%;
       margin: 0;
       padding: 0;
     }*/
   </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
      <link rel="stylesheet" href="styles.css">
  <!-- End CSS for slidesjs.com example -->

  <!-- SlidesJS Optional: If you'd like to use this design -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="icon" href="images/icon.png">

  <!-- SlidesJS Required: -->
</head>
<body>

<h5> Tweets <a href="https://twitter.com/estatedrone">@EstateDrone</a></h5>


<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "56206722-7kfX4lVEgy9FAUX1o9yzZSglLQLCmbjmrI5V6Nhn2",
    'oauth_access_token_secret' => "5SAoQthQo0ccyvHH9LHQf5B0aYnaTiQTW8sbU7IhFm6m9",
    'consumer_key' => "ayaZK5cgiPe1UqDsCUceVIcba",
    'consumer_secret' => "l7WBS1pks2Hkp8OraYChYQttoO3u4aJ3ULbficnszjlC4Qb7Hb"
);


/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
// $url = 'https://api.twitter.com/1.1/blocks/create.json';
// $requestMethod = 'GET';
//
// /** POST fields required by the URL above. See relevant docs as above **/
// $postfields = array(
//     'screen_name' => 'usernameToBlock',
//     'skip_status' => '1'
// );
/** Perform a POST request and echo the response **/
// $twitter = new TwitterAPIExchange($settings);
// echo $twitter->buildOauth($url, $requestMethod)
//              ->setPostfields($postfields)
//              ->performRequest();
/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=estatedrone';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$tweetData = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc=TRUE);
foreach($tweetData['statuses'] as $index => $items){
  $userArray = $items['user'];
  echo '<div class=<a id="div" href="http://twitter.com/' . $userArray['screen_name'] . '"><img id="img" src="' . $userArray['profile_image_url'] . '"></a>';
  echo $userArray['screen_name'] . "<br />";
  echo $items['text']. "<br />";
}
  ?>
</body>
</html>
