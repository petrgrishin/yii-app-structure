<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */
$rootDirectory = __DIR__ . '/../';
$applicationDirectory = $rootDirectory . 'app/';
$productionConfig = require __DIR__ . '/production.php';

return array(
    'basePath' => $applicationDirectory,
    'components' => $productionConfig['components'],
    'modules' => $productionConfig['modules'],
);