<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

require_once __DIR__ . '/../vendor/autoload.php';

$config = __DIR__ . '/../config/application.php';

Yii::createApplication(\App\ApplicationModule::className(), $config)->run();