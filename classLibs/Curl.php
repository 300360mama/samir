<?php

class Curl
{

    private $option = [
        'header'=>0,
        'user-agent'=>'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',
        'referer'=> 'http://www.google.com'

        ];



    public function getCurl($url, $file){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, $this->option['header']);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->option['user-agent']);
        curl_setopt($ch, CURLOPT_REFERER, $this->option['referer']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FILE, $file);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $html = curl_exec($ch);

        curl_close($ch);

       

        return $html;

    }



}

