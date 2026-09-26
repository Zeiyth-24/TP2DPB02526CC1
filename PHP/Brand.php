<?php
/**
 * ============================================================================
 * TUGAS PRAKTIKUM 2 - DESAIN & PEMROGRAMAN BERORIENTASI OBJEK (DPBO)
 * Tema: Smartphone Supply Chain
 * Topik: Warisan Bertingkat (Multilevel Inheritance) - 3 Tingkatan Kelas
 * ============================================================================
 * 
 * 1. KELAS INDUK (BASE CLASS): Brand
 * Mewakili entitas pemilik merek dagang dalam Smartphone Supply Chain.
 * Merupakan kelas dasar (Root) dari hierarki Multilevel Inheritance.
 * 
 * Memiliki tepat 3 atribut:
 * - id_brand    (int)    : Nomor identitas unik brand
 * - nama_brand  (string) : Nama merek dagang
 * - negara_asal (string) : Negara asal kantor pusat brand
 * ============================================================================
 */
class Brand {
    // Enkapsulasi: Menggunakan hak akses protected agar dapat diakses
    // oleh kelas turunan (Gadget dan Smartphone)
    protected int $id_brand;
    protected string $nama_brand;
    protected string $negara_asal;

    // Konstruktor kelas Brand
    public function __construct(int $id_brand = 0, string $nama_brand = "", string $negara_asal = "") {
        $this->id_brand = $id_brand;
        $this->nama_brand = $nama_brand;
        $this->negara_asal = $negara_asal;
    }

    // --- GETTER & SETTER ---
    public function getIdBrand(): int {
        return $this->id_brand;
    }

    public function setIdBrand(int $id_brand): void {
        $this->id_brand = $id_brand;
    }

    public function getId_brand(): int {
        return $this->id_brand;
    }

    public function setId_brand(int $id_brand): void {
        $this->id_brand = $id_brand;
    }

    public function getNamaBrand(): string {
        return $this->nama_brand;
    }

    public function setNamaBrand(string $nama_brand): void {
        $this->nama_brand = $nama_brand;
    }

    public function getNama_brand(): string {
        return $this->nama_brand;
    }

    public function setNama_brand(string $nama_brand): void {
        $this->nama_brand = $nama_brand;
    }

    public function getNegaraAsal(): string {
        return $this->negara_asal;
    }

    public function setNegaraAsal(string $negara_asal): void {
        $this->negara_asal = $negara_asal;
    }

    public function getNegara_asal(): string {
        return $this->negara_asal;
    }

    public function setNegara_asal(string $negara_asal): void {
        $this->negara_asal = $negara_asal;
    }

    // Representasi string informasi tingkat Brand
    public function displayBrandInfo(): string {
        return "[Brand ID: {$this->id_brand}] {$this->nama_brand} ({$this->negara_asal})";
    }
}
