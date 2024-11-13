<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            background-color: #f1f1f1;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Venda de Produtos:</h1>

    <div class="form-container">
        <form method="POST" action="">
            <h2>Dados do Cliente</h2>
            Nome: <input type="text" name="cliente_nome" required><br>
            Celular: <input type="text" name="cliente_celular" required><br>
            Email: <input type="email" name="cliente_email" required><br>

            <h2>Produtos</h2>
            Produto 1 - Nome: <input type="text" name="produto1_nome" required>
            Preço: <input type="number" name="produto1_preco" required><br>
            Quantidade: <input type="number" name="produto1_quantidade" required><br><br>

            Produto 2 - Nome: <input type="text" name="produto2_nome" required>
            Preço: <input type="number" name="produto2_preco" required><br>
            Quantidade: <input type="number" name="produto2_quantidade" required><br><br>

            Produto 3 - Nome: <input type="text" name="produto3_nome" required>
            Preço: <input type="number" name="produto3_preco" required><br>
            Quantidade: <input type="number" name="produto3_quantidade" required><br><br>

            <h2>Frete</h2>
            <select name="frete" required>
                <option value="0">Selecione o frete</option>
                <option value="10">Frete Normal - R$ 10,00</option>
                <option value="20">Frete Expresso - R$ 20,00</option>
                <option value="30">Frete Internacional - R$ 30,00</option>
            </select><br><br>

            <button type="submit" name="calcular">Calcular Total</button>
        </form>

        <?php
        if (isset($_POST["calcular"])) {
            // Coletando os dados do formulário
            $cliente_nome = $_POST["cliente_nome"];
            $cliente_celular = $_POST["cliente_celular"];
            $cliente_email = $_POST["cliente_email"];

            // Dados dos produtos
            $produto1_nome = $_POST["produto1_nome"];
            $produto1_preco = $_POST["produto1_preco"];
            $produto1_quantidade = $_POST["produto1_quantidade"];

            $produto2_nome = $_POST["produto2_nome"];
            $produto2_preco = $_POST["produto2_preco"];
            $produto2_quantidade = $_POST["produto2_quantidade"];

            $produto3_nome = $_POST["produto3_nome"];
            $produto3_preco = $_POST["produto3_preco"];
            $produto3_quantidade = $_POST["produto3_quantidade"];

            // Frete
            $frete = $_POST["frete"];

            // Cálculo do total
            $total_produto1 = $produto1_preco * $produto1_quantidade;
            $total_produto2 = $produto2_preco * $produto2_quantidade;
            $total_produto3 = $produto3_preco * $produto3_quantidade;
            $total_frete = $frete;

            $total_compra = $total_produto1 + $total_produto2 + $total_produto3 + $total_frete;

            // Exibindo o resumo da compra
            echo "<div class='result'>";
            echo "<h3>Resumo da Compra</h3>";
            echo "Cliente: $cliente_nome<br>";
            echo "Celular: $cliente_celular<br>";
            echo "Email: $cliente_email<br><br>";
            echo "Produto 1: $produto1_nome - Preço: R$ $produto1_preco - Quantidade: $produto1_quantidade - Total: R$ $total_produto1<br>";
            echo "Produto 2: $produto2_nome - Preço: R$ $produto2_preco - Quantidade: $produto2_quantidade - Total: R$ $total_produto2<br>";
            echo "Produto 3: $produto3_nome - Preço: R$ $produto3_preco - Quantidade: $produto3_quantidade - Total: R$ $total_produto3<br><br>";
            echo "Frete: R$ $total_frete<br><br>";
            echo "<strong>Total Final: R$ $total_compra</strong><br>";

            // Inserindo na tabela vendas (banco de dados)
            require("conecta.php");

            $stmt = $mysqli->prepare("INSERT INTO vendas (cliente_nome, cliente_celular, cliente_email, produto1_nome, produto1_preco, produto1_quantidade, produto2_nome, produto2_preco, produto2_quantidade, produto3_nome, produto3_preco, produto3_quantidade, frete, total_compra) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssdisdidsd", 
                $cliente_nome, $cliente_celular, $cliente_email, 
                $produto1_nome, $produto1_preco, $produto1_quantidade, 
                $produto2_nome, $produto2_preco, $produto2_quantidade, 
                $produto3_nome, $produto3_preco, $produto3_quantidade, 
                $frete, $total_compra);
            
            if ($stmt->execute()) {
                echo "<br><strong>Dados salvos com sucesso na tabela 'vendas'.</strong>";
            } else {
                echo "<br><strong>Erro ao salvar os dados.</strong>";
            }

            $stmt->close();
        }
        ?>

        <a href="../index.php" class="back-link">Voltar</a>
    </div>

</body>
</html>
