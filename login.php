<?php
// /var/www/csrf/login.php
session_start();
$debugFile = "/opt/lampp/htdocs/csrf/logfile";

if (!isset($_POST['name'])) {
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
    file_put_contents($debugFile, "\nIssuing token: " . $token, FILE_APPEND | LOCK_EX);
    echo '
        <html>
            <body>

                <form  id="form" action="" method="post">
                    <input type="hidden" name="token" value="' . $token . '" />
                    Name: <input type="text" name="name"><br>
                    <input type="submit">
                </form>

            </body>
        </html>';
} else {
    if ($_POST['token'] == $_SESSION['token']) {
        file_put_contents($debugFile, "\ntoken ok: " . $_POST['name'], FILE_APPEND | LOCK_EX);
    } else {
        file_put_contents($debugFile, "\nwrong token given: " . $_POST['token'] . " expected: " . $_SESSION['token'], FILE_APPEND | LOCK_EX);
    }
}
