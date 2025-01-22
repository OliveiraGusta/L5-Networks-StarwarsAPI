<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./views/assets/css/style.css">
    <title><?= $titulo; ?></title>
</head>

<body>
    <header class="bg-dark text-white text-center py-4">
            <img src="./views/assets/images/starwars.png" alt="SWAPI" class="mb-2" width="120">
    </header>

    <main class="container my-5">
        <h2><?= $projeto; ?></h2>
        <div class="d-flex flex-column">
            <h3 class=""><?= $versao; ?></h3>
            <p><?= $descricao; ?></p>
            <a href="https://github.com/OliveiraGusta/" target="_blank">Contato do Desenvolvedor</a>
            <a href="https://github.com/OliveiraGusta/L5-Networks-StarwarsAPI" target="_blank">Repositorio</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Endpoint</th>
                    <th>Método</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($endpoints as $endpoint): ?>
                    <tr>
                        <td><?= $endpoint['url']; ?></td>
                        <td><?= $endpoint['metodo']; ?></td>
                        <td><?= $endpoint['descricao']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer class="footer bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-6 d-flex gap-3 align-items-end">
                    <a href="https://www.l5.com.br" target="_blank" class="d-flex flex-column align-items-center">
                        <img src="./views/assets/images/L5Networks.png" alt="L5 Networks" class="mb-2" width="120">
                        <p class="mb-0">Teste fornecido por L5 Networks</p>
                    </a>
                    <a href="https://www.swapi.tech" target="_blank" class="d-flex flex-column align-items-center">
                        <img src="./views/assets/images/starwars.png" alt="SWAPI" class="mb-2" width="120">
                        <p class="mb-0">API utilizada SWAPI API</p>
                    </a>
                </div>

                <div class="col-md-6 text-end">
                    <img src="https://github.com/OliveiraGusta.png" alt="Gustavo Oliveira" class="rounded-circle mb-2" width="120">
                    <div class="d-flex justify-content-end gap-5">
                        <a href="https://github.com/OliveiraGusta" target="_blank" class="text-light">
                            <i class="bi bi-github icone"></i> GitHub
                        </a>
                        <a href="https://www.linkedin.com/in/oliveiragusta/" target="_blank" class="text-light">
                            <i class="bi bi-linkedin icone"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>