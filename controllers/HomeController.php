<?php


class HomeController extends RenderView{
    public function index() {
        $filmes = new FilmeModel();
        
        $this->loadView('home',[
            'title' => 'Star Wars API Home',
            'header' => 'Star Wars API',
            'filmes' => $filmes->getFilmes(),
            'footer' => '2025 - Star Wars API',
    
        ]);
    }
}