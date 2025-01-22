<?php

$rotas = [
    "/" => [
        'GET' => [
            'action' => "DocumentacaoController@index",
            'descricao' => "Página inicial da API"
        ]
    ],

    '/api/filmes' => [
        'GET' => [
            'action' => 'FilmeAPIController@getFilmes',
            'descricao' => "Retorna a lista de todos os filmes"
        ]
    ],

    '/api/filmes/{id}' => [
        'GET' => [
            'action' => 'FilmeAPIController@getFilmeById',
            'descricao' => "Retorna informações detalhadas de um filme pelo ID"
        ]
    ],

    '/api/comentarios' => [
        'POST' => [
            'action' => 'NotaComentarioAPIController@registrarNotaComentario',
            'descricao' => "Registra um novo comentário e nota para um filme"
        ]
    ],

    '/api/comentarios/{id}' => [
        'GET' => [
            'action' => 'NotaComentarioAPIController@getNotasComentarios',
            'descricao' => "Retorna os comentários e notas de um filme pelo ID"
        ]
    ]
];
