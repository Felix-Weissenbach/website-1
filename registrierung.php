<?php
$anrede = $fname = $lname = $username = $email = $password = $password2 = "";
$fnameErr = $lnameErr = $usernameErr = $emailErr = $passwordErr = $password2Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["anrede"])) {
        $anrede = "";
    } else {
        $anrede = test_input($_POST["anrede"]);
        if ($anrede == "herr") {
            $anrede = "Herr";
        } else if ($anrede == "frau") {
            $anrede = "Frau";
        } else {
            $anrede = "";
        }
    }


    if (empty($_POST["fname"])) {
        $fnameErr = "Vorname wird benötigt!";
    } else {
        $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Nachname wird benötigt!";
    } else {
        $lname = test_input($_POST["lname"]);
    }

    if (empty($_POST["username"])) {
        $usernameErr = "Username wird benötigt!";
    } else {
        $username = test_input($_POST["username"]);
        if ($username == "admin") {
            $usernameErr = "Username muss eindeutig sein!";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email wird benötigt!";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Passwort wird benötigt!";
    } else {
        $password = test_input($_POST["password"]);
    }

    if (empty($_POST["password2"])) {
        $password2Err = "Passwort wird benötigt!";
    } else {
        $password2 = test_input($_POST["password2"]);
        if ($password !== $password2) {
            $password2Err = "Passwörter müssen ident sein!";
        }
    }

    if (empty($fnameErr) && empty($lnameErr) && empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($password2Err)) {
        $_SESSION["anrede"] = $anrede;
        $_SESSION["name"] = "$fname $lname";
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = password_hash($password, PASSWORD_DEFAULT);
        echo '<script type="text/javascript">window.location.href="index.php?page=home";</script>';
        exit();
    }
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
<!DOCTYPE html>
<html lang="de">

<body>
    <div id="registrierung">
        <div class="standard-container">
            <div class="registrierung-img">
            </div>
            <div class="registrierung-content">
                <h2><span class="text-highlighted">Registrierung</span><br>Werden Sie ein Teil unseres Erlebnis</h2>
                <p> Sind Sie schon Kunde bei uns? Dann sind Sie nur einen Klick entfernt!</p>
                <a id="btn" href="index.php?page=login"> Login </a>
            </div>
        </div>
    </div>
    <section id="form">
        <div class="standard-container">
            <form id="registrierung-form" class="row g-3" method="post">
                <div >
                    <label class="form-label" for="anrede">Anrede:</label>
                    <input class="form-check-input" type="radio" name="anrede" id="herr" value="herr">
                    <label class="form-check-label" for="herr">Herr</label>
                    <input class="form-check-input" type="radio" name="anrede" id="frau" value="frau">
                    <label class="form-check-label" for="frau">Frau</label>
                    <input class="form-check-input" type="radio" name="anrede" id="divers" value="divers">
                    <label class="form-check-label" for="divers">Divers</label>
                    <input class="form-check-input" type="radio" name="anrede" id="keine" value="keine">
                    <label class="form-check-label" for="keine">keine Angabe</label>

                    <div class="firstname">
                        <label for="fname" class="form-label">Vorname:
                        </label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                    </div>
                    <div class="lastname">
                        <label for="lname" class="form-label">Nachname:
                        </label>
                        <input type="text" class="form-control" id="lname" name="lname" required>
                    </div>
                    <div class="username">
                        <label for="username" class="form-label">Username:
                        </label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="email">
                        <label for="email" class="form-label">Email:
                        </label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="password">
                        <label for="password" class="form-label">Passwort:
                        </label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="password2">
                        <label for="password2" class="form-label">Passwort wiederholen:
                        </label>
                        <input type="password" class="form-control" id="password2" name="password2" required>
                    </div><br>
                    <div class="submit">
                        <input type="submit" name="submit" value="Abschicken">
                    </div>
            </form>
            <?php if (!empty($fnameErr)): ?>
                <div class="error-message">
                    <?php echo $fnameErr; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($lnameErr)): ?>
                <div class="error-message">
                    <?php echo $lnameErr; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($usernameErr)): ?>
                <div class="error-message">
                    <?php echo $usernameErr; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($emailErr)): ?>
                <div class="error-message">
                    <?php echo $emailErr; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($passwordErr)): ?>
                <div class="error-message">
                    <?php echo $passwordErr; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($password2Err)): ?>
                <div class="error-message">
                    <?php echo $password2Err; ?>
                </div>
            <?php endif; ?>


        </div>
    </section>
</body>

</html>