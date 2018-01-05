<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi2pdf\models;

use yii\base\Model;

class AtributosAdicionales extends Model
{
    public $logotipo_url;
    public $leyenda;
    public $cancelado;

    public function rules()
    {
        return [
            [['logotipo_url', 'leyenda', 'cancelado'], 'safe'],
        ];
    }
}
