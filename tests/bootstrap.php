<?php /** @noinspection PhpIncludeInspection */

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

use hiqdev\composer\config\Builder;
use yii\di\Container;
use yii\helpers\Yii;

// ensure we get report on all possible php errors
error_reporting(-1);

define('YII_ENABLE_ERROR_HANDLER', false);
define('YII_DEBUG', true);
define('YII_ENV', 'test');

$_SERVER['SCRIPT_NAME'] = '/' . __DIR__;
$_SERVER['SCRIPT_FILENAME'] = __FILE__;

(static function () {
    $composerAutoload = getcwd() . '/vendor/autoload.php';
    if (!is_file($composerAutoload)) {
        die('You need to set up the project dependencies using Composer');
    }

    require_once $composerAutoload;

    $container = new Container(require Builder::path('tests'));

    Yii::setContainer($container);
})();
