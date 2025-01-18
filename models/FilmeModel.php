<?php 

class FilmeModel extends Database{
    private $pdo;

    public function __construct()
    {
      $conn = $this->getConnection();
      $this->pdo = $conn;
    }

    public function getFilmes(){
        {
            try {
              $stm = $this->pdo->query("SELECT * FROM tb_filmes");
              if ($stm->rowCount() > 0) {
                return $stm->fetchAll(PDO::FETCH_ASSOC);
              } else {
                return [];
              }
            } catch (PDOException $err) {
              return [];
            }
          }
        
    }

    public function getFilmeById($id){
        $stm = $this->pdo->prepare("SELECT * FROM tb_filmes WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }


}