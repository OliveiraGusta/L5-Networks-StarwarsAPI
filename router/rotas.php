<?php

$rotas = [
    "/" => "HomeController@index",
    '/api/filmes' => 'FilmeAPIController@getFilmes',
    '/api/filmes/{id}' => 'FilmeAPIController@getFilmeById' 
];
?>