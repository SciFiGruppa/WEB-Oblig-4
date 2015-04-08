<!DOCTYPE html>
<html>
<head>
    <title>Registrer første gang - Vedlikeholdsapplikasjon</title>
    <link rel="stylesheet" type="text/css" href="../../../stylesheet.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <section id="login">
        <header>
            <h1>Registrer bruker</h1>
        </header>
        <form action="../register.php" method="POST">
            <div>
                <input placeholder="Brukernavn" required type="text" id="username" name="username" class="type">
            </div>
            <div>
                <input placeholder="Passord" required type="password" id="password" name="password" class="type">
            </div>
            <div>
                <input placeholder="Bekreft passord" required type="password" id="password_confirm" name="password_confirm" class="type">
            </div>
            <div>
                <input type="submit" name="register" value="Registrer" id="register" class="submit">
            </div>
        </form>
    </section>
</body>
</html>