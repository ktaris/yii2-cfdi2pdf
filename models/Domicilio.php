<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi2pdf\models;

use yii\base\Model;

class Domicilio extends Model
{
    public $Calle;
    public $NumeroExterior;
    public $NumeroInterior;
    public $Colonia;
    public $Localidad;
    public $Referencia;
    public $Municipio;
    public $Estado;
    public $Pais;
    public $CodigoPostal;

    public function rules()
    {
        return [
            [['Calle', 'NumeroExterior', 'NumeroInterior', 'Colonia', 'Localidad', 'Referencia', 'Municipio', 'Estado', 'Pais', 'CodigoPostal'], 'safe'],
        ];
    }

    public function getDireccion()
    {
        $direccion = $this->Calle;

        // Calle.
        if ($direccion && !empty($this->NumeroExterior)) {
            $direccion .= ' '.$this->NumeroExterior;
        }
        if ($direccion && !empty($this->NumeroExterior) && !empty($this->NumeroInterior)) {
            $direccion .= '-'.$this->NumeroInterior;
        }
        // Colonia.
        if (!empty($direccion) && !empty($this->Colonia)) {
            $direccion .= '; Col. '.$this->Colonia;
        }
        if (!empty($direccion) && !empty($this->Colonia) && !empty($this->CodigoPostal)) {
            $direccion .= ', CP '.$this->CodigoPostal.'. ';
        }

        return $direccion;
    }
}
