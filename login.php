<!DOCTYPE html>
<html>
<head>
    <title>Logg inn - Vedlikeholdsapplikasjon</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <section id="login">
        <header>
            <h1>Vennligst logg inn</h1>
        </header>
        <form action="php/login/login.php" method="POST">
            <div>
                <input placeholder="Brukernavn" required type="text" id="username" name="username" class="type">
            </div>
            <div>
                <input placeholder="Passord" required type="password" id="password" name="password" class="type">
            </div>
            <div>
                <input type="submit" name="login" value="Logg inn" id="login" class="submit">
            </div>
        </form>
    </section>
</body>
</html>