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

    function _construct( $key = null ){

        if( !empty( $key ) ) $this->key = $key;
    }

    function request(){
        $uri = "https://api.hgbrasil.com/" . $endpoint . "?key=" . $this->key . "&format=json";

        if( is_array( $params )){
            
            foreach( $params as $key => $value ){

                if( empty( $value ) ) continue;
                $uri .=$key . '=' . urldecode( $value ) . '&';
            }

            $uri            = substr( $uri, 0, -1 );
            $response       = @file_get_contents( $uri );
            $this->error    = false;
            return json_decode( $response, true );
        } else {

            $this->error = true;
            return false;
        }
    }
    


}



?>