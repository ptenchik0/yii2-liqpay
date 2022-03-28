<?php

namespace reactlogic\liqpay;

use Yii;

/**
 * This is just an example.
 */
class LiqPayWidget extends \yii\base\Widget
{
    /**
     * LiqPay payment params
     * See doc: https://www.liqpay.ua/documentation/api/aquiring/checkout/doc
     * @var array $data
     */
    public $data = array();

    /**
     * paymentForm | paymentLink
     * @var string $type
     */
    public $type = 'paymentForm';

    public $label;
    public $css_class;

    public function run()
    {
        /** @var \reactlogic\liqpay\Module $liqPay */
        $liqPay = Yii::$app->getModule('liqpay');
        $model = $liqPay->buildForm($this->data);
        $model->validate();

        return $this->render($this->type, [
            'model' => $model,
            'type' => $this->type,
            '_label' => $this->label,
            '_class' => $this->css_class,
        ]);
    }
}
