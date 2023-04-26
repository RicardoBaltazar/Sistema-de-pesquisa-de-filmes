## Desafio: Implementar um sistema de busca de filmes usando a API do The Movie Database (TMDb) e Laravel.  

    
### Funcionalidades:

- Pesquisar filmes pelo nome.

- Exibir resultados da pesquisa.

- Exibir detalhes do filme selecionado.

### Sobre o desafio.  

- O sistema armazena a resposta da API externa por 5 horas. Após esse tempo, o cache é atualizado com uma nova pesquisa através de filas.

- Todas as requisições feitas são registradas em logs. Os logs pode ser vistos com laravel telescope.

- Meu objetivo com este projeto é praticar conceitos de cache, filas, e solid usando o framework laravel.

- API externa que utilizei no desafio: https://developers.themoviedb.org/3

- O desafio utiliza php 8.1
