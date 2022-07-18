<?php
//create with love
//coder shiroe
//2022


function panggildonk($url, $img, $kata, $type) {
date_default_timezone_set('Asia/Jakarta');
libxml_use_internal_errors(true);
//Access-Control-Allow-Origin : https://www.mahkamahagung.go.id;
ini_set('user_agent', 'My-Application/2.5');
$url_call = $url;
$context = stream_context_create(
    array(
        "https" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
        )
    )
);
$html = file_get_contents($url_call, false, $context);

$dom = new DOMDocument();
$dom->loadHTML($html);


$xpath = new DOMXPath($dom);
//$tags = $xpath->query('//a[@class="bt-title"]');

//img
$tags = $xpath->query($img);
//string
$tagx = $xpath->query($kata);


//echo $value_string_link = $tagx->item(1)->attributes->getNamedItem('href')->nodeValue;


echo "<!DOCTYPE html>
<link rel='stylesheet' href='style.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css' integrity='sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn' crossorigin='anonymous'>
";

for ($x = 0; $x <= 2; $x++) {
  
  //img loop
  $value = $tags->item($x)->attributes->getNamedItem('src')->nodeValue;
  
  //parse url
  $p=parse_url($value);
  $url_parse= $p['path'];
  

 //string loop
 if ($type ==0){
  $value_string = $tagx->item($x)->attributes->getNamedItem('title')->nodeValue; 
 }else{
  $value_string = $tagx->item($x)->nodeValue;
 }
  
  $value_string_link = $tagx->item($x)->attributes->getNamedItem('href')->nodeValue;
 
  //$value_string = $tagx->item($x)->attributes->getNamedItem('alt')->nodeValue;
  //$value_string_link = $tagx->item($x)->attributes->getNamedItem('src')->nodeValue;
  if ($type ==0){
  echo "
<div class='container card'>
<div class='row'>
<div class='col'>
  <img class='img-fluid rounded' src='$url_call$url_parse' />
   </div>
   <div class='col'>
   <b>$value_string </b>
   </div>
   <div class='w-100'></br></div>
   <div class ='col'>
  <p><a class='btn btn-success button btn-lg btn-block' href='$url_call$value_string_link' target='_blank' rel='noopener noreferrer' >Baca Berita</a></p>
</div>
</div> 
  </div>
  ";}else{
	  echo "
<div class='container card'>
<div class='row'>
   <div class='col'>
   <p>$value_string </p>
  <p><a class='btn btn-success button  btn-lg btn-block' href='$url_call$value_string_link' target='_blank' rel='noopener noreferrer' >Baca Pengumuman</a></p>
</div>
</div> 
  </div>
  ";
  }
	} 

	return true;

}


