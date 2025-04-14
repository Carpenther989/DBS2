<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Přihlášení</title>
    <link href="css/login.css" rel="stylesheet">

    <script src="js/cookieManager.js"></script>
    <script src="js/userRecognition.js"></script>
</head>
<body>
<div class="container">
    <div class="text">
        <a href="index.php" style="text-decoration: none"><small>Zpátky domů</small></a>
    </div>

    <h3>Registrace</h3>

    <form id="login_form" action="registration-script.php" method="POST">
        <div class="form-row">
            <div class="input-data">
                <input type="text" required name="name"  autocomplete="new-password">
                <div class="underline"></div>
                <label for="name">Jméno</label>
            </div>

            <div class="input-data">
                <input type="text" required name="email"  autocomplete="new-password">
                <div class="underline"></div>
                <label for="email">Email</label>
            </div>


            <div class="input-data">
                <input type="password" required name="password"  autocomplete="new-password">
                <div class="underline"></div>
                <label for="password">Heslo</label>
            </div>
        </div>
        <div class="form-row submit-btn">
            <div class="input-data">
                <div class="inner"></div>
                <input type="submit" value="Registrovat">
            </div>
        </div>

    </form>


</div>
</body>
</html>