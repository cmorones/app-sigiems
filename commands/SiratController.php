<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\modules\soporte\models\InvBajas;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

     public function actionCesar($message = 'hola Cesar')
    {
        
		
		$resultado = InvBajas::find()->orderBy('modelo')->all();

$i=1;
foreach ($resultado as $value) {
        echo $value->id .'-'.$value->progresivo. "\n";

        echo "inserta en la nueba base". "\n";
    }
    }
}
