<?php

class Produk {
    private $mobil, $plat, $merk; 
    protected $diskon = 0;
    private $harga;

    public function __construct($mobil = "mobil", $plat = "plat", $merk =  "merk", $harga = 0) {
        $this->mobil = $mobil;
        $this->plat = $plat;
        $this->merk = $merk;
        $this->harga = $harga;
    }
    
    public function setMobil($mobil){
        $this->mobil = $mobil;
    }

    public function getMobil(){
        return $this->mobil;
    }

    public function setPlat($plat){
        $this->plat = $plat;
    }

    public function getPlat(){
        return $this->plat;
    }
    
    public function setMerk($merk){
        $this->merk = $merk;
    }

    public function getMerk(){
        return $this->merk;
    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
    
    public function getLabel(){
        return "$this->plat, $this->merk";
    }
    
    public function getInfoProduk(){
        $str = "{$this->mobil} | {$this->getMerk()} (Rp. {$this->getHarga()})";
        return $str;
    }
}
    
class CetakInfoProduk {
    public function cetak(Produk $produk){
        $str = "{$produk->mobil} | {$produk->getMerk()} (Rp. {$produk->getHarga()})";
        return $str;
    }
}

class Mobil extends Produk {
    public $tahun;

    public function __construct($mobil = "mobil", $plat = "plat", $merk =  "merk", $harga = 0, $tahun = 0){
        parent::__construct($mobil, $plat, $merk, $harga);
        $this->tahun = $tahun;
    }
    
    public function getInfoProduk(){
        $str = "Mobil : " . parent::getInfoProduk() . " - {$this->tahun} Tahun.";
        return $str;
    }
}

class Motor extends Produk {
    public $warna;

    public function __construct($mobil = "mobil", $plat = "plat", $merk =  "merk", $harga = 0, $warna = ""){
        parent::__construct($mobil, $plat, $merk, $harga);
        $this->warna = $warna;
    }

    public function getInfoProduk(){
        $str = "Motor : " . parent::getInfoProduk() . " - Warna: {$this->warna}.";
        return $str;
    }
}

$produk1 = new Mobil("Toyota Avanza", "B 1234 CD", "Toyota", 200000000, 2018);
$produk2 = new Motor("Honda Beat", "B 5678 FG", "Honda", 15000000, "Merah");
    
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<br><hr>";

$produk1->setDiskon(10);
echo "Harga mobil setelah diskon: " . $produk1->getHarga();
