## Desafio: Implementar um sistema de busca de filmes usando a API do The Movie Database (TMDb) e Laravel.  

    
### Funcionalidades:

- Pesquisar filmes pelo nome.

- Exibir resultados da pesquisa.

- Exibir resultados da pesquisa.

- Exibir detalhes do filme selecionado.

- Exibir detalhes do filme selecionado.


### Requisitos:

- A pesquisa deve ser feita através da API do TMDb.

- A busca deve ser feita utilizando a funcionalidade de cache do Laravel, armazenando o resultado por 5 hora.

- A página de resultados deve exibir o nome, o poster e a sinopse de cada filme.

- A página de detalhes deve exibir o nome, o poster, a sinopse, a data de lançamento e a avaliação do filme.

- Todas as requisições feitas à API do TMDb devem ser registradas em logs.

- O sistema deve utilizar filas do Laravel para atualizar o cache de filmes em segundo plano, de forma que o cache seja atualizado em 1 hora.

- O sistema deve utilizar os princípios SOLID para garantir a manutenibilidade e escalabilidade do código.
