<?php

class Usuarios extends Controller {

    public function __construct(){
        $this->usuarioModel = $this->model('Usuario_model');
    }

    public function cadastrar(){

       $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($formulario)){
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
            ];

            /* Verificações formulario de cadastro */
            if(in_array("", $formulario)){
                if(empty($formulario['nome'])){
                    $dados['nome_erro'] = 'Preencha o campo nome';
                }
                if(empty($formulario['email'])){
                    $dados['email_erro'] = 'Preencha o campo email';
                }
                if(empty($formulario['senha'])){
                    $dados['senha_erro'] = 'Preencha o campo senha';
                }
                if(empty($formulario['confirma_senha'])){
                    $dados['confirma_senha_erro'] = 'Confirme a senha';
                }
            }else{                
                if(strlen($formulario['senha']) < 6){
                    $dados['confirma_senha_erro'] = 'A senha dete ter no minimo 6 caracteres';
                }else{
                    if($formulario['senha'] != $formulario['confirma_senha']){
                        $dados['confirma_senha_diferente'] = 'Senhas diferentes !';
                    }else{

                        if($this->usuarioModel->armazenar($dados)){
                            echo 'Cadastro realizado com Sucesso';
                        }else{
                            die("Erro ao armazenar usuario no banco de dados");
                        }



                        echo 'Pode cadastrar';
                    }
                }
            }
        var_dump($formulario);
        }else{
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
            ];
        }
 


        $this->view('usuarios/cadastrar', $dados);
    }
}
