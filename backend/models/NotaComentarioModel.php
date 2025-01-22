<?php

class NotaComentarioModel extends Database{
    private $pdo;

    public function __construct()
    {
      $conn = $this->getConexao();
      $this->pdo = $conn;
    }

    public function registrarNotaComentario($filme_id, $nome_usuario, $nota, $comentario) {
        try {
            $sql = "INSERT INTO tb_nota_comentarios (filme_id, nome_usuario, nota, comentario, data_hora) 
                    VALUES (:filme_id, :nome_usuario, :nota, :comentario, NOW())";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':filme_id', $filme_id, PDO::PARAM_INT);
            $stmt->bindParam(':nome_usuario', $nome_usuario, PDO::PARAM_STR);
            $stmt->bindParam(':nota', $nota, PDO::PARAM_INT);
            $stmt->bindParam(':comentario', $comentario, PDO::PARAM_STR);
            
            return $stmt->execute(); // Retorna true se a inserção for bem-sucedida
        } catch (PDOException $err) {
            echo "<script>console.log(" . $err->getMessage() . ")</script>";
            return false; // Retorna false em caso de erro
        }
    }
    

    public function getNotasComentarios($filme_id) {
        try {
            $sql = "SELECT * FROM tb_nota_comentarios WHERE filme_id = :filme_id ORDER BY data_hora DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':filme_id', $filme_id, PDO::PARAM_INT);
            $stmt->execute();
    
            $notasComentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($notasComentarios as &$comentario) {
                $comentario['id'] = intval($comentario['id']); 
                $comentario['nota'] = intval($comentario['nota']); 
                $comentario['filme_id'] = intval($comentario['filme_id']);
            }
    
            return $notasComentarios;
    
        } catch (PDOException $err) {
            echo "<script>console.log(" . $err->getMessage() . ")</script>";
            return "error: " . $err->getMessage();
        }
    }
    
}


