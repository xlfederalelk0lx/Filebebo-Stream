<?php
/**
 * Created by PhpStorm.
 * User: xlfederalelk0lx
 * Date: 28/04/18
 * Time: 10:11
 */

namespace App;


use App\Traits\Http;
use Curl\Curl;

class Bootstrap extends Curl
{

    use Http;

    private $data = null;

    public function __construct($base_url = null)
    {
        parent::__construct($base_url);
        $this->setHeader("Accept","text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8");
        $this->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $this->setHeader("Accept-Language","es-ES,es;q=0.9,en;q=0.8,pt;q=0.7");
        $this->setReferer("https://filebebo.com/");
    }

    public function GetStream($url){
        $url = base64_decode($url);
        $data = $this->Url2JSON($url);
        if($data->path_data[2] != "" && strlen($data->path_data[2]) == 12){
            $url = $data->scheme."://".$data->host."/e/".$data->path_data[2];
            $page = $this->GetPage($url);
            $this->data = new \stdClass();
            $this->data->poster = $this->cut_str($page,"poster=\"",'"');
            $this->data->file = $this->cut_str($page,'<source src="','"');
            if($this->data->file != ""){
                return $this->data;
            }else{
                die("No se encontro ningun enlace valido para usu reproduccion");
            }
        }else{
            die("Enlace invalido");
        }
    }

}