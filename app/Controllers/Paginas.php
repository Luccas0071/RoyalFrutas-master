<?php

class Paginas extends Controller {

  public function index() {
    $dados = [
      'titulo' => 'Pagina Inicial',
      'descricao' => 'Pagina Inicial'
    ];
    $this->view('paginas/home', $dados);
  }

  public function sobre() {
    $dados = [
      'titulo' => 'Pagina Sobre nós',
      'descricao' => 'Pagina sobre'
    ];
    $this->view('paginas/sobre', $dados);
  }

  public function produtos() {
    $dados = [
      'titulo' => 'Pagina de Produtos'
    ];
    $this->view('paginas/produtos', $dados);
  }

}

?>