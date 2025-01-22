<?php require_once __DIR__ . "/config.php"; ?>
<?php include_once('./header.php') ?>

<main class="container my-5">
    <ul id="filmes" class="d-flex row gy-6 justify-content-center gap-5">
    </ul>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASE_URL; ?>js/index.js"></script>

<?php include_once('./footer.php') ?>