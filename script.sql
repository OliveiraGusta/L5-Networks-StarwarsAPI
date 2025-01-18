CREATE DATABASE IF NOT EXISTS db_starwars_filmes;
USE db_starwars_filmes;

CREATE TABLE IF NOT EXISTS tb_filmes (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,   -- Título do filme
    episodio INT NOT NULL,          -- Episódio
    diretor VARCHAR(255) NOT NULL,  -- Nome do diretor
    data_de_lancamento DATE,        -- Data de lançamento
    nota FLOAT DEFAULT 0            -- Nota do filme
);


INSERT INTO tb_filmes (id, titulo, episodio, diretor, data_de_lancamento, nota) VALUES
(1, 'Uma Nova Esperança', 4, 'George Lucas', '1977-05-25', 8.6),
(2, 'O Império Contra-Ataca', 5, 'Irvin Kershner', '1980-05-21', 9),
(3, 'O Retorno de Jedi', 6, 'Richard Marquand', '1983-05-25', 8.3),
(4, 'A Ameaça Fantasma', 1, 'George Lucas', '1999-05-19', 6.5),
(5, 'Ataque dos Clones', 2, 'George Lucas', '2002-05-16', 6.6),
(6, 'A Vingança dos Sith', 3, 'George Lucas', '2005-05-19', 7.5),
(7, 'O Despertar da Força', 7, 'J.J. Abrams', '2015-12-18', 7.9),
(8, 'Os Últimos Jedi', 8, 'Rian Johnson', '2017-12-15', 7),
(9, 'A Ascensão Skywalker', 9, 'J.J. Abrams', '2019-12-20', 6.5);
