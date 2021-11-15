<?php

class Rota {
  
    private $controlador = 'Paginas';
    private $metodo = 'index';
    private $parametros = [];

    public function __construct() {

      /*Verifica se a url existe, se existir recebe a url se não recebe 0;*/
      $url = $this->url() ? $this->url() : [0];

      /* Verificação se existe o arquivo na pasta controlador
      ucwords() serve para deixar a primeira letra maiuscula 
      se existir o arquivo passa ele para a variavel e apaga o valor da variavel $url*/
      if(file_exists('../app/Controllers/'.ucwords($url[0]).'.php')) {
        $this->controlador = ucwords($url[0]);
        unset($url[0]);
      }

      require_once '../app/Controllers/'.$this->controlador.'.php';
      $this->controlador = new $this->controlador; //Cria instancia do controlador

      if(isset($url[1])) {
        if(method_exists($this->controlador, $url[1])){
          $this->metodo = $url[1];
          unset($url[1]);
        }
      }

      $this->parametros = $url ? array_values($url) : [];
      call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
    }

    private function url(){
      $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL); //Filtrando a url para nao ter codigo malicioso

      if(isset($url)){
        $url = trim(rtrim($url, '/'));   //Retira espaçamento da url
        $url = explode('/', $url);   //Cria array da url
        return $url;
      }
    }

}
?>