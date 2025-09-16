<?php
include_once("db/conexao.php");
// // variável igual a valor do post ?? se este post não existir indicar o valor "" (vazio)
// // ?? = if ternário simplificado
//     $nome = $_POST["nome"] ?? "";

//     // mesmo código que o de cima.
//     // isset = verifica se um objeto existe
//     // ? = resposta verdadeira se o objeto existe
//     // : resposta falsa, objeto não existe
//     $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";

//     if (isset($_POST["nome"])) {
//         // . é o caracter de concatenação
//         $nome = "Olá " . $_POST["nome"]. "!";
//     }
//     else {
//         $nome = "";
//     }

//     // echo ($nome)


// VERIFICAR SE FOI FEITO UM POST
$erro = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? "";
    $nascimento = $_POST["nascimento"] ?? "";
    $email = $_POST["email"] ?? "";
    $login = $_POST["login"] ?? "";
    $senha = $_POST["senha"] ?? "";
    echo("$nome - $nascimento - $email - $login - $senha");

    if (strlen($nome) < 5) {
        $erro .= "Seu nome deve conter no mínimo 5 dígitos";
    }

    if (strlen($nascimento) < 8) {
        $erro .= ", sua data de nascinmento deve estar no padrão DD/MM/AAAA";
    }

    $sql = "INSERT INTO usuarios (nome, nascimento, email, login, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssss", $nome, $nascimento, $email, $login, $senha);
    $stmt->execute();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <meta name="author" content="Rebeca Lima">
    <meta name="description" content="Minha página em PHP">
    <link rel="shortcut icon" href="https://pngdownload.io/wp-content/uploads/2024/02/PHP-Logo-symbol-of-the-scripting-language-web-development-transparent-PNG-image-jpg.webp" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container my-4">
        <!-- Barra de título -->
        
        <!-- Formulário de Cadastro -->
        
        <div class="card shadow rounded-1 bg-body-secondary my-4">
            <div class="card-header text-center">
                <h3 class="p-3 fw-bold">Cadastro de Usuário</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    <!-- nome -->
                    <div class="mb-3">
                        <label class="form-label" for="">Informe o seu nome:</label>
                        <input id="nome" class="form-control" type="text" name="nome" required minlength="5" maxlength="250">
                        <div class="invalid-feedback">
                            Informe um nome válido
                        </div>
                    </div>
                    <!-- Data Nasc -->
                    <div class="mb-3">
                        <label for="nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="nascimento" name="nascimento" required>
                        <div class="invalid-feedback">
                            Informe a data de nascimento
                        </div>
                    </div>
                    <!-- email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Informe um email valido
                        </div>
                    </div>
                    <!-- login -->
                    <div class="mb-3">
                        <label for="login" class="form-label">Login:</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                        <div class="invalid-feedback">
                            Informe um login
                        </div>
                    </div>
                    <!-- senha -->
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" required minlength="8" maxlength="16">
                        <div class="invalid-feedback">
                            Informe uma senha válida
                        </div>
                    </div>
                    <div class="pt-3">
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>