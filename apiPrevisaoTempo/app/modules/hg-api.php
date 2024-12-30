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

    // >> CONSTRUTOR
    public function __construct( $key = null ){

        if( !empty( $key ) ) {

            $this->key = $key;
        }
    }

    /*
    
    public function request($endpoint, $params = []){
        if( !is_string($endpoint) || !is_array($params)){

            throw new InvalidArgumentException("Parâmetros inválidos!");
        }

        $uri = "https://api.hgbrasil.com/{$endpoint}?woeid={$this->key}&format=json";

        if(!empty($params)){

            $uri .= '&' . http_build_query($params);
        }

        try{
            $response = file_get_contents($uri);
            if($response === false){
                throw new Exception("Error ao realizar a requisição.");
            }

            $this->error = false;
            return json_decode($response, true);

        } catch(Exception $e){
            
            $this->error = true;
            return false;
        }
    }

    */

    // >> MÉTODO
    public function request( $endpoint = '', $params = array()){
        $uri = "https://api.hgbrasil.com/" . $endpoint . "?woeid=" . $this->key . "&format=json";

        if( is_array($params)){
            
            foreach( $params as $key => $value ){

                if( empty( $value ) ) continue;
                $uri .=$key . '=' . urldecode( $value ) . '&';
            }

            $uri            = substr( $uri, 0, -1 );
            $response       = @file_get_contents( $uri );
            $this->error    = false;
            return json_decode( $response, true );
        } else {
            // >> TRATAMENTO DE ERRO
            $this->error = true;
            return false;
        }
    }
    
    // >> MÉTODO
    public function is_error(){
        
        return $this-> error;
    }
    
    public function weather(){

        $data = $this->request('weather');

        if (!empty($data) && is_array($data['results']['forecast']['0'])){
            $this->error = false;
            return $data['results']['forecast']['0'];
        } else {
            $this->error = true;
            return false;
        }
    }

}

?>