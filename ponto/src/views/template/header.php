<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <title>Gerenciamento de Reserva</title>
</head>
<body>
    <header class="header">
        <div class="logo">
        
        <i class="icofont-address-book ml-2"></i>

        <span class="ml-2font-weight-lightmx-3">Gerenciamento </span>
           
        </div>
        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu"></i>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
                <i  class="icofont-settings-alt"<?= md5(strtolower(trim($_SESSION['user']->email))) ?> alt="user"></i>
                <span class="ml-3">
                    <?= $_SESSION['user']->name ?>
                </span>
                <i class="icofont-simple-down mx-2"></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="logout.php">
                           
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>