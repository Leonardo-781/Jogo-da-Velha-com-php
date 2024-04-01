<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/game.css">
    <title>Jogo da Velha - <?php echo $title; ?></title>
</head>
<body>
    <div class="container py-4">
        <header>
            <h1 class="text-center fs-2 mb-4">JOGO DA VELHA</h1>
            <nav class="menu">
                <ul class="nav justify-content-center mb-4">
                    <li class="nav-item"><a class="nav-link <?php if($page == 'apresentacao') echo 'active'; ?>" href="home.php">Apresentação</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($page == 'jogo') echo 'active'; ?>" href="game.php">Jogo</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($page == 'contato') echo 'active'; ?>" href="contato.php">Contato</a></li>
                </ul>
            </nav>
        </header>

