CREATE DATABASE IF NOT EXISTS db_starwars_filmes;
use db_starwars_filmes;

CREATE TABLE tb_filmes (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,   -- Título do filme
    episodio INT NOT NULL,          -- episodio
    diretor VARCHAR(255) NOT NULL,  -- Nome do diretor
    data_de_lancamento DATE,        -- Data de lançamento
    nota FLOAT DEFAULT 0            -- Nota do filme
);