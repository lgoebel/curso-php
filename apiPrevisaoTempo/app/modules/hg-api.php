<?php 

/* 

Será criado uma classe HG_API para que possa acessar algumas funções, são elas:

01 - "__construct" -> construção da key

02 - "request"  -> requisição da uri

03 - "is_error" -> retornar false 

04 - "wheather" -> função principal onde retornará os resultados que preciso

*/

class HG_API_WEATHER{
    private $key   = null;
    private $error = false;

    function _construct($key = null){

        if(!empty($key)) $this->key = $key;
    }

    function request(){
        $uri = "https://api.hgbrasil.com/" . $endpoint . "?key=" . $this->key . "&format=json";
    }

}



?>