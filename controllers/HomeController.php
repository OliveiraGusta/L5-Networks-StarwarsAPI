<?php

class HomeController extends RenderView{
    public function index() {
        $filmes = new FilmeModel();
        $filmesApi = $filmes->getFilmes();

        $this->loadView('home',[
            'title' => 'Star Wars API Home',
            'header' => 'Star Wars API',
            'filmes' => $filmesApi,
            'footer' => '2025 - Star Wars API',
        ]);
    }
}