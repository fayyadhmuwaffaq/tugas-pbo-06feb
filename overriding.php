<?php 
// Kelas Produk sebagai kelas dasar
class Produk {
        // property dari kelas Produk;
        public  $judul,      
                $penulis,   
                $penerbit,
                $harga;      
        // Konstruktor kelas Produk
        public function __construct($judul= "Judul", $penulis= "penulis", $penerbit= "penerbit", $harga= 0,) {
            $this->judul        = $judul;
            $this->penulis      = $penulis;
            $this->penerbit     = $penerbit;
            $this->harga        = $harga;
        }
        // Metode untuk mendapatkan label (penulis dan penerbit)
        public function getLabel() {
            return "$this->penulis, $this->penerbit";
        }
        // Metode untuk mendapatkan informasi produk secara keseluruhan
        public function getInfoProduk() {
            $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
            return $str;
        }
    }
class CetakInfoProduk {
        // Metode untuk mencetak informasi produk
        public function cetak( Produk $produk){
            $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
            return $str;
    }
}
class Komik extends Produk {
        // Properti tambahan kelas Komik
        public $jmlHalaman;
        // Konstruktor kelas Komik
        public function __construct($judul= "Judul", $penulis= "penulis", $penerbit= "penerbit", $harga= 0, $jmlHalaman = 0 )
        {
            // Memanggil konstruktor kelas Produk menggunakan parent::__construct()
            parent::__construct($judul, $penulis , $penerbit, $harga);

            $this->jmlHalaman = $jmlHalaman;
        }
        // Override metode getInfoProduk() untuk memberikan informasi khusus Komik
        public function getInfoProduk(){
            // parent::getInfoProduk maksudnya dia adalah methode static
            // parent artinya adalah untuk mengambil property atau methode 
            $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
            return $str;
        }
}
class Game extends Produk {
        // Properti tambahan kelas Game
        public $waktuMain;
        // Konstruktor kelas Game
        public function __construct($judul= "Judul", $penulis= "penulis", $penerbit= "penerbit", $harga= 0, $waktuMain = 0 )
        {
            parent::__construct($judul, $penulis , $penerbit, $harga);
            $this->waktuMain = $waktuMain;
        }
        // Override metode getInfoProduk() untuk memberikan informasi khusus Game
        public function getInfoProduk() {
            $str = "Game : " . parent::getInfoProduk() . " - {$this->waktuMain} Jam.";
            return $str ;
        }
}
    $produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
    $produk2 = new Game("Uncharted", "Neil Duckmanmn", "Sony Computer", 250000,50);
// Pemanggilan metode getInfoProduk() untuk mendapatkan informasi produk
echo $produk1->getInfoProduk();
echo "<br>" ;
echo $produk2->getInfoProduk();
echo "<br>" ;
?>