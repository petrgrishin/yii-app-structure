<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */
$rootDirectory = __DIR__ . '/../';
$applicationDirectory = $rootDirectory . 'app/';

return array(
    'basePath' => $applicationDirectory,
    'components' => array(
        'db' => require __DIR__ . '/db.php',
    ),
    'modules' => array(),
);