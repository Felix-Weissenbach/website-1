<div id="welcome">
    <div class="standard-container">
        <div class="welcome-img">
        </div>
        <div class="welcome-content">
            <h2><span class="text-highlighted">Keine Ahnung wo sie Anfangen sollen?</span><br>Kein Problem!</h2>
            <p>Wir helfen Ihnen Schritt für Schritt durch, damit Sie auch das perfekte Zimmer für Sich finden.</p>
            <?php if (isset($_SESSION['username'])): ?>
                <a id="btn" href="index.php?page=zimmer"> Jetzt Zimmer reservieren </a>
            <?php else: ?>
                <a id="btn" href="index.php?page=registrierung"> Jetzt registrieren und Zimmer reservieren </a>
            <?php endif; ?>
            <br><br><br><br><br><br>
        </div>
    </div>
</div>
</header>

    <section id="questions">
        <div class="standard-container">
            <div class="questions">
                <span class="material-symbols-outlined">free_cancellation</span>
                <p><b>Erste Schritte</b></p>
                <p>Als erstes brauchen Sie einen Profil bei uns. Hierfür einfach oben auf die Registrierung klicken. Wenn Sie schon ein Kunde bei uns sind, drücken Sie bitte auf das Login.</p>
            </div>
            <div class="questions">
                <span class="material-symbols-outlined">key</span>
                <p><b>Zimmer Buchung</b></p>
                <p> Zurück auf der Startseite klicken Sie auf den "Jetzt Zimmer reservieren"-Knopf. Sie sollten auf die Reservierungsseite landen und hier können Sie ihr passendes Zimmer finden.</p>
            </div>
            <div class="questions">
                <span class="material-symbols-outlined">bed</span>
                <p><b>Zum Schluss</b></p>
                <p>Auf Reservierung bestätigen drucken und Sie haben ihr Zimmer bei uns erfolgreich gebucht!</p>
            </div>
        </div>
    </section>