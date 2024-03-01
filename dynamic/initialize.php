<?php
if (isset($_POST['input'])) {

  $uri = $_POST['input'];

  //  echo $uri;

  //? Server lost - AWS
 // Initialize a new cURL session
$ch = curl_init();

// Set the URL for the cURL request
curl_setopt($ch, CURLOPT_URL, $uri);

// Set the option to follow redirects automatically
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// Set the option to return the response as a string instead of displaying it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set the user agent string to identify the client making the request (optional)
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3');

// Execute the cURL request and store the response in the $html variable
$html = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// The $html variable now contains the response from the URL requested (including any redirected content)
// You can process and manipulate the content of $html as needed

  $title_pattern = '/<shreddit-title\s+title="([^"]+)(?:\s*:\s*r\/[^"]+)?"\s*\/?>/'; // Define a regex pattern that matches the title attribute of the shreddit-title tag, excluding the subreddit information
  preg_match($title_pattern, $html, $title); // Use preg_match to find the first match of the pattern in the HTML code and extract the title attribute
 
  // Extract the title from the $matches array

  // echo $title;// Extract the text inside the title tag from the $matches array

  // Extracting video url 
  $video_regex = '/(https:\/\/v\.redd\.it\/[a-z0-9]+\/HLSPlaylist\.m3u8).*?/';
  preg_match($video_regex, $html, $videoUrl);

  // extracting gif url 
  $gif_regex = '/<shreddit-player[^>]*>.*?src="([^"]*\.gif\?[^"]*)".*?<\/shreddit-player>/is';
  preg_match($gif_regex, $html, $gifUrl);

  $img_regex = '/<img[^>]+src="(https:\/\/preview\.redd\.it\/[^"]+\.(jpg|png))[^>]*>/i';
  preg_match($img_regex, $html, $imageUrl);
  //  echo $imageSrc;

  $poster_regex = '/https:\/\/external-preview\.redd\.it\/\S+\.(?:png|jpg)(?:\?.*)?/i';
  preg_match($poster_regex, $html, $poster);
  // echo $poster[0];

  if (!empty($videoUrl)) {

    $url = $videoUrl[0];
    //  echo $url;
    $regex1 = '/https:\/\/v\.redd\.it\/(\w+)\/HLSPlaylist\.m3u8/';
    preg_match($regex1, $url, $video);
    $video_id = $video[1];
    // echo $video_id;
    // echo '<video controls src="https://v.redd.it/' . $video_id . '/DASH_720.mp4"  type="video/mp4" width="320"></video>';
  } elseif (!empty($gifUrl)) {

    $url = $gifUrl[1];
    $pattern = '/https:\/\/preview\.redd\.it\/(.*?)\.gif/';
    preg_match($pattern, $url, $matches);
    $gif_id = $matches[1];
    //  echo $gif_id;

    // echo '<img src="https://i.redd.it/' . $gif_id . '.png">';
  } elseif (!empty($imageUrl)) {

    $imageSrc = $imageUrl[1];
    preg_match('/-v\d-(\w+)\.(jpg|png)$/', $imageSrc, $matches);
    $image_id = $matches[1];
    //  echo $image_id;
  } else {
    echo  '<h2 class="text-center p-5">No Media Found on this URL</h2>';
  }
}
?>