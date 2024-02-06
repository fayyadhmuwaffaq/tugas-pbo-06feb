<?php

// Kelas utama Shape
class Shape {
    // Variabel instance yang dienkapsulasi
    private $area;

    // Metode untuk menghitung area (tidak diimplementasikan di sini)
    public function calculateArea() {
        // Diimplementasikan di kelas turunan
    }

    // Getter untuk mendapatkan nilai area
    public function getArea() {
        return $this->area;
    }

    // Setter untuk mengatur nilai area (hanya dapat diakses di dalam kelas ini)
    protected function setArea($area) {
        $this->area = $area;
    }
}

// Kelas turunan pertama: Circle
class Circle extends Shape {
    // Variabel instance radius
    private $radius;

    // Konstruktor untuk inisialisasi radius
    public function __construct($radius) {
        $this->radius = $radius;
    }

    // Overriding metode calculateArea dari kelas Shape
    public function calculateArea() {
        // Menghitung luas lingkaran dan mengatur nilai area menggunakan setter di kelas Shape
        $this->setArea(pi() * $this->radius * $this->radius);
    }
}

// Kelas turunan kedua: Rectangle
class Rectangle extends Shape {
    // Variabel instance panjang dan lebar
    private $length;
    private $width;

    // Konstruktor untuk inisialisasi panjang dan lebar
    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    // Overriding metode calculateArea dari kelas Shape
    public function calculateArea() {
        // Menghitung luas persegi panjang dan mengatur nilai area menggunakan setter di kelas Shape
        $this->setArea($this->length * $this->width);
    }

    // Overloading metode calculateArea dengan parameter tambahan
    public function calculateAreaWithAdditional($additionalArea) {
        // Menambahkan nilai tambahan ke area dan mengatur nilai area menggunakan setter di kelas Shape
        $this->setArea($this->getArea() + $additionalArea);
    }
}

// Membuat objek Circle
$circle = new Circle(5.0);
// Memanggil metode calculateArea untuk menghitung area
$circle->calculateArea();
// Menampilkan area lingkaran
echo "Area of Circle: " . $circle->getArea() . PHP_EOL;

// Membuat objek Rectangle
$rectangle = new Rectangle(4.0, 6.0);
// Memanggil metode calculateArea untuk menghitung area
$rectangle->calculateArea();
// Menampilkan area persegi panjang
echo "Area of Rectangle: " . $rectangle->getArea() . PHP_EOL;

// Overloaded metode calculateArea di kelas Rectangle
$rectangle->calculateAreaWithAdditional(2.0);
// Menampilkan area setelah overload
echo "Overloaded Area of Rectangle: " . $rectangle->getArea() . PHP_EOL;

?>
