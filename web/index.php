<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

require_once __DIR__ . '/../vendor/autoload.php';
$config = __DIR__ . '/../config/production.php';
Yii::createApplication(\App\Application::className(), $config)->run();