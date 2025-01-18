<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $filme['title']; ?></title>
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
        <h1>Detalhes do Filme</h1>
    </header>
    
    <div class="filme">
        <h3><?php echo $filme['title']; ?> (Episódio <?php echo $filme['episode_id']; ?>)</h3>
        <a href="../">Voltar</a>
        <h4>Diretor: <?php echo $filme['director']; ?></h4>
        <p><strong>Data de Lançamento:</strong> <?php echo $filme['release_date']; ?></p>
        <p><strong>Produtor(es):</strong> <?php echo $filme['producer']; ?></p>
        <p><strong>Abertura:</strong><br> <?php echo nl2br($filme['opening_crawl']); ?></p>
        <p><strong>Personagens:</strong></p>
        <ul>
            <?php foreach ($filme['characters'] as $character) {
                echo "<li>$character</li>";
            } ?>
        </ul>
        <p><strong>Naves Estelares:</strong></p>
        <ul>
            <?php foreach ($filme['starships'] as $starship) {
                echo "<li>$starship</li>";
            } ?>
        </ul>
        <p><strong>Veículos:</strong></p>
        <ul>
            <?php foreach ($filme['vehicles'] as $vehicle) {
                echo "<li>$vehicle</li>";
            } ?>
        </ul>
        <p><strong>Espécies:</strong></p>
        <ul>
            <?php foreach ($filme['species'] as $species) {
                echo "<li>$species</li>";
            } ?>
        </ul>
        <p><strong>Planetas:</strong></p>
        <ul>
            <?php foreach ($filme['planets'] as $planet) {
                echo "<li>$planet</li>";
            } ?>
        </ul>
    </div>
    <footer>
        <?php echo $footer; ?>
    </footer>
</body>
</html>
