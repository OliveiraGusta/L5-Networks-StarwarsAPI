<?php
class FilmeController extends RenderView{
    public function index(){
        
    }

    public function infos($id){
        $id_filme = $id[0];
        $filmeApi = new FilmeModel();
        $filme = $filmeApi->getFilmeApiById($id_filme);

        $this->loadView('filmes',[
            'filme' => $filme,
            'footer' => '2025 - Star Wars API',
        ]);
    }
}