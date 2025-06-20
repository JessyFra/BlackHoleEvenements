<?php
http_response_code(404);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Inclusion des balises meta -->
    <?php include '../component/head.php'; ?>

    <title>Page introuvable</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: var(--color-gray-background);
        }

        h1 {
            font-size: 72px;
            color: var(--color-site-item);
        }

        p {
            font-size: 18px;
            color: var(--color-text);
        }

        .link {
            margin-top: 15px;
        }

        a {
            color: var(--color-text);
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: var(--color-text-hover);
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>404</h1>
    <p>Oups... Cette page n'existe pas !</p>
    <p class="link"><a href="home.php">Retour à l'accueil</a></p>
</body>

</html>