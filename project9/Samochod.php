<?php

class Samochod {
    public $id;
    public $marka;
    public $model;
    public $cena;
    public $rok;
    public $opis;

    public function __construct($id,$marka, $model, $cena, $rok, $opis) {
        $this->id=$id;
        $this->marka = $marka;
        $this->model = $model;
        $this->cena = $cena;
        $this->rok = $rok;
        $this->opis = $opis;
    }
    public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }
    public function getMarka() {
        return $this->marka;
    }

    public function setMarka($marka) {
        $this->marka = $marka;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getCena() {
        return $this->cena;
    }

    public function setCena($cena) {
        $this->cena = $cena;
    }

    public function getRok() {
        return $this->rok;
    }

    public function setRok($rok) {
        $this->rok = $rok;
    }

    public function getOpis() {
        return $this->opis;
    }

    public function setOpis($opis) {
        $this->opis = $opis;
    }
}