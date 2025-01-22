<?php

class DocumentacaoController extends RenderView
{
    public function index()
    {
        require __DIR__ . '/../router/rotas.php';

        $documentacaoRotas = [];
        foreach ($rotas as $endpoint => $metodos) {
            foreach ($metodos as $metodo => $info) {
                $documentacaoRotas[] = [
                    'url' => $endpoint,
                    'metodo' => $metodo,
                    'descricao' => $info['descricao'],
                ];
            }
        }
        $this->loadView('documentacao', [
            'titulo' => 'Documentação da API',
            'projeto' => 'Starwars API L5.Networks',
            'versao' => "1.0.2",
            'descricao' => 'O projeto Star Wars API é uma aplicação desenvolvida como teste tecnico para a empresa L5.Networks. Ele inclui uma API RESTful que fornece acesso a informações detalhadas sobre filmes, personagens, planetas e permite que os usuários registrem e visualizem comentários e avaliações.',
            'endpoints' => $documentacaoRotas,
            'footer' => '2025 - Star Wars API',
        ]);
    }
}
