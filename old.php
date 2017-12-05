<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">



<!-- script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>
  <div class="bxslider">
<div><img src="hyco/1.jpg" title="Funky roots"></div>
<div><img src="hyco/2.jpg" title="The long and winding road"></div>
<div><img src="hyco/3.jpg" title="Happy trees"></div>
</div>

<div class="container">
<h1>108 Lake Ridge Pl.</h1>
</div>

<div id="map" ></div>

<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "56206722-7kfX4lVEgy9FAUX1o9yzZSglLQLCmbjmrI5V6Nhn2",
    'oauth_access_token_secret' => "5SAoQthQo0ccyvHH9LHQf5B0aYnaTiQTW8sbU7IhFm6m9
",
    'consumer_key' => "ayaZK5cgiPe1UqDsCUceVIcba",
    'consumer_secret' => "l7WBS1pks2Hkp8OraYChYQttoO3u4aJ3ULbficnszjlC4Qb7Hb
"
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
$getfield = '?q=steven_king';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$tweetData = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc=TRUE);
var_dump($tweetData);
           //   foreach($tweetData['statuses'] as $index => $items){
           //   $userArray = $items['user'];
           //   echo '<div class=<a href="http://twitter.com/' . $userArray['screen_name'] . '"><img src="' . $userArray['profile_image_url'] . '"></a>';
           //   echo $userArray['screen_name'] . "<br />";
           //   echo $items['text']. "<br />";
           // }
           ?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsNnreQxD3O0ULsiKK-ItEgwK9SjgIErE&callback=initMap"
async defer></script>

<script>
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 35.94726, lng: -79.10057},
      zoom: 16
    });

  var marker = new google.maps.Marker({
     position: {lat: 35.94726, lng: -79.10057},
     map: map,
     title: 'Hello World!'
   });
 }
</script>

<!-- End SlidesJS Required: Start Slides -->

<!-- SlidesJS Required: Link to jQuery -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<!-- End SlidesJS Required -->

<!-- SlidesJS Required: Link to jquery.slides.js -->
<script src="js/jquery.slides.min.js"></script>
<!-- End SlidesJS Required -->

<!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>



<script>
$(function(){
$('.bxslider').bxSlider({
mode: 'fade',
captions: true,
slideWidth: 600
});
});
</script>





</body>
</html>
