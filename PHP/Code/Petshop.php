<?php

class Petshop {
    private $ID = "";
    private $namaProduk = "";
    private $kategori = "";
    private $harga = "";
    private $gambar = "";

    public function __construct($ID, $namaProduk, $kategori, $harga, $gambar) {
        $this->ID = $ID;
        $this->namaProduk = $namaProduk;
        $this->kategori = $kategori;
        $this->harga = $harga;
        $this->gambar = $gambar;
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

    public function getgambar() {
        return $this->gambar;
    }
    
}

?>