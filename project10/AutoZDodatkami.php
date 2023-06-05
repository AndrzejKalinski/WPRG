<?php

class AutoZDodatkami extends NoweAuto {
    public $alarm;
    public $radio;
    public $klimatyzacja;

    public function __construct($model, $cena_w_euro, $aktualny_kurs, $alarm, $radio, $klimatyzacja) {
        parent::__construct($model, $cena_w_euro, $aktualny_kurs);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function ObliczCene() {
        $cena_w_pln = $this->cena_w_euro * $this->aktualny_kurs;
        $cena_dodatkow = $this->alarm + $this->radio + $this->klimatyzacja;
        return $cena_w_pln + $cena_dodatkow;
    }
}