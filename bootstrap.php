<?php
spl_autoload_register(
    function($className){   
       
        require_once "classLibs/$className.php";    

    }

);

require_once 'libs/infoTable.php';

$isRobots = 'error';
$isHost = 'error';
$quantityHost = 'error';
$sizeRobots = 'error';
$isSitemap = 'error';
$codeResponse = 'error';




$validate = new Validate($_POST['urlData']);
$url = $validate->validate();

if (!$url) {
	 echo -1;
}else{

	
	$parsing = new Parsing();

	$robotsUrl = $url.'robots.txt';
	$headers = @get_headers($robotsUrl);

	if ($headers) {

		$curl = new Curl();
		$file = fopen('robots.txt', 'w');
	    $curl->getCurl($robotsUrl, $file);
	    fclose($file);

	    $isRobots = 'ok';
	    $codeResponse = $parsing->isFile($headers) ? 'ok' : 'error';
	    $code = $parsing->getCodeResponce($headers);
        $size = filesize('robots.txt');
        $sizeKb = ceil($size/1024);
	    $sizeRobots = $size > 32*1024 ? 'error' : 'ok';

	    
       $patternHost = "~^Host:.*#?~";
       $patternSitemap = "~^Sitemap:.*#?~";
	    
	   $resHost = $parsing->searchDirective('robots.txt', $patternHost);
	   $resSitemap = $parsing->searchDirective('robots.txt', $patternSitemap);

	   $countHost = count($resHost);
	   $countSitemap = count($resSitemap);

	   if ($countHost>0){
	   	
	   	  $isHost = 'ok';
	   
	    }

	    if ($countHost === 1){
	   	
	   	   $quantityHost = 'ok';
	   
	    }

	    if ($countSitemap>0){
	   	
	   	   $isSitemap = 'ok';
	   
	    }

	    require_once 'htmlTemplate/table.html';
   
		
	}else{

		echo -1;
	}

}





