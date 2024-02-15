<?php

class TugasStatic {
    public static $nama = "Fayyadh";
    public static $kelas = "XI A";
    public static $sekolah = "Ibnul Qayyim";

    public static function DataDiri(){
        return "nama saya " . self::$nama . "sekarang duduk di bangku kelas " . self::$kelas
        . "bersekolah di " . self::$sekolah;
    } 
}

echo TugasStatic::DataDiri();