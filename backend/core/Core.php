<?php

class Core
{
  private $rotas;

  public function __construct($rotas)
  {
    $this->setRotas($rotas);
  }

  public function run()
  {
    $url = '/';

    isset($_GET['url']) ? $url .= $_GET['url'] : '';

    ($url != '/') ? $url = rtrim($url, '/') : $url;

    $rotaEncontrada = false;

     // Procurando rota na lista de rotas
     foreach ($this->getRotas() as $caminho => $controller) {
        $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $caminho) . '$#';

        // Verificando se a URL coincide com a rota pattern e se existem argumentos na URL
        if (preg_match($pattern, $url, $matches)) {
            array_shift($matches);

            $rotaEncontrada = true;

            // Dividindo Controller de seu método
            [$atualController, $metodo] = explode('@', $controller);
            require_once __DIR__ . "/../controllers/$atualController.php";

            $newController = new $atualController();
            $newController->$metodo($matches);
        }
    }
// Redirect caso rota não existir
if (!$rotaEncontrada) {
    require_once __DIR__ . "/../controllers/NotFoundController.php";
    $controller = new NotFoundController();
    $controller->index();
}
  }

  protected function getRotas()
  {
    return $this->rotas;
  }
  protected function setRotas($rotas)
  {
    $this->rotas = $rotas;
  }
}