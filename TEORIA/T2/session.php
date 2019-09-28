<?php
        //No almacena la sessión, no está configurado para Apache.
        // Initialize the session.
        // If you are using session_name("something"), don't forget it now!

function activarSession()
{
    if (!isset($_SESSION["activo"])) {
        $_SESSION = array();
        setcookie(session_name(), '', time() + 10);
        $_SESSION["activo"] = 1;
        print "<h2>Hola</h2>";
        $_SESSION["usuario"] = "visitante";
        return 0;
    } else {
        if ($_SESSION['last_action'] < time() - 60 /* be a little tolerant here */ ) {
            session_destroy();
        }// destroy the session and quit

        print "<h2>Bienvenido de nuevo " . $_SESSION["usuario"] . "\n</H2>";
        return 1;
    }
}

print "</p>Cookies</p>";
print_r($_COOKIE);
print "</p>Session</p>";
print_r($_SESSION);
session_start();
if (1 == activarSession()) {
    print "<p> ya tenias una session activa</p>";
}
print "</p>Session</p>";
print_r($_SESSION);
print "Session";
print_r($_SESSION);
print "Cookies";
print_r($_COOKIE);

    ?>
    