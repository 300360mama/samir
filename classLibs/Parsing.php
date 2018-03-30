<?php


class Parsing
{


    public function isFile(array $headers){

      $strResponse = $headers[0];
      $statusCode =  explode(' ', $strResponse);

      $res = (int) $statusCode[1] === 200 ? true : false;

      return $res;
    }


    public function searchDirective($file, $pattern){

      $fileLine = file($file);

      $res = preg_grep($pattern, $fileLine);

      return $res;
    }

    public function getCodeResponce($headers){
      

      if(is_array($headers)){
         return $headers[0];

      }
     
     return 0;
    }


}