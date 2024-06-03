<div id="welcome">
    <div class="standard-container">
        <div class="welcome-img">
        </div>
        <div class="welcome-content">
            <?php if (isset($_SESSION['username'])): ?>
                <h2><span class="text-highlighted">Willkommen,

                    </span><br>
                    <?php echo $_SESSION['anrede'] . " " . $_SESSION['name']; ?>!
                </h2>

            <?php else: ?>
                <h2><span class="text-highlighted">Hotel Bachreddy</span><br>La Wien este belle</h2>

            <?php endif; ?>
            <p>StudentenInnen Hotel im Herzen Wiens. Für Reisende, die etwas erleben wollen.</p>
            <?php if (isset($_SESSION['username'])): ?>
                <a id="btn" href="index.php?page=zimmer"> Jetzt Zimmer reservieren </a>
            <?php else: ?>
                <a id="btn" href="index.php?page=registrierung"> Jetzt registrieren und Zimmer reservieren </a>
            <?php endif; ?>
        </div>
    </div>
</div>
</header>

<section id="about">
    <div class="standard-container">
        <div class="about-content">


            <h2> Lorem ipsum dolor sit amet</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Viverra accumsan in nisl nisi scelerisque eu ultrices vitae auctor. In egestas erat
                imperdiet sed euismod nisi. Adipiscing at in tellus integer. Orci ac auctor augue mauris augue neque
                gravida. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam. Turpis nunc eget
                lorem dolor sed viverra. Nulla facilisi cras fermentum odio eu. Facilisi etiam dignissim diam quis. Nunc
                faucibus a pellentesque sit amet porttitor eget dolor morbi.
                <br><br>
                Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. Proin fermentum leo vel
                orci porta non. Donec pretium vulputate sapien nec sagittis. Tortor id aliquet lectus proin nibh nisl.
                Vel eros donec ac odio tempor orci. Rhoncus urna neque viverra justo. Curabitur gravida arcu ac tortor
                dignissim convallis. Malesuada fames ac turpis egestas integer. Quis vel eros donec ac. Mi bibendum
                neque egestas congue.</p>
        </div>
        <div class="about-img">
            <img src="img/pexels-valeria-boltneva-827528.jpg">
        </div>
    </div>
</section>