<!DOCTYPE html>
<html>
    <head>
        <title>DOJO - Show Me The Code - TempoReal @ UniRitter - POA </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <style>
            body{
                background-color:#f7f7f7;
                text-align: center;
            }
            h1{
                color:#123363; 
            }
            ul li{
                font-size: 25px;
            }

        </style>
    </head>
    <body>
        
        <!--        <h1>DOJO - Show Me The Code - TempoReal @ UniRitter - POA</h2>-->
        <h1>Desafio:Seguradora ABUBA!</h1>
        <h2>Nós trabalhamos apenas com seguro de carros particular, nossos clientes tem o seguinte perfil/requisitos: </h2>
       A próxima vitima : <?=rand(1, 66);?>
        <ul>
            <!--<li>1º - Nome Completo, CPF, Sexo, Data de Nascimento, Telefone, Celular, Email, Estado Civil, Endereço, CNH, Nº de Contrato</li>-->
            <li>1º - Nome, CPF, Data de Nascimento, Telefone, Celular, Email, Estado Civil, Nº de Contrato</li>
            <li>2º - Faixa etaria entre 18 a 60 anos</li>
            <li>3º - Nome não pode ter mais de 15 caracteres, sem números ou especiais;</li>
            <li>3º - CPF 11 caracteres, somente números números, sem especiais;</li>
            <li>5º - Se for sexo do feminino 50% de desconto se: Idade for até 23 anos e CNH  sem pontuação;</li>
            <li>6º - Se for sexo do feminino 20% de desconto se: Idade for acima de 23 anos e Estado Civil Casada;</li>
            <li>7º - Se for sexo do feminino 10% de desconto se: Idade for acima de 30 anos e Estado Civil Solteira e CNH sem pontuação;</li>
        </ul>


    </body>
</html>



