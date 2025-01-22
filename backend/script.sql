CREATE DATABASE IF NOT EXISTS db_starwars_filmes;
USE db_starwars_filmes;

CREATE TABLE tb_logs_api (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_hora DATETIME NOT NULL,
    metodo VARCHAR(255) NOT NULL,
    endpoint TEXT,
    status INT,
);
