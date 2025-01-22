$(document).ready(function () {

    const endpoint = $('#filmeId').data('endpoint');

    if (!endpoint) {
        console.error("Nenhum endpoint fornecido.");
        return;
    }

    function formatarData(data) {
        const partes = data.split("-");
        return `${partes[2]}/${partes[1]}/${partes[0]}`;
    }

    

    $.ajax({
        url: `http://localhost/L5-Networks-StarwarsAPI/backend/api/${endpoint}`,
        method: "GET",
        dataType: "json",
        success: function (filme) {

            if (filme.id) {
                const bannerPath = `../assets/images/filmes/banner/${filme.id}.jpeg`;
                $('#filme').css({
                    backgroundImage: `url('${bannerPath}')`
                });
            }
            const dataFormatada = formatarData(filme.data_lancamento);

  
            $('#filme').append(`
            <div class="d-flex">
                <div class="px-3">
                    <img src="../assets/images/filmes/capa/${filme.id}.jpeg" width="340px" height="auto" alt="${filme.titulo}">
                </div>
                <div>
                    <h1><strong>${filme.titulo}</strong></h1>
                    <h3>Episodio: ${filme.episodio}</h2>
                    <p>Diretor: ${filme.diretor}</p>
                    <p>Produtor: ${filme.produtor}</p>
                    <p>${dataFormatada} - ${filme.idade}</p>
                    <br><br>
                    <p class="text-sm">${filme.sinopse}</p>
                </div>
            </div>
           `);

            // Personagens
            if (filme.personagens) {
                $('#personagens').append(`
            <div class="row">
                <div class="col-12 col-md-2">
                    <h2>Personagens</h2>
                </div>
                <div class="col-12 col-md-10">
                    <div class="d-flex flex-wrap gap-3">
                        ${filme.personagens.map(personagem => `
                            <div class="personagem-card">
                                <img src="../assets/images/personagens/${personagem.id}.jpg" alt="${personagem.nome}" width="150" height="200">
                                <span>${personagem.nome}</span>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        `);
            }

            // Planetas
            if (filme.planetas) {
                $('#planetas').append(`
                  <div class="row">
                <div class="col-12 col-md-2">
                    <h2>Planetas</h2>
                </div>
                <div class="col-12 col-md-10">
                    <div class="d-flex flex-wrap gap-3">
                                ${filme.planetas.map(planeta => `
                                    <div class="planeta-card">
                                        <img src="../assets/images/planetas/orbita/${planeta.id}.jpg" alt="${planeta.nome}" width="200" height="200">
                                        <span>${planeta.nome}</span>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    </div>
                `);
            }


        },
        error: function (error) {
            console.error("ERRO:", error);

            $('#filmes').append('<li>Erro ao carregar os dados do filme.</li>');
        }
    });

  

});
