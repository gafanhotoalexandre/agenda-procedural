<?php
    require_once 'config/url.php';
    require_once 'config/process.php';

    // Limpando a Mensagem
    if (isset($_SESSION['msg'])) {
        $printMessage = $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }

    $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
    $scriptName = end($scriptName);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos Online</title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&family=Montserrat:wght@300;700&display=swap" rel="stylesheet"></head>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>css/styles.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/config.css">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- IMask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js" integrity="sha512-UiMZ98G+LXQNCpmcn/nxJbjM3RI6zz65RWYDNOplS8R/DaLWXveVs7QoqwqCbfkUqcI1t36PcTYc8gCFs2gkHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <header class="bg-primary">
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <a href="<?= BASE_URL ?>index.php"
                class="navbar-brand">
                <img src="<?= BASE_URL ?>img/logo.svg" alt="Agenda - Logo do Site">
            </a>

            <div>
                <ul class="navbar-nav">
                    <li id="home-link" class="nav-item <?= $scriptName == 'index.php' ? 'active' : '' ?>">
                        <a href="<?= BASE_URL ?>index.php" class="nav-link">
                            Agenda
                        </a>
                    </li>

                    <li class="nav-item <?= $scriptName == 'create.php' ? 'active' : '' ?>">
                        <a href="<?= BASE_URL ?>create.php" class="nav-link">
                            Adicionar Contato
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mb-3">