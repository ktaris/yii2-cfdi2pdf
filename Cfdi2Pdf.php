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

    public function crearPdfParaNavegador($cfdiObj)
    {
        $this->_cfdi = $cfdiObj;
        $this->destino = Pdf::DEST_BROWSER;
        $pdf = $this->_crearPdf();

        $contenido = $this->obtenerContenido($pdf);

        $pdf->content = $contenido;

        return $pdf;
    }

    public function crearPdfParaArchivo($cfdiObj, $nombreDeArchivo)
    {
        $this->_cfdi = $cfdiObj;
        $this->destino = Pdf::DEST_FILE;
        $pdf = $this->_crearPdf();

        $contenido = $this->obtenerContenido($pdf);

        $pdf->content = $contenido;
        $pdf->filename = $nombreDeArchivo;

        $pdf->render();

        return $pdf;
    }

    /**
     * Función utilizada únicamente para debug.
     *
     * @param ktaris\cfdi\CFDI $cfdiObj objeto CFDI a ser representado.
     *
     * @return string HTML del PDF.
     */
    public function crearHtml($cfdiObj)
    {
        $this->_cfdi = $cfdiObj;

        $pdf = $this->_crearPdf();

        return $this->obtenerContenido($pdf);
    }

    protected function _crearPdf()
    {
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_LETTER,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => $this->destino,
            'cssFile' => $this->obtenerArchivoCss(),
            'marginTop' => 0,
            'marginBottom' => 0,
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginFooter' => 0,
        ]);

        $pdf->methods = [];

        return $pdf;
    }

    /**
     * Regresa el HTML a ser utilizado en base a la plantilla
     * utilizada.
     *
     * @return string HTML para el PDF.
     */
    protected function obtenerContenido($pdf)
    {
        if (empty($this->plantilla)) {
            $this->plantilla = self::PLANTILLA_DEFAULT;
        }

        $content = Yii::$app->controller->renderPartial('@vendor/ktaris/yii2-cfdi2pdf/templates/'.$this->plantilla.'/views/template', [
            'pdf' => $pdf,
            'CFDI' => $this->_cfdi,
        ]);

        return $content;
    }

    /**
     * Lee el archivo de CSS de la plantilla, si contiene alguno, o regresa el
     * estilo predeterminado de Kartik.
     *
     * @return string nombre del archivo css a ser utilizado.
     */
    protected function obtenerArchivoCss()
    {
        $archivoCss = '@vendor/ktaris/yii2-cfdi2pdf/templates/'.$this->plantilla.'/assets/estilo.css';

        if (file_exists(Yii::getAlias($archivoCss))) {
            return $archivoCss;
        }

        return '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css';
    }
}
