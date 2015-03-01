<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

$rootDirectory = __DIR__ . '/../';
$applicationDirectory = $rootDirectory . 'app/';
$runtimeDirectory = $rootDirectory . 'runtime/';
$publicDirectory = $rootDirectory . 'public/';
$tmpDirectory = $runtimeDirectory . 'tmp/';
$logDirectory = $runtimeDirectory . 'log/';

$applicationConfig = require __DIR__ . '/application.php';

return array(
    'basePath' => $applicationDirectory,
    'components' => $applicationConfig['components'],
    'modules' => $applicationConfig['modules'],
);