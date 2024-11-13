<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" name="usuario" placeholder="Digite o usuário" required maxlength="25">
            <input type="password" name="senha" placeholder="Digite a senha" required maxlength="15">
            <input type="submit" value="Acessar" name="botao">
        </form>

        <?php
        if(isset($_POST["botao"])){
            require("conecta.php");
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];

            $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
            $stmt->bind_param("ss", $usuario, $senha);
            $stmt->execute();

            if ($stmt->error) {
                die("Erro na consulta: " . $stmt->error);
            }

            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                header("Location: cadastro.php");
                exit;
            } else {
                echo '<div class="error-message">Usuário ou senha inválidos.</div>';
            }
        }
        ?>

        <div class="footer">
            <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
        </div>
    </div>

</body>
</html>