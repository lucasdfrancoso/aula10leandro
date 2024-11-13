<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Quadrinhos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        .imagens-marvel {
            display: flex;
            justify-content: center;
            align-items: center;    
            gap: 20px;              
            margin: 20px 0;
        }

        .imagem-marvel {
            width: 200px;
            height: auto;
            border-radius: 8px;
        }

        .loja {
            text-align: center;
            margin-top: 40px;
        }

        .loja button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            margin: 10px;
        }

        .loja button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Venda de Quadrinhos!!!!</h1>
    <h2>
        Bem-vindo à Loja Marvel!<br>
        Explore um universo repleto de aventuras incríveis com os quadrinhos da Marvel. De Homem-Aranha a Vingadores, temos uma seleção imperdível de edições clássicas, especiais e lançamentos recentes para todos os fãs, novos e veteranos.<br><br>

        Descubra edições limitadas, encadernados de luxo e ofertas exclusivas. Compre seus quadrinhos favoritos com facilidade e receba-os com segurança e rapidez.<br><br>

        Entre nesse mundo de heróis, vilões e histórias épicas.<br>
        Adquira já o seu quadrinho Marvel e mergulhe nessa jornada!
    </h2>

    <div class="imagens-marvel">
        <img src="imagens/mcu1.png" alt="Imagem 1 da Marvel" class="imagem-marvel">
        <img src="imagens/mcu2.png" alt="Imagem 2 da Marvel" class="imagem-marvel">
        <img src="imagens/mcu3.png" alt="Imagem 3 da Marvel" class="imagem-marvel">
    </div>

    <div class="loja">
        <h1>Menu de Clientes</h1>
        <button id="cadastroBtn">Cadastro</button><br/><br/>
        <button id="vendaBtn">Venda</button>
    </div>

    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>
