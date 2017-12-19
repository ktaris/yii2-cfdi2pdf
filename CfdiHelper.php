<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi2pdf;

use Yii;
use kartik\mpdf\Pdf;
use ktaris\numeroletra\NumeroALetra;

class CfdiHelper
{
    public static function trimmer($texto, $longitud = 50, $separador = '<br>')
    {
        return chunk_split($texto, $longitud, $separador);
    }

    /**
     * Genera el código QR según lo establecido en el Anexo 20, de
     * página 60.
     *
     * @param  ktaris\cfdi\CFDI $cfdi objeto con datos del CFDI.
     *
     * @return string       cadena del QR.
     */
    public static function textoQr($cfdi)
    {
        $cadena = 'https://verificacfdi.facturaelectronica.sat.gob.mx/default.aspx?';

        // UUID del comprobante.
        $cadena .= 'id=';
        $cadena .= $cfdi->TimbreFiscalDigital->UUID;

        // RFC del emisor.
        $cadena .= '&re=';
        $cadena .= $cfdi->Emisor->Rfc;

        // RFC del receptor.
        $cadena .= '&rr=';
        $cadena .= $cfdi->Receptor->Rfc;

        // Total del comprobante.
        $cadena .= '&tt=';
        $cadena .= number_format($cfdi->Total, 6);

        // Últimos ocho caracteres del sello del emisor.
        $cadena .= '&fe=';
        $cadena .= substr($cfdi->Sello, -8);

        return $cadena;
    }

    /**
     * Recibe un número entero o flotante, y se regresa el número en
     * letras.
     * @param  number $numero número a ser convertido.
     * @param  array  $params parámetros a ser enviados al objeto.
     * @return string         número en letras.
     */
    public static function numeroALetra($numero, $params = [])
    {
        $numalet= new NumeroALetra;
        $numalet->setNumero($numero);

        if (isset($params['prefijo'])) {
            $numalet->setPrefijo($params['prefijo']);
        }
        if (isset($params['sufijo'])) {
            $numalet->setSufijo($params['sufijo']);
        }
        if (isset($params['moneda'])) {
            if (empty($params['moneda'])) {
                $params['moneda'] = '<strong>MXN</strong>';
            }
            $numalet->setMoneda($params['moneda']);
        }

        return $numalet->letra();
    }
}
