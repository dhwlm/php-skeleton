<?php

$scheme = $_SERVER['REQUEST_SCHEME'];

/*
 * This is counter intuitive as it obscures what DS really is and add
 * a new constant with the same value. This doesn't really serve any purpose
 * other than you saving some keystrokes at the cost of readability.
 * I would not use it.
 */
define('DS', DIRECTORY_SEPARATOR);

/*
 * You should not use DS here as they can change from different OS to OS.
 * The HTTP protocol will only accept double forward-slashes.
 *
 * You can also reuse your $scheme variable here.
 */
define('PROTOCOL',       $scheme . '://');
define('PROJECT_FOLDER', basename(dirname(__DIR__)));
define('HOST', $_SERVER['HTTP_HOST']);

/*
 * The DS here will add a third slash making the URL look like:
 *
 * http:///project_folder - This is an invalid URL.
 */

define('URL',  PROTOCOL . HOST . "/" . PROJECT_FOLDER);
define('PATH', $_SERVER['DOCUMENT_ROOT'] . PROJECT_FOLDER);

/*
 * Where does $base_path come from? Remember this should be the first
 * file that is loaded since it instantiates so many things.
 *
 * I have also change include_once to include as these files should never even
 * have the possibility to be included more than once. It also saves resources.
 */
// include $base_path . DS . 'vendor/autoload.php';
// include __DIR__ . 'functions.php';

// $base_path = constant("URL");
$base_path = constant("URL");

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", 'templates');

$config = [
    'general' => [
        'sitename' => 'iSpy',
        'email'    => 'dhawal.m@media.net'
    ],
    'database' => [
        'dsn'      => 'mysql:host=localhost;dbname=test',
        'username' => 'root',
        'password' => ''
    ]
];

/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>
