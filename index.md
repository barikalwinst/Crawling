<?php
include 'crawling.php';

//MA (error masih origin disallow)
//$url = 'https://www.mahkamahagung.go.id/index.php/id/';
//$img = '//*[@class="w33p pull-left"]//*';
//$kata = '//*[@class="w33p pull-left"]//*';

//badilag pengumuman
//$url ='https://badilag.mahkamahagung.go.id';
//$img = '//*[@class="jn-left"]//img';
//$kata = '//*[@class="line line-icon"]/*/*';
//$type =1;

//badilag
$url ='https://badilag.mahkamahagung.go.id';
$img = '//*[@class="jn-left"]//img';
$kata = '//*[@class="jn-right"]//*//a';
$type =0;

//PTA Medan
//$url ='https://www.pta-medan.go.id';
//$img = '//img[@class="hovereffect"]';
//$kata = '//*[@class="bt-image-link"]';
//$type =0;

//Rantauprapat
//$url = 'https://www.pa-rantauprapat.go.id';
//$img = '//img[@class="hovereffect"]';
//$kata = '//*[@class="bt-image-link"]';
//$type =0;

try {
panggildonk($url,$img,$kata, $type);

throw new customException($url,$img,$kata, $type);
}
catch(customExceptio $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
