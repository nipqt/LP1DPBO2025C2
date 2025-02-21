<?php

class Petshop {
    private $ID = "";
    private $namaProduk = "";
    private $kategori = "";
    private $harga = "";
    private $gambar = "";

    public function __construct() {
    }

    public function addData($ID, $namaProduk, $kategori, $harga) {
        $this->ID = $ID;
        $this->namaProduk = $namaProduk;
        $this->kategori = $kategori;
        $this->harga = $harga;
    }

    public function getID() {
        return $this->ID;
    }

    public function getnamaProduk() {
        return $this->namaProduk;
    }

    public function getkategori() {
        return $this->kategori;
    }

    public function getharga() {
        return $this->harga;
    }
}
?>