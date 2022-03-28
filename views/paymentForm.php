<?php
/**
 * @var \reactlogic\liqpay\models\PaymentForm $model
 */

use yii\helpers\Html;
?>

<?php if ($model->hasErrors()): ?>
    <?= Html::errorSummary($model) ?>
<?php else: ?>
    <?= Html::submitButton($_label, ['form'=>'liqPay-form', 'class'=>$_class]) ?>
    <?= Html::beginForm('https://www.liqpay.ua/api/3/checkout', 'POST', [
        'accept-charset' => 'utf8',
        'id' => 'liqPay-form',
        'formtarget' => '_blank',
    ]); ?>
    <?= Html::activeHiddenInput($model, 'data'); ?>
    <?= Html::activeHiddenInput($model, 'signature'); ?>

    <?= Html::endForm(); ?>
<?php endif; ?>