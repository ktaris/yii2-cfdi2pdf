<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi2pdf;

use Yii;
use kartik\mpdf\Pdf;

class Cfdi2Pdf
{
    public $plantilla = self::PLANTILLA_DEFAULT;
    public $destino = Pdf::DEST_BROWSER;

    const PLANTILLA_DEFAULT = 'default';

    protected $_cfdi;

    public function crearPdf($cfdiObj)
    {
        $this->_cfdi = $cfdiObj;

        $contenido = $this->obtenerContenido();

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => $this->destino,
            'content' => $contenido,
            'methods' => [
                'SetHeader'=>[''],
                'SetFooter'=>[''],
            ]
        ]);

        return $pdf;
    }

    /**
     * Regresa el HTML a ser utilizado en base a la plantilla
     * utilizada.
     *
     * @return string HTML para el PDF.
     */
    protected function obtenerContenido()
    {
        if (empty($this->plantilla)) {
            $this->plantilla = self::PLANTILLA_DEFAULT;
        }

        $content = Yii::$app->controller->renderPartial('@vendor/ktaris/yii2-cfdi2pdf/templates/'.$this->plantilla.'/views/template', [
            'CFDI' => $this->_cfdi,
        ]);

        return $content;
    }
}
