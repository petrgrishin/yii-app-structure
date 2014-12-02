<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */
$rootDirectory = __DIR__ . '/../';
$applicationDirectory = $rootDirectory . 'app/';

Dotenv::load($rootDirectory);
Dotenv::required(array('DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS'));

return array(
    'basePath' => $applicationDirectory,
    'components' => array(
        'db' => require __DIR__ . '/db.php',
    ),
    'modules' => array(),
);