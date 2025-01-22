<?php

class LogsAPIModel extends Database{
    private $pdo;

    public function __construct()
    {
      $conn = $this->getConexao();
      $this->pdo = $conn;
    }

    public function registrarLog($metodo, $endpoint, $status){
        try {
            $dataHoraAtual = date('Y-m-d H:i:s'); 
            
            $sql = "INSERT INTO tb_logs_api (data_hora, metodo, endpoint, status) VALUES (:data_hora, :metodo, :endpoint, :status)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':data_hora', $dataHoraAtual);
            $stmt->bindParam(':metodo', $metodo);
            $stmt->bindParam(':endpoint', $endpoint);
            $stmt->bindParam(':status', $status);

            $stmt->execute();

        }catch (PDOException $err) {
            echo "<script>console.log(".$err->getMessage().")</script>";
            return "error: ".$err->getMessage();
        }
    }
}



