<div id="login">
    <div class="standard-container">
        <div class="login-img">
        </div>
        <div class="login-content">
            <h2><span class="text-highlighted">Registrierung</span><br>Werden Sie ein Teil unseres Erlebnis</h2>
            <form method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br>
                <label for="password">Passwort:</label><br>
                <input type="password" id="password" name="password"><br>
                <input type="submit" name="submit"><br>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(isset($_POST["password"]) && isset($_POST["username"]))
                {
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $username = $_POST["username"];
                    if(password_verify("admin", $password) && ($username == "admin"))
                    {
                        $_SESSION["anrede"] = "";
                        $_SESSION["name"] = "Admin Admin";
                        $_SESSION["username"] = "Admin";
                        $_SESSION["email"] = "admin@admin.at";
                        $_SESSION["password"] = $password;
                        $anrede = $_SESSION["anrede"];
                        $name = $_SESSION["name"];
                        echo '<script type="text/javascript">window.location.href="index.php?page=home";</script>';
                    }
                    else
                    {
                        echo "Ungültiger Username oder Passwort";
                    }
                }
            }
            ?>
            <p> Neu bei uns? Registrieren Sie sich noch heute!</p>
            <a id="btn" href="index.php?page=registrierung"> Neu bei Bachreddy </a>
        </div>
    </div>
</div>