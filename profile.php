<?php
if (!(isset($_SESSION['username']))) {
    echo '<script type="text/javascript">window.location.href="index.php?page=home";</script>';
}
$passwordErr = $password2Err = $usernameErr = "";
$name = $_SESSION["name"];
$nameParts = explode(" ", $name);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["anrede"])) {
        $anrede = $_SESSION["anrede"];
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
        $fname = $nameParts[0];
    } else {
        $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["lname"])) {
        $lname = $nameParts[1];
    } else {
        $lname = test_input($_POST["lname"]);
    }

    if (empty($_POST["username"])) {
        $username = $_SESSION["username"];
    } else {
        $username = test_input($_POST["username"]);
        if ($username == "admin") {
            $usernameErr = "Username muss eindeutig sein!";
        }
        if ($username == $_SESSION["username"]) {
            $usernameErr = "Username kann nicht auf den gleichen Usernamen geändert werden";
        }
    }

    if (empty($_POST["email"])) {
        $email = $_SESSION["email"];
    } else {
        $email = test_input($_POST["email"]);
    }

    if (!(empty($_POST["oldpassword"]))) {
        if (!(password_verify($_POST["oldpassword"], $_SESSION["password"]))) {
            $passwordErr = "Inkorrektes Passwort!";
        }
    }


    if (empty($_POST["password"])) {
        if (!(empty($_POST["password2"]))) {
            $password2Err = "Bitte geben Sie ihr neues Passwort zwei mal ein!";
        } else {
            $password = $_SESSION["password"];
        }
    } else {
        if (empty($_POST["password2"])) {
            $password2Err = "Bitte geben Sie ihr neues Passwort zwei mal ein!";
        } else {
            $password = test_input($_POST["password"]);
            $password2 = test_input($_POST["password2"]);
            if ($password !== $password2) {
                $password2Err = "Passwörter müssen ident sein!";
            }
        }
    }

    if (empty($passwordErr) && empty($password2Err)) {
        $_SESSION["anrede"] = $anrede;
        $_SESSION["name"] = "$fname $lname";
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = password_hash($password, PASSWORD_DEFAULT);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="de">

<body>
    <div id="profile">
        <div class="standard-container">
            <div>

                <form id="logout-form" class="col-lg-auto" method="post" action="process_logout.php">
                    <input type="hidden" name="logout" value="1">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationModal">Logout</button>
                </form>
            </div>
            <div class="profile-content">
                <h2><span class="text-highlighted">Profil</span></h2><br>
                <p style="color: whitesmoke">
                    <?php
                    echo "Willkommen " . $_SESSION["anrede"] . " " . $_SESSION["name"] . ", ihr Username ist " . $_SESSION["username"] . " und ihre Email ist " . $_SESSION["email"];
                    ?>
                </p>
            </div>
        </div>
    </div>
    <section id="form">
        <div class="standard-container">
            <form id="profile-form" class="row g-3" method="post">
                <div>
                    <label class="form-label" for="anrede">Anrede:</label>
                    <input class="form-check-input" type="radio" name="anrede" id="herr" value="herr">
                    <label class="form-check-label" for="herr">Herr</label>
                    <input class="form-check-input" type="radio" name="anrede" id="frau" value="frau">
                    <label class="form-check-label" for="frau">Frau</label>
                    <input class="form-check-input" type="radio" name="anrede" id="divers" value="divers">
                    <label class="form-check-label" for="divers">Divers</label>
                    <input class="form-check-input" type="radio" name="anrede" id="keine" value="keine">
                    <label class="form-check-label" for="keine">keine Angabe</label>
                </div>
                <div>
                    <div class="firstname">
                        <label for="fname" class="form-label">Vorname:
                        </label>
                        <input type="text" class="form-control" id="fname" name="fname"
                            placeholder="<?php echo htmlspecialchars($nameParts[0]); ?>">
                    </div>
                    <div class="lastname">
                        <label for="lname" class="form-label">Nachname:
                        </label>
                        <input type="text" class="form-control" id="lname" name="lname"
                            placeholder="<?php echo htmlspecialchars($nameParts[1]); ?>">
                    </div>
                    <div class="username">
                        <label for="username" class="form-label">Username:
                        </label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
                    </div>
                    <div class="email">
                        <label for="email" class="form-label">Email:
                        </label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="<?php echo htmlspecialchars($_SESSION["email"]); ?>">
                    </div>
                    <div class="password">
                        <label for="oldpassword" class="form-label">Altes Passwort:
                        </label>
                        <input type="password" class="form-control" id="oldpassword" name="oldpassword">
                    </div>
                    <div class="password">
                        <label for="password" class="form-label">Neues Passwort:
                        </label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="password2">
                        <label for="password2" class="form-label">Passwort wiederholen:
                        </label>
                        <input type="password" class="form-control" id="password2" name="password2">
                    </div><br>
                    <div class="submit">
                        <input type="submit" name="submit" value="Abschicken">
                    </div>
                </div>
            </form>

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
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Bestätigung</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Wollen Sie sich sicher ausloggen?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbruch</button>
                <button type="submit" form="logout-form" class="btn btn-danger">Logout</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>