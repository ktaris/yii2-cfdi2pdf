<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi2pdf\models;

use yii\base\Model;

class CampoAdicional extends Model
{
    public $label;
    public $value;

    public function rules()
    {
        return [
            [['label', 'value'], 'required'],
        ];
    }
}
