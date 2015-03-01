<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

use PetrGrishin\ArrayMap\ArrayMap;

Dotenv::required(array('DB_HOST', 'TEST_DB_NAME'));

$applicationConfig = require __DIR__ . '/application.php';

$testConfig = array(
    'components' => array(
        'db' => [
            'connectionString' => sprintf('mysql:host=%s;dbname=%s', getenv('DB_HOST'), getenv('TEST_DB_NAME')),
            'schemaCachingDuration' => 0,
            'enableProfiling' => true,
        ],
    ),
);

return ArrayMap::create($applicationConfig)
    ->replaceWith($testConfig)
    ->getArray();