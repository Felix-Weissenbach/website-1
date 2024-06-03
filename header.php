<header>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php?page=home">Bachreddy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=home">Startseite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=news">Nachrichten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=faq">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=impressum">Impressum</a>
                    </li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item">
                        <a class="nav-link" href="index.php?page=zimmer">Zimmer reservieren</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=profile">Profil</a>
                    </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=registrierung">Registrierung</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=login">Login</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
</header>