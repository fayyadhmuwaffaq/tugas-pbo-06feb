<?php 
// Kelas Produk sebagai kelas dasar
class Kendaraan {
        // property dari kelas Produk;
        public      $nama,      
                    $merk,   
                    $pembuat;
        protected   $diskon;
        private     $harga;      
        // Konstruktor kelas Produk
        public function __construct($nama= "nama", $merk= "merk", $pembuat= "pembuat", $harga= 0,) {
            $this->nama     = $nama;
            $this->merk     = $merk;
            $this->pembuat  = $pembuat;
            $this->harga    = $harga;
        }
        // Metode untuk mendapatkan label (pembuat dan merk)
        public function getLabel() {
            return "$this->pembuat, $this->merk";
        }
        // Metode untuk mendapatkan informasi produk secara keseluruhan
        public function getInfoProduk() {
            $str = "{$this->nama} | {$this->merk} (Rp. {$this->harga})";
            return $str;
        }

        public function setDiskon($diskon){
            $this->diskon = $diskon;
        }
    
        public function getHarga(){
            return $this->harga - ($this->harga * $this->diskon / 100);
        }

    }
class CetakInfoProduk {
        // Metode untuk mencetak informasi produk
        public function cetak( Kendaraan $kendaraan){
            $str = "{$kendaraan->nama} | {$kendaraan->getLabel()} (Rp. {$kendaraan->harga})";
            return $str;
    }
}
class Mobil extends Kendaraan {
        // Properti tambahan kelas Mobil
        public $seri;
        // Konstruktor kelas Mobil
        public function __construct($nama= "nama", $merk= "merk", $pembuat= "pembuat", $harga= 0, $seri = "none" )
        {
            // Memanggil konstruktor kelas Produk menggunakan parent::__construct()
            parent::__construct($nama, $merk , $pembuat, $harga);
            $this->seri = $seri;
        }
        // Override metode getInfoProduk() untuk memberikan informasi khusus Komik
        public function getInfoProduk(){
            // parent::getInfoProduk maksudnya dia adalah methode static
            // parent artinya adalah untuk mengambil property atau methode 
            $str = "Mobil : " . parent::getInfoProduk() . " seri {$this->seri}.";
            return $str;
        }
}
class Motor extends Kendaraan {
        // Properti tambahan kelas Motor
        public $luasjok;
        // Konstruktor kelas Game
        public function __construct($nama= "nama", $merk= "merk", $pembuat= "pembuat", $harga= 0, $luasjok = 0 )
        {
            parent::__construct($nama, $merk , $pembuat, $harga);
            $this->luasjok = $luasjok;
        }
        // Override metode getInfoProduk() untuk memberikan informasi khusus Game
        public function getInfoProduk() {
            $str = "Motor : " . parent::getInfoProduk() . "  {$this->luasjok} cm3.";
            return $str ;
        }
}
// panggil infonya
echo $produk1->getInfoProduk();
echo "<br>" ;
echo $produk2->getInfoProduk();
echo "<br>" ;
echo "<hr>";
?>
