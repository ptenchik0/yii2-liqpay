<?php
/**
 * @var \reactlogic\liqpay\models\PaymentForm $model
 */

use yii\helpers\Html;
?>

<?php if ($model->hasErrors()): ?>
    <?= Html::errorSummary($model) ?>
<?php else: ?>
    <?= Html::a($_label, 'https://www.liqpay.ua/api/3/checkout?data='. $model->getData() .'&signature=' . $model->getSignature(), [
            'class' => $_class
    ]); ?>
<?php endif; ?>