<?php

class FilmeAPIController
{

    private $logAPIModel;

    public function __construct()
    {
        $this->logAPIModel = new LogsAPIModel();
    }

    private function respostaApi($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    public function getFilmes() {

        $filmeModel = new FilmeModel();
        $filmes = $filmeModel->getFilmes();

        if ($filmes){
            $this->logAPIModel->registrarLog("GET", "/api/filmes", 200);
            $this->respostaApi($filmes);
        }else{
            $this->logAPIModel->registrarLog("GET", "/api/filmes", 404);
            $this->respostaApi(['mensagem' => 'Nenhum filme encontrado'], 404);
            exit;
        }
       
    }
    
    public function getFilmeById($id) {
        $idFilme = $id[0];
        $filmeModel = new FilmeModel();
        $filme = $filmeModel->getFilmeById($idFilme);

        if ($filme) {
            $this->logAPIModel->registrarLog("GET", "/api/filmes/$idFilme", 200);
            $this->respostaApi($filme);
        } else {
            $this->logAPIModel->registrarLog("GET", "/api/filmes/$idFilme", 404);
            $this->respostaApi(['mensagem' => 'Filme nao encontrado'], 404);
        }
    }
   
}
