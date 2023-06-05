<?php

class Ubezpieczenie extends AutoZDodatkami {
    public $procent_ubezpieczenia;
    public $liczba_lat_posiadania;

    public function __construct($model, $cena_w_euro, $aktualny_kurs, $alarm, $radio, $klimatyzacja, $procent_ubezpieczenia, $liczba_lat_posiadania) {
        parent::__construct($model, $cena_w_euro, $aktualny_kurs, $alarm, $radio, $klimatyzacja);
        $this->procent_ubezpieczenia = $procent_ubezpieczenia;
        $this->liczba_lat_posiadania = $liczba_lat_posiadania;
    }

    public function ObliczCene() {
        $wartosc_samochodu_z_dodatkami = parent::ObliczCene();
        $wartosc_pomniejszona = $wartosc_samochodu_z_dodatkami * (1 - $this->liczba_lat_posiadania / 100);
        return $this->procent_ubezpieczenia * $wartosc_pomniejszona / 100;
    }
}