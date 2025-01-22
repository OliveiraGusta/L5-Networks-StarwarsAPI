<?php

$rotas = [
    "/" => [
        'GET' => "HomeController@index"
    ],

    '/api/filmes' => [
        'GET' => 'FilmeAPIController@getFilmes'
    ],

    '/api/filmes/{id}' => [
        'GET' => 'FilmeAPIController@getFilmeById'
    ],

    '/api/comentarios' => [
        'POST' => 'NotaComentarioAPIController@registrarNotaComentario'
    ],

    '/api/comentarios/{id}' => [
        'GET' => 'NotaComentarioAPIController@getNotasComentarios' 
    ]
];
