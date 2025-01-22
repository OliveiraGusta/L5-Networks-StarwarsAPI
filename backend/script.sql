CREATE DATABASE IF NOT EXISTS db_starwars_filmes;
USE db_starwars_filmes;

CREATE TABLE tb_logs_api (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_hora DATETIME NOT NULL,
    metodo VARCHAR(255) NOT NULL,
    endpoint TEXT,
    status INT,
);

CREATE TABLE tb_nota_comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filme_id INT NOT NULL,
    nome_usuario VARCHAR(255) NOT NULL,
    nota INT NOT NULL CHECK (nota >= 1 AND nota <= 5),
    comentario TEXT NOT NULL,
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
