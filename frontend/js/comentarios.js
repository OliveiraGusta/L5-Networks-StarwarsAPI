$(document).ready(function() {
    const filmeId = window.location.pathname.split('/').pop();
    
    function carregarComentarios() {
        $.ajax({
            url: `http://localhost/L5-Networks-StarwarsAPI/backend/api/comentarios/${filmeId}`,
            method: 'GET',
            success: function(data) {
                let comentariosHTML = '';
                data.forEach(function(comentario) {
                    comentariosHTML += `
                        <div class="comentario">
                            <p><strong>${comentario.nome_usuario}</strong> - ${comentario.nota} estrelas</p>
                            <p>${comentario.comentario}</p>
                            <hr>
                        </div>
                    `;
                });
                $('#listaComentarios').html(comentariosHTML);
            },
            error: function() {
                $('#listaComentarios').html('<p>Esse filme não tem uma nota ou comentário, seja o primeiro!</p>');
            }
        });
    }

    carregarComentarios();

    $('#formComentario').submit(function(e) {
        e.preventDefault();

        const nomeUsuario = $('#nome_usuario').val();
        const nota = $('#nota').val();
        const comentario = $('#comentario').val();

        $.ajax({
            url: 'http://localhost/L5-Networks-StarwarsAPI/backend/api/comentarios',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                filme_id: filmeId,
                nome_usuario: nomeUsuario,
                nota: nota,
                comentario: comentario
            }),
            success: function() {
                alert('Comentário enviado com sucesso!');
                $('#formComentario')[0].reset();
                carregarComentarios();
            },
            error: function() {
                alert('Erro ao enviar comentário!');
            }
        });
    });
});
