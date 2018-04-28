<?php
/**
 * Created by PhpStorm.
 * User: xlfederalelk0lx
 * Date: 28/04/18
 * Time: 10:12
 */

namespace App\Traits;


trait Http
{

    public function GetPage($url, $post = 0, $headers = 0) {
        if (gettype($headers) == 'array' || gettype($headers) == 'object') {
            foreach ($headers as $key => $value) {
                $this->setHeader($key, $value);
            }
        }
        if (gettype($post) == 'array' || gettype($post) == 'object') {
            $this->setHeader("Content-Length", strlen(http_build_query($post)));
            $this->setHeader("Content-Type", "application/x-www-form-urlencoded");
            $this->post($url, $post);
        } else {
            $this->setOpt(CURLOPT_POST, FALSE);
            $this->setOpt(CURLOPT_POSTFIELDS, "");
            $this->get($url);
        }
        $this->setAutoCookies();
        return $this->response;
    }
    public function getStringCookies() {
        $cookies = $this->getResponseCookies();
        if(gettype($cookies)=="array" && sizeof($cookies)>0){
            $cookies = http_build_query($this->getResponseCookies());
            $cookies = str_replace("&", "; ", $cookies);
            return trim($cookies);
        }
    }
    private function setAutoCookies() {
        if ($this->cookies == '') {
            $this->cookies = $this->getStringCookies();
        } else {
            $this->cookies = "; " . $this->getStringCookies();
        }
        $this->setHeader("Cookie", $this->cookies);
        $this->setCookieString($this->cookies);
    }

    public function Url2JSON($url = ""){
        if($url != '' && filter_var($url,FILTER_VALIDATE_URL)){
            $parse = parse_url($url);
            $parse = json_decode(json_encode($parse));
            if(@$parse->path != ""){
                @$parse->path_data = explode("/",$parse->path);
                unset($parse->path_data[0]);
            }
            return $parse;
        }
    }

    public function cut_str($str, $left, $right) {
        $str = substr(stristr($str, $left), strlen($left));
        $leftLen = strlen(stristr($str, $right));
        $leftLen = $leftLen ? -($leftLen) : strlen($str);
        $str = substr($str, 0, $leftLen);
        return $str;
    }

}