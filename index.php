<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="./css/main.css">
    <meta name="description" content="Hotel im Herzen Wiens">
    <meta name="keywords" content="Bachreddy">
    <title>Bachreddy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Navbar */
        .custom-navbar {
            background-color: #899db5;
        }

        .navbar-brand {
            color: #eaac8b;
            font-size: 20px;
            padding: 20px;
        }

        .navbar-brand:hover {
            color: #eaac8b;
            font-size: 20px;
            padding: 20px;
        }

        .navbar-nav::after {
            content: "";
            display: block;
            clear: both;
        }

        .navbar-nav .nav-link {
            color: whitesmoke
        }

        .navbar-nav .nav-link:hover {
            background-color: whitesmoke;
            color: #eaac8b;
        }
    </style>
</head>


<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <?php
    session_start();
    include 'header.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    switch ($page) {
        case 'impressum':
            include('impressum.php');
            break;
        case 'faq':
            include('faq.php');
            break;
        case 'registrierung':
            include('registrierung.php');
            break;
        case 'login':
            include('login.php');
            break;
        case 'hilfe':
            include('hilfe.php');
            break;
        case 'news':
            include('news.php');
            break;
        case 'zimmer':
            include('zimmer.php');
            break;
        case 'profile':
            include('profile.php');
            break;
        default:
            include('home.php');
            break;
    }

    include 'footer.php';
    ?>
</body>

</html>