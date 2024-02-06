<?php

class Book {
    private $title;   //$title: Ini adalah properti private yang menyimpan judul buku. Penggunaan private membuat properti ini hanya dapat diakses dari dalam kelas Book itu sendiri, dan tidak dapat diakses dari luar kelas.
    private $author; //$author: Ini adalah properti private yang menyimpan informasi penulis buku. Seperti $title, properti ini juga hanya dapat diakses dari dalam kelas Book.

    public function __construct($title, $author) {//public function __construct($title, $author) {: Ini adalah deklarasi konstruktor untuk kelas Book. Konstruktor dieksekusi secara otomatis setiap kali sebuah objek dari kelas dibuat (dengan menggunakan operator new).
        $this->title = $title;//$this: Merupakan referensi ke objek saat ini. Dalam konteks metode kelas, seperti konstruktor, $this merujuk pada objek yang sedang dibuat atau diakses. title: Merupakan nama properti yang ingin diakses atau diatur nilainya. Dalam konteks ini, title adalah properti privat dari kelas yang tengah diakses.
        $this->author = $author;
    }

    public function getTitle() {
        return $this->title;
    }

    
    public function getAuthor() {
        return $this->author;
    }

    
    public function getInfo() {
        return "{$this->title} by {$this->author}";
    }
}


class ExtendedBook extends Book {
    private $publicationYear;

    public function __construct($title, $author, $publicationYear) {
        parent::__construct($title, $author);
        $this->publicationYear = $publicationYear;
    }

   
    public function getInfo() {
        return parent::getInfo() . " ({$this->publicationYear})";
    }
}


class Library {
    private $books = [];

    // Menambahkan buku ke perpustakaan
    public function addBook($book) {
        $this->books[] = $book;
    }

    // Overloading metode untuk mencari buku berdasarkan judul atau penulis
    public function findBook($keyword) {
        $foundBooks = [];

        foreach ($this->books as $book) {
            // Pencarian berdasarkan judul atau penulis
            if (stripos($book->getTitle(), $keyword) !== false || stripos($book->getAuthor(), $keyword) !== false) {
                $foundBooks[] = $book;
            }
        }

        return $foundBooks;
    }
}

// Penggunaan kelas-kelas di atas
$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald");
$book2 = new ExtendedBook("To Kill a Mockingbird", "Harper Lee", 1960);

$library = new Library();
$library->addBook($book1);
$library->addBook($book2);

// Menampilkan informasi buku di perpustakaan
foreach ($library->findBook("Harper") as $foundBook) {
    echo $foundBook->getInfo() . "\n";
}
