<?php

/**
* 
*/
class Validate
{

	private $postData = false;
	public function __construct($post){
		$this->postData = $post;
	}

	public function isPost($post){

		if(!empty($post)){
			return true;
		}

		return false;

	}


	public function getServerRoot($url){
		$pattern = "#^https?://[0-9a-zA-Z.]+/?#";

		$res = preg_match($pattern, $url, $matches);

		if (empty($matches[0])) {
			return false;
		}

		$urlRoot = $matches[0];

		if($urlRoot[strlen($urlRoot)-1] !== '/'){
			$urlRoot = $matches[0].'/';
		}

		

		return $urlRoot;

	}

	public function validateUrl($url){

		$tmpUrl = trim($url);
		$validate = filter_var($tmpUrl, FILTER_VALIDATE_URL);

		return $validate;
	}

	public function validate(){


		if(!empty($this->isPost($this->postData))){
			$url = $this->validateUrl($this->postData);

			$urlRoot = $url ? $this->getServerRoot($url) : false;

			return $urlRoot;
		}

		return false;
	}

	
	
}