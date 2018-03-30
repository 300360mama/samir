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
$sizeKb = 0;
$isSitemap = 'error';
$codeResponse = 'error';
$code = 0;




$validate = new Validate($_POST['urlData']);
$url = $validate->validate();


if (!$url) {
	 echo -1;
}else{

	
	$parsing = new Parsing();
	$robotsUrl = $url.'robots.txt';
	$headers = @get_headers($robotsUrl);
	$code = $parsing->getCodeResponce($headers);

	if ($headers && $parsing->isFile($headers) ) {

		$file = fopen('robots.txt', 'w');

		if(function_exists('curl_init'))
        {
        	$curl = new Curl();
		    
	        $myCurl = $curl->getCurl($robotsUrl, $file);
        }else{
        	$fileData = @file($robotsUrl);

        	$fileWrite = file_put_contents('robots.txt', $fileData);
        }		


	    fclose($file);

	    $isRobots = 'ok';
	    $codeResponse = 'ok';
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





