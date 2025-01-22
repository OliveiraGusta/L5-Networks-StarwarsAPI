$(document).ready(function () {
    $.ajax({
        url: "http://localhost/L5-Networks-StarwarsAPI/backend/api/filmes",
        method: "GET",
        dataType: "json",
        success: function (filmes) {
            
            for (var i = 0; i < filmes.length; i++) {
                $('#filmes').append(`
                <li class="col-md-4 col-lg-3">
                    <div>
                        <a href="./filmes/${filmes[i].id}">
                            <img src="./assets/images/filmes/capa/${filmes[i].id}.jpeg" class="card-img-top rounded-6" alt="${filmes[i].titulo}">
                        </a>
                        <div class="text-left mt-3">
                            <h5 class="my-3">${filmes[i].titulo}</h5>
                            <a href="./filmes/${filmes[i].id}" class="btn btn-outline-light py-2 px-4 btn-sm">Saiba mais</a>
                        </div>
                    </div>
                </li>
                `);
            }
        },
        error: function (error) {
            console.error("ERRO:", error);
            $('#filmes').append('<li>Erro ao carregar os dados dos filmes.</li>');
        }
    });
});
