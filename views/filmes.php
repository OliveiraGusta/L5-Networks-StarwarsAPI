<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Filme</title>
</head>
<body>
    <h1>Detalhes do Filme</h1>
    <?php if (!empty($filme)): ?>
        <div>
            <h2><?php echo $filme['titulo']; ?></h2>
            <p><strong>Episódio:</strong> <?php echo $filme['episodio']; ?></p>
            <p><strong>Diretor:</strong> <?php echo $filme['diretor']; ?></p>
            <p><strong>Data de Lançamento:</strong> <?php echo date('d/m/Y', strtotime($filme['data_de_lancamento'])); ?></p>
            <p><strong>Nota:</strong> <?php echo $filme['nota']; ?></p>
            <a href="<?php echo "../" ?>">Voltar</a>


        </div>
    <?php else: ?>
        <p>Filme não encontrado.</p>
        <a href="<?php echo "../" ?>">Voltar</a>

    <?php endif; ?>
</body>
</html>
