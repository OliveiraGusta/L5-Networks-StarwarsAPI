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
            'descricao' => '',
            'endpoints' => $documentacaoRotas,
            'footer' => '2025 - Star Wars API',
        ]);
    }
}
