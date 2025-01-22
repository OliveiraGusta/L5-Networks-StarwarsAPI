<?php require_once __DIR__ . "/config.php"; ?>
<?php include_once('./header.php') ?>

<main class="container p-6 my-5">
    <div id="filme" class="mb-5 p-5"></div>
    <div id="personagens" class="d-flex flex-wrap mb-5"></div>
    <div id="planetas" class="d-flex flex-wrap mb-5"></div>
    <div id="filmeId" data-endpoint="<?php echo $url = '/' . (isset($_GET['url']) ? $_GET['url'] : '');($url != '/') ? $url = rtrim($url, '/') : $url; ?>">
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?php echo BASE_URL; ?>js/filmes.js"></script>

<?php include_once('./footer.php'); ?>