<?php

class NotFoundController{

    private $logAPIModel;

    public function __construct()
    {
        $this->logAPIModel = new LogsAPIModel();
    }

    private function respostaApi($data, $statusCode = 404) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    public function index($metodo, $url){
        $this->logAPIModel->registrarLog($metodo, $url, 404);
        $this->respostaApi(['mensagem' => 'Pagina nao encontrada'], 404);
    }
}