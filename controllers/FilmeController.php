<?php
class FilmeController extends RenderView{
    public function index(){
        
    }

    public function infos($id){
        $id_filme = $id[0];
        $filme = new FilmeModel();

        $this->loadView('filmes',
        ['filme' => $filme->getFilmeById($id_filme)]);
    }
}