<?php
/**
 * Add language ja if access from Japan
 */
use GeoIp2\Database\Reader;

function getUrlquery($par=Array(),$op=0){

    $url = parse_url($_SERVER["REQUEST_URI"]);
    if(isset($url["query"])) parse_str($url["query"],$query);
    else $query = Array();
    foreach($par as $key => $value){

        if($key && is_null($value)) unset($query[$key]);
        else $query[$key] = $value;
    }
    $query = str_replace("=&", "&", http_build_query($query));
    $query = preg_replace("/=$/", "", $query);
    return $query ? (!$op ? "?" : "").htmlspecialchars($query, ENT_QUOTES) : "";
}

function addLanguage(){
	require_once '/home1/typograf/php/Net/vendor/autoload.php';
    $reader = new Reader('/home1/typograf/php/Net/GeoLite2-Country.mmdb');

	$ip_addr = $_SERVER['REMOTE_ADDR'];
    //$ip_addr = '157.7.205.139';
    $langJa = '';

	$referer =isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : NULL;
    $httpQuery = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];    

    if(!strstr($httpQuery, "lang")){
        if(!strstr($httpQuery, "?")){
            $langJa = "?lang=ja";
        }else{
            $langJa = getUrlquery(Array("lang"=>"ja"));
            $langJa = htmlspecialchars_decode($langJa);
        }
	}

    $record = $reader->country($ip_addr);
    $country = $record->country->name; //Japan or Germany

    // if access from Japan and the refere isn't typograffit and no language parameter //
    if($country == "Japan" && !strstr($referer, "typograffit") && !strstr($httpQuery, "lang")){
		header('Location: '.$langJa);
		exit();
	}
}
add_action('template_redirect', 'addLanguage');

?>