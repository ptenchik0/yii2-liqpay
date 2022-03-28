<?php

namespace reactlogic\liqpay\models;


use Yii;
use yii\base\Model;

class PaymentForm extends Model
{
    const ACTION_BUY = 'pay';
    const ACTION_HOLD = 'hold';
    const ACTION_SUBSCRIBE = 'subscribe';
    const ACTION_PAYDONATE = 'paydonate';
    const ACTION_AUTH = 'auth';

    const CURRENCY_USD = 'USD';
    const CURRENCY_EUR = 'EUR';
    const CURRENCY_RUB = 'RUB';
    const CURRENCY_UAH = 'UAH';

    const LANGUAGE_UK = 'uk';
    const LANGUAGE_RU = 'ru';
    const LANGUAGE_EN = 'en';

    public $version;
    public $public_key;
    public $action;
    public $amount;
    public $currency;
    public $description;
    public $order_id;
    public $language;



    /**
     * @return string
     */
    public function formName()
    {
        return '';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['version', 'public_key', 'action', 'currency', 'description', 'order_id'], 'required'],
            [['version', 'amount'], 'number'],

            [['public_key', 'description'], 'string'],
            ['order_id', 'string', 'max' => 255],

            ['currency', 'in', 'range' => array_keys(self::getCurrencyItems())],

            ['action', 'in', 'range' => array_keys(self::getActionItems())],
            ['language', 'in', 'range' => array_keys(self::getLanguageItems())],
        ];
    }

    /**
     * @param null $key
     * @return array|null
     */
    private static function getActionItems($key = null)
    {
        $items = [
            self::ACTION_BUY => 'pay',
            self::ACTION_HOLD => 'hold',
            self::ACTION_SUBSCRIBE => 'subscribe',
            self::ACTION_PAYDONATE => 'paydonate',
            self::ACTION_AUTH => 'auth',
        ];

        if (!is_null($key)) {
            return isset($items[$key]) ? $items[$key] : null;
        }

        return $items;
    }

    /**
     * @param null $key
     * @return array|null
     */
    public function getCurrencyItems($key = null)
    {
        $items = [
            self::CURRENCY_USD => 'USD',
            self::CURRENCY_EUR => 'EUR',
            self::CURRENCY_RUB => 'RUB',
            self::CURRENCY_UAH => 'UAH',
        ];

        if (!is_null($key)) {
            return isset($items[$key]) ? $items[$key] : null;
        }

        return $items;
    }

    /**
     * @param null $key
     * @return array|null
     */
    public function getLanguageItems($key = null)
    {
        $items = [
            self::LANGUAGE_UK => 'UK',
            self::LANGUAGE_RU => 'RU',
            self::LANGUAGE_EN => 'EN',
        ];

        if (!is_null($key)) {
            return isset($items[$key]) ? $items[$key] : null;
        }

        return $items;
    }

    /**
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    public function getData()
    {
        $liqPay = Yii::$app->getModule('liqpay');
        return $liqPay->getData($this->getAttributes());
    }

    /**
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    public function getSignature()
    {
        $liqPay = Yii::$app->getModule('liqpay');
        return $liqPay->getSignature($this->getAttributes());
    }

}