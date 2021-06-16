<?php 

if(isset($_POST['submit'])){
    $html = file_get_contents('https://c.xkcd.com/random/comic/');

    preg_match("<meta\sproperty=\"og:url\"\scontent=\"https:\/\/xkcd.com\/([0-9]*)\/\">", $html,$matches,PREG_OFFSET_CAPTURE,0);
    
    
    $string = $matches[1][0];
    $position = '16';
    
    $newUrl = substr_replace('http://xkcd.com//info.0.json', $string, $position, 0 );
    
    $response = file_get_contents($newUrl);
    $response = json_decode($response, true);
    $imgURL = $response['img'];
    
    echo "<img src=\"$imgURL\" alt=\"random\">";
    
}

?>
