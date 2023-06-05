<?php
class NoweAuto {
    public $model_auta;
    public $cena_w_euro;
    public $aktualny_kurs;

    public function __construct($model, $cena_w_euro, $aktualny_kurs) {
        $this->model_auta = $model;
        $this->cena_w_euro = $cena_w_euro;
        $this->kursEuroPLN = 4.53;
    }

    public function ObliczCene(){
        return $this->cena_w_euro * $this->kursEuroPLN;
    }
}