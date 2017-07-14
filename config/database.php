<?php

require_once 'config.php';

$dsn      = $config['database']['dsn'];
$username = $config['database']['username'];
$password = $config['database']['password'];
$sitename = $config['general']['sitename'];

try {

    /*
     * Declare the error mode as exception from the start
     * instead of altering it right after instantiation of the PDO object.
     *
     * I also added ATTR_EMULATE_PREPARES to force PDO to use prepared statements.
     */
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    );

    $db = new PDO($dsn, $username, $password, $options);

} catch(PDOException $e) {

    /*
     * This can be dangerous. Often when PDO fails the connection details such as
     * the DSN, username and password are leaked in the error message. By displaying
     * the error to the screen a malicious user could attack your website!
     *
     * Just provide a generic error message like: 'Application error' and log the
     * actual message (should be logged by PHP automatically if the INI
     * configuration 'log_errors' is enabled).
     */
    exit('Connection failed: ' . $e->getMessage()); // Can echo from the exit() function.

}

?>
