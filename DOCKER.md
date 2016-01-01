Docker
==

Usado para o desenvolvimento em um abiente virtual e contolado, Docker é um gerenciador de conteiners amplamente usado atualmente.

Referênca
----

https://www.docker.com/

Trabalhando com Docker
----

Para criar a imagem é preciso rodar o comando a partir da raiz:

    sudo docker build -t dojo-online/carinsurance .

Ocorrendo sucesso, com uma saída parecida com `Successfully built 66683d59bc88`, podemos rodar os testes com o seguinte comando:

    sudo docker run -it --rm dojo-online/carinsurance phpunit

Ou ainda entrar no shell da imagem com o comando

    sudo docker run -it -v ${PWD}:/carinsurance dojo-online/carinsurance bash
    root@14563a10ad60:/carinsurance/projeto# composer install
    root@14563a10ad60:/carinsurance/projeto# vendor/bin/phpunit
