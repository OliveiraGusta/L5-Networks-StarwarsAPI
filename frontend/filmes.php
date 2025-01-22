<?php require_once __DIR__ . "/config.php"; ?>
<?php include_once('./header.php') ?>

<main class="container p-6 my-5">
    <div id="filme" class="mb-5 p-5"></div>
    <div id="personagens" class="d-flex flex-wrap mb-5"></div>
    <div id="planetas" class="d-flex flex-wrap mb-5"></div>
    <div id="filmeId" data-endpoint="<?php echo $url = '/' . (isset($_GET['url']) ? $_GET['url'] : '');($url != '/') ? $url = rtrim($url, '/') : $url; ?>"></div>

    <div id="comentarios" class="mb-5">
    </div>
    <div class="d-flex row justify-content-center">
        <form id="formComentario" class="col-12 col-md-6 mb-3">
            <div class="mb-3">
                <label for="nome_usuario" class="form-label">Seu Nome</label>
                <input type="text" class="form-control" id="nome_usuario" required>
            </div>
            <div class="mb-3">
                <label for="nota" class="form-label">Nota (1-5)</label>
                <input type="number" class="form-control" id="nota" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="comentario" class="form-label">Comentário</label>
                <textarea class="form-control" id="comentario" rows="2" required></textarea>
            </div>
            <button type="submit" class="btn btn-outline-light py-2 px-4 btn-sm">Enviar Comentário</button>
        </form>

        <div class="col-12 col-md-6">
            <h3 class="mt-3">Comentários</h3>
            <div id="listaComentarios"></div>
        </div>
    </div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?php echo BASE_URL; ?>js/filmes.js"></script>
<script src="<?php echo BASE_URL; ?>js/comentarios.js"></script>

<?php include_once('./footer.php'); ?>