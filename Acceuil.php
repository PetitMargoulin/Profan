<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title>PROFAN GPAO</title>
    <link href="images/logo-lycee-la-fayette.png" rel="shortcut icon" type="image/png"/>
</head>
<body>

<header>
    <?php include "templates/header.html" ?>
</header>

<main>
    <?php
    session_start();

    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
        echo 'Bonjour ' . $_SESSION['pseudo'];
    }
    ?>
</main>

<footer>
    <?php include "templates/footer.html" ?>
</footer>
</body>

</html>