# Star Wars API - Teste Técnico L5 Networks

Este projeto é um teste técnico desenvolvido para a empresa L5 Networks. A proposta é criar uma API que gerencia informações sobre filmes da saga Star Wars com uma interface de frontend.

## Como Rodar o Projeto

Para rodar o projeto localmente, siga os seguintes passos:

### 1. Configurar o Servidor

- Certifique-se de que tem um servidor Apache, XAMPP, WAMP ou similar instalado em sua máquina.
- Inicie o servidor Apache e MySQL.

### 2. Rodar o Script de Banco de Dados

- No diretório `backend/`, existe o arquivo `script.sql` que deve ser executado para configurar um banco de dados limpo.
  - Você pode usar o phpMyAdmin ou qualquer cliente MySQL de sua preferência para rodar o script.

### 3. Configurar as Credenciais de Conexão com o Banco de Dados

- Abra o arquivo `backend/config.php` e configure as credenciais do banco de dados:
  ```php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', ''); // Senha do seu banco
  define('DB_NAME', 'db_starwars_filmes');```

### 4. Configurar a Constante BASE_URL

- No arquivo `frontend/config.php`, defina a constante BASE_URL para corresponder ao endereço da sua aplicação:

```php 
define('BASE_URL', 'http://localhost/seu_projeto/');
```

### 5. Dependências

- O projeto utiliza jQuery e Bootstrap para o frontend, que são carregados diretamente via CDN, portanto não é necessário instalar dependências adicionais.

### Melhorias aplicadas

- Feature de Nota ao Filme: Permite que os usuários atribuam notas aos filmes.
- Feature de Comentário sobre o Filme: Permite que os usuários deixem comentários sobre os filmes.
- Feature de Imagens: Permite que os usuários visualizem melhor as informações pois todos filmes, personagens e planetas estão com suas imagens.

### Documentação de uso da API

A documentação da API pode ser encontrada na pasta backend/, onde você encontrará informações detalhadas sobre os endpoints e como interagir com a API.

### Tecnologias Utilizadas

- PHP: Para o backend, onde a API e a lógica de manipulação dos dados são processadas.
- jQuery: Para manipulação assíncrona do frontend e interações dinâmicas.
- Bootstrap: Para o layout e o estilo visual responsivo da aplicação.

### Possiveis Melhorias

- Adição de Skeletons de Carregamento: Para melhorar a experiência do usuário e tornar o carregamento do backend mais elegante.
- Sistema de Login: Implementar autenticação de usuários e admins, com validação dos comentários antes de serem registrados.
- Validação de Comentários: Criar um sistema de validação para garantir que os comentários sejam revisados antes de serem publicados.
