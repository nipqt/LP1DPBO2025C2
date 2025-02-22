<?php
session_start();

class Petshop {
    private $ID = "";
    private $namaProduk = "";
    private $kategori = "";
    private $harga = "";
    private $gambar;

    public function __construct() {
    }

    public function addData($ID, $namaProduk, $kategori, $harga, $gambar) {
        $i = 0;
        $stop = 0;
        while (($stop == 0) && ($i < count($_SESSION['datashop']))) {
            if ($_SESSION['datashop'][$i]['id'] == $ID) {
                $stop = 1;
                return 0;
            }
            $i++;
        }
        if ($stop == 0) {
            $target_file = "kolektip/" . basename($gambar["name"]);
            move_uploaded_file($gambar["tmp_name"], $target_file);
    
            $_SESSION['datashop'][] = [
                "id" => $this->ID = $ID,
                "namaProduk" => $this->namaProduk = $namaProduk,
                "kategori" => $this->kategori = $kategori,
                "harga" => $this->harga = $harga,
                "gambar" => $this->gambar = $target_file 
            ];
            return 1;
        }
    }

    public function changeData($look, $ID, $namaProduk, $kategori, $harga, $gambar) {
        $i = 0;
        $stop = 0;
        while (($stop == 0) && ($i < count($_SESSION['datashop']))) {
            if ($_SESSION['datashop'][$i]['id'] == $ID) {
                if ($i != $look) {
                    $stop = 1;
                    return 0;
                } else {
                    $stop = 0;
                }
            }
            $i++;
        }
        if ($stop == 0) {
            $target_file = "kolektip/" . basename($gambar["name"]);
            move_uploaded_file($gambar["tmp_name"], $target_file);

            $_SESSION['datashop'][$look] = [
                "id" => $this->ID = $ID,
                "namaProduk" => $this->namaProduk = $namaProduk,
                "kategori" => $this->kategori = $kategori,
                "harga" => $this->harga = $harga,
                "gambar" => $this->gambar = $target_file 
            ];
            return 1;
        }
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
        $target_file = "kolektip/" . basename($this->gambar["name"]);
        move_uploaded_file($this->gambar["tmp_name"], $target_file);
        return $target_file;
    }
}
?>
