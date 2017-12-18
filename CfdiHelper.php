<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi2pdf;

use Yii;
use kartik\mpdf\Pdf;

class CfdiHelper
{
    public static function trimmer($texto, $longitud = 50, $separador = '<br>')
    {
        return chunk_split($texto, $longitud, $separador);
    }
}
