<?php
    include_once("db/conexao.php");
    $sql = "SELECT * FROM usuarios ORDER BY nome ";
    $resultado = $conexao->query($sql);
    $num_linhas = $resultado->num_rows;
    if ($num_linhas == 0) {
        echo "";
    }
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro de Usuários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- BARRA DE MENU -->
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="principal.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesquisa.php">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- CONTEÚDO PRINCIPAL DO SITE -->
    <main>
        <div class="container my-5">
            <div class="card shadow title-card my-4 rounded-1">
                <h3 class="p-3 fw-bold">Lista de Usuários</h3>
            </div>
            <!-- RESULTADO DA PESQUISA -->
            <div class="card shadow my-4 rounded-1">
                <div class="card-body">
                    <!-- ÁREA DA PESQUISA -->
                    <div class="row">
                        <div class="col-md-4 col">
                            <div class="input-group border-end-0">
                                <input type="text" class="form-control" id="pesquisa" name="pesquisa"
                                    placeholder="Pesquise o nome ou email">
                                <button class="input-group-text bg-gradient rou"><i class="fa-solid fa-magnifying-glass"
                                        style="color: #454545"></i></button>
                            </div>
                        </div>
                        <div class="col-md-8 col-auto text-end">
                            <a href="cadastro.php" class="btn btn-primary"><i class="fa-solid fa-plus" style="color: #f5f5f5;"></i> <span class="d-md-inline d-none"> Novo Usuário
                                </span></a>
                        </div>
                    </div>
                    <div class="col-12 py-3 table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"><i class="fa-regular fa-chart-bar" style="color: #191919;"></i></th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Login</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Data de Nascimento</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $contador = 0;
                                    while ($linha = $resultado->fetch_object()) {
                                        $contador++;
                                ?>
                                <tr class="align-middle">
                                    <th scope="row"><?= $contador ?></th>
                                    <td><?= $linha->nome ?></td>
                                    <td><?= $linha->login ?></td>
                                    <td><?= $linha->email ?></td>
                                    <td><?= $linha->nascimento ?></td>
                                    <td><a href="cadastro.php?id=<?= $linha->usuario_id ?>" class="btn btn-primary btm-sm"><span data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Editar usuário"><i class="fa-regular fa-pen-to-square" style="color: #f5f5f5;"></i></span></a>
                                    <button class="btn btn-danger btm-sm"><span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Deletar usuário"><i class="fa-regular fa-trash-can" style="color: #f5f5f5;"></i></span></button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"
        integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>