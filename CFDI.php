<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi2pdf;

use yii\helpers\Json;
use ktaris\lectorcfdi\CFDI as BaseCFDI;
use ktaris\cfdi2pdf\models\CampoAdicional;
use ktaris\cfdi2pdf\models\AtributosAdicionales;

class CFDI extends BaseCFDI
{
    /**
     * @var array Esta propiedad contiene campos adicionales a nivel "Comprobante"
     * que se deseen mostrar, como un número de pedido interno de la empresa, o un
     * atributo con instrucciones especiales por cliente.
     * Puede haber un número no específico de tales propiedades.
     */
    public $CamposAdicionales;
    /**
     * @var array Esta propiedad, y contrario a la propiedad de [CamposAdicionales],
     * guarda atributos que pueden ocurrir solo una vez dentro del PDF.
     * Por ejemplo, el logotipo de la empresa, una leyenda colocada al final del PDF,
     * u otra propiedad constante, que es propia de la empresa más no del comprobante.
     */
    public $AtributosAdicionales;

    /**
     * Esta función junta la lógica de [leerCamposAdicionalesDesdeJson] y
     * [leerAtributosAdicionalesDesdeJson] en una función, leyendo un solo json.
     *
     * @param  string $jsonData cadena de datos en formato json.
     */
    public function leerDatosAdicionalesDesdeJson($jsonData)
    {
        if (empty($jsonData)) {
            return;
        }

        $dataIn = Json::decode($jsonData);

        $this->leerAtributosAdicionalesDesdeArreglo($dataIn);

        if (!empty($dataIn['CamposAdicionales'])) {
            $this->leerCamposAdicionalesDesdeArreglo($dataIn['CamposAdicionales']);
        }
    }

    /**
     * Lee los campos adicionales cuando son enviados por si solos en un arreglo
     * en formato Json.
     *
     * @param  string $jsonData cadena de datos en formato json.
     */
    public function leerCamposAdicionalesDesdeJson($jsonData)
    {
        $dataIn = Json::decode($jsonData);

        return $this->leerCamposAdicionalesDesdeArreglo($dataIn);
    }

    /**
     * Lee los atributos adicionales y los envía a la propiedad de [AtributosAdicionales],
     * para su futuro uso en el PDF.
     *
     * @param  string $jsonData cadena de datos en formato json.
     */
    public function leerAtributosAdicionalesDesdeJson($jsonData)
    {
        $dataIn = Json::decode($jsonData);

        $this->leerAtributosAdicionalesDesdeArreglo($dataIn);
    }

    // ==================================================================
    //
    // Propiedades adicionales.
    //
    // ------------------------------------------------------------------

    public function getTieneAtributosAdicionales()
    {
        if (!empty($this->AtributosAdicionales)) {
            return true;
        }

        return false;
    }

    public function getTieneCamposAdicionales()
    {
        if (!empty($this->CamposAdicionales)) {
            return true;
        }

        return false;
    }

    // ==================================================================
    //
    // Métodos de procesamiento interno.
    //
    // ------------------------------------------------------------------

    private function leerCamposAdicionalesDesdeArreglo($dataIn)
    {
        if (!empty($dataIn) && is_array($dataIn)) {
            $this->CamposAdicionales = [];
            foreach ($dataIn as $index => $m) {
                $model = new CampoAdicional;
                $model->attributes = $m;
                if ($model->validate()) {
                    $this->CamposAdicionales[] = $model;
                }
            }
        }
    }

    private function leerAtributosAdicionalesDesdeArreglo($dataIn)
    {
        if (!empty($dataIn) && is_array($dataIn)) {
            $this->AtributosAdicionales = new AtributosAdicionales;
            $this->AtributosAdicionales->attributes = $dataIn;
        }
    }
}
