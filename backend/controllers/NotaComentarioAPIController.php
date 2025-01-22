<?php

class NotaComentarioAPIController
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

    public function getNotasComentarios($filme_id) {
        $idFilme = $filme_id[0];
        $notasComentariosModel = new NotaComentarioModel();
        $notasComentarios = $notasComentariosModel->getNotasComentarios($idFilme);

        if ($notasComentarios) {
            $this->logAPIModel->registrarLog("GET", "/api/comentarios/$idFilme", 200);
            $this->respostaApi($notasComentarios);
        } else {
            $this->logAPIModel->registrarLog("GET", "/api/comentarios/$idFilme", 404);
            $this->respostaApi(['mensagem' => 'Comentarios nao encontrados'], 404);
        }
    }
   
    public function registrarNotaComentario($filme_id, $nome_usuario, $nota, $comentario) {
        // Validação simples de dados
        if (empty($filme_id) || empty($nome_usuario) || empty($nota) || empty($comentario)) {
            $this->logAPIModel->registrarLog("POST", "/api/comentarios", 400);
            $this->respostaApi(['mensagem' => 'Todos os campos são obrigatórios.'], 400);
            return;
        }
    
        if ($nota < 1 || $nota > 5) {
            $this->logAPIModel->registrarLog("POST", "/api/comentarios", 400);
            $this->respostaApi(['mensagem' => 'Nota deve ser entre 1 e 5.'], 400);
            return;
        }
    
        // Cria o modelo para registrar a nota e comentário
        $notaComentarioModel = new NotaComentarioModel();
        
        // Aqui, você pode precisar adaptar o modelo para fazer a inserção
        $resultado = $notaComentarioModel->registrarNotaComentario($filme_id, $nome_usuario, $nota, $comentario);
    
        // Verifica se a inserção foi bem-sucedida
        if ($resultado) {
            $this->logAPIModel->registrarLog("POST", "/api/comentarios", 201);
            $this->respostaApi(['mensagem' => 'Comentário registrado com sucesso.'], 201);
        } else {
            $this->logAPIModel->registrarLog("POST", "/api/comentarios", 500);
            $this->respostaApi(['mensagem' => 'Erro ao registrar comentário.'], 500);
        }
    }
    
    
   
}
