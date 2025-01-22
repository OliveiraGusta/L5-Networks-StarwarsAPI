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
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->getRotas() as $caminho => $controllers) {
            if (isset($controllers[$method])) {
                $controller = $controllers[$method];
                $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $caminho) . '$#';

                if (preg_match($pattern, $url, $matches)) {
                    array_shift($matches); 
                    $rotaEncontrada = true;
                    [$atualController, $metodo] = explode('@', $controller);

                    require_once __DIR__ . "/../controllers/$atualController.php";
                    $newController = new $atualController();

                    if ($method === 'POST') {
                        $data = json_decode(file_get_contents("php://input"), true);
                        $newController->$metodo($data['filme_id'], $data['nome_usuario'], $data['nota'], $data['comentario']);
                    } else {
                        $newController->$metodo($matches);
                    }

                    break;
                }
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
