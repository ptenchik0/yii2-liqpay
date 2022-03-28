<?php
namespace reactlogic\liqpay;

use reactlogic\liqpay\Module as LiqPay;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\Application;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_REQUEST, [$this, 'processModuleUrlRules']);
    }

    public function processModuleUrlRules($event)
    {
        if(is_a(Yii::$app,'yii\web\Application')) {
            if ( !(Yii::$app->has('urlManager') && Yii::$app->urlManager->enablePrettyUrl) ) return false; // check if this app has this component set up

            if (Yii::$app->hasModule('liqpay') && Yii::$app->getModule('liqpay') instanceof LiqPay) {
                $module = Yii::$app->getModule('liqpay');
                if (isset($module->urlRules)) {
                    $urlManager = Yii::$app->getUrlManager();
                    $urlManager->addRules($module->urlRules);
                }
            }
        }
        return true;
    }
}