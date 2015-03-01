<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */
use PetrGrishin\ArrayMap\ArrayMap;

$rootDirectory = __DIR__ . '/../';
$applicationDirectory = $rootDirectory . 'app/';
$runtimeDirectory = $rootDirectory . 'runtime/';
$publicDirectory = $rootDirectory . 'public/';
$tmpDirectory = $runtimeDirectory . 'tmp/';
$logDirectory = $runtimeDirectory . 'log/';

Dotenv::load($rootDirectory);
Dotenv::required('APP_ENV', array('production', 'test', 'dev'));
$environment = getenv('APP_ENV');

Dotenv::required(array('DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS'));

$config = array(
    'basePath' => $applicationDirectory,
    'runtimePath' => $runtimeDirectory,
    'aliases' => array(
        'webroot' => $rootDirectory . '/public',
    ),
    'preload' => array(
        'log',
    ),
    'components' => array(
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                'appLog' => array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning, info',
                    'logFile' => 'log/application.log'
                )
            ),
        ),
        'db' => array(
            'connectionString' => sprintf('mysql:host=%s;dbname=%s', getenv('DB_HOST'), getenv('DB_NAME')),
            'username' => getenv('DB_USER'),
            'password' => getenv('DB_PASS'),
            'charset' => 'utf8',
            'schemaCachingDuration' => 3600,
        ),
    ),
    'modules' => array(),
);

if (file_exists($envConfigFile = sprintf('%s/env/%s.php', __DIR__, $environment))) {
    $envConfig = require $envConfigFile;
    is_array($envConfig) && $config = ArrayMap::create($config)
        ->replaceWith($envConfig)
        ->getArray();
}

return $config;
