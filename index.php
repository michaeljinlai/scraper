
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '392412037615435',
            xfbml      : true,
            version    : 'v2.4'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script src='http://connect.facebook.net/en_US/all.js'></script>

<?php

//Must have this to use the parser
include('simple_html_dom.php');



$EMAIL = "i_like_something@hotmail.com";
$PASSWORD = "Shana520";

function cURL($url, $header=NULL, $cookie=NULL, $p=NULL)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, $header);
    curl_setopt($ch, CURLOPT_NOBODY, $header);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    if ($p) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $p);
    }
    $result = curl_exec($ch);

    if ($result) {
        return $result;
    } else {
        return curl_error($ch);
    }
    curl_close($ch);
}

// get DOM from URL or file
$html = file_get_html('https://www.facebook.com/search/str/i_like_something%40hotmail.com/keywords_top');

echo file_get_contents('https://www.facebook.com/search/str/i_like_something%40hotmail.com/keywords_top');


// find all image
foreach($html->find('img') as $e){
    echo "<img src=\"".$e->src."\">".$e->src . '<br>';

    //I think this displays the image as it is shown on the web page
    //echo "<img src=\"".$e->src."\">";

    //This makes the image really big for some reason
    //I think it just displays the image without any dimension restrictions
    //echo $e;
}






?>