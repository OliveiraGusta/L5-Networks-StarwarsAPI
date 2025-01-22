<?php

class NotFoundController{
    private function respostaApi($data, $statusCode = 404) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    public function index(){
        $this->respostaApi(['mensagem' => 'Pagina nao encontrada'], 404);
    }
}