<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $header; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        .filme {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .filme h3 {
            margin-top: 0;
            color: #333;
        }
        .filme h4 {
            color: #666;
        }
        .filme p {
            color: #444;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<header>
    <h1><?php echo $title; ?></h1>
</header>

<div class="filme">
    <?php foreach ($filmes as $filme) { ?>
            <h3><?php echo $filme['titulo']; ?></h3>
            <p><strong>Diretor:</strong> <?php echo $filme['diretor']; ?></p>
            <p><strong>Data de Lançamento:</strong> <?php echo $filme['data_lancamento']; ?></p>
            <a href="./filmes/<?php echo $filme['id']; ?>"> Saiba mais</a>
            <br>
            <br>
        <?php } ?>
</div>

<footer>
    <?php echo $footer; ?>
</footer>

</body>
</html>
