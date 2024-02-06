<?php

// clas utama
class Bentuk {
    // property protected untuk menyimpan nama bentuk
    protected $nama;

    // constructor untuk menginisialisasikan nama bentuk
    public function __construct($nama) {
        $this->nama = $nama;
    }

    // metode untuk menghitung luas (akan diovrriding oleh subclass)
    public function hitungLuas() {
        return "metode ini akan di-overrinding oleh subclass.";
    }
}

// subclass kubus yang meng-extend bentuk
class Kubus extends Bentuk {
    // property privat untuk menyimpan panjang sisi
    private $sisi;

    // contructor privat untuk menginisialisasi nama dan panjang sisi
    public function __construct($nama, $sisi) {
        parent::__construct($nama);
        $this->sisi = $sisi;
    }

    // Overriding metode hitungLuas dari kelas Bentuk
    public function hitungLuas() {
        return "Luas kubus $this->nama adalah: " . ($this->sisi ** 2);
    }

    // Metode overloading untuk menghitung volume kubus
    public function hitungVolume($tinggi) {
        return "Volume kubus $this->nama adalah: " . ($this->sisi ** 3 * $tinggi);
    }
}

// Membuat objek Kubus
$kubus1 = new Kubus("Kubus A", 5);

// Menggunakan metode overriding untuk menghitung luas
echo $kubus1->hitungLuas() . "\n";

// Menggunakan metode overloading untuk menghitung volume
echo $kubus1->hitungVolume(8) . "\n";

?>