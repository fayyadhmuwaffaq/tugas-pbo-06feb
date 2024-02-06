<?php

class Produk {
    private $judul, $penulis, $penerbit; 
    protected $diskon = 0;
    private $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit =  "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    
    public function setJudul(){
        $this->judul = $judul;
    }

    public function getJudul(){
        return $this->judul;
    }

    public function setPenulis(){
        $this->penulis = $penulis;
    }

    public function getPenulis(){
        return $this->penulis;
    }
    public function setPenerbit(){
        $this->penerbit = $penerbit;
    }

    public function getPenerbit(){
        return $this->penerbit;
    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
    
    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }
    
    public function getInfoProduk(){
    $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->getHarga()})";
    }
}
    
class CetakInfoProduk {
    public function cetak(Produk $Produk){
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->getHarga()})";
        return $str;
    }
}

class Komik extends Produk {
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit =  "penerbit", $harga = 0, $jmlHalaman = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }
    
    public function getInfoProduk(){
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

Class Game extends Produk {
    public $WaktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit =  "penerbit", $harga = 0, $WaktuMain = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->WaktuMain = $WaktuMain;
    }

    public function getInfoProduk(){
        $str = "Game : " . parent::getInfoProduk() . " - {$this->WaktuMain} Jam.";
        return $str;
    }
}

$produk1 = new Komik ("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game ("Uncharted", "Nell Duckmanmn", "Sony Computer", 250000, 50);
    
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<br><hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();
