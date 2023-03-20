A aplicação usa PostgreSQL para persistencia de dados.
aqui está o link para download: https://www.postgresql.org/download/

cofigure seu banco de dados, colocando seus dados de login no arquivo que se encontra em model/conectarDb.php

Estou usando PHP para todo o restante do sistema
aqui está o link para donwload: https://www.php.net/downloads.php


#APÓS TER INSTALADO O POSTGRESQL, EXECUTE O PASSO A PASSO QUE ESTÃO NO ARQUIVO meu_database.sql.


`````Vamos começar`````

após finalizado as instalações, inicIa agora os passos para rodar o projeto.

1° clone este repositório em uma pasta de sua preferência

link 
```
https://github.com/Rodrisc/Devs-do-RN.git
```

2° na pasta raiz do projeto, abra seu terminal e digite o comando:

```
php -S localhost:8000
```

isso irá iniciar o servidor do PHP

3° acesse o link abaixo para acessar o projeto pelo navegador

```
http://localhost:8000/views/index/index.php
```

Se tudo ocorrer bem e o banco de dados estiver ativo, vc conseguirar fazer tudo o que está disponivel na aplicação


#INFELIZMENTE NO MOMENTO A APLICAÇÃO NÃO TEM CONTROLE DE ERROS.



