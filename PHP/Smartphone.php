<?php
require_once __DIR__ . '/Gadget.php';

/**
 * ============================================================================
 * 3. KELAS TURUNAN 2 (CHILD LEVEL 2): Smartphone
 * ============================================================================
 * Kelas Smartphone mewarisi (extends) kelas Gadget (yang mewarisi Brand).
 * Merupakan tingkatan ke-3 dalam hierarki Multilevel Inheritance.
 * Mewakili perangkat telepon pintar komersial yang siap dipasarkan.
 * 
 * Atribut spesifik Smartphone:
 * - operating_system   (string) : Sistem operasi ponsel (cth: Android, iOS)
 * - resolusi_kamera_mp (int)    : Resolusi kamera utama dalam MegaPixel (MP)
 * - ukuran_layar_inci  (float)  : Diagonal bentang layar dalam satuan inci
 * 
 * TAMBAHAN KHUSUS (SESUAI SPESIFIKASI):
 * - foto_produk (string, private): Jalur (path) atau URL berkas gambar produk smartphone
 * ============================================================================
 */
class Smartphone extends Gadget {
    // Atribut privat sesuai spesifikasi tugas
    private string $operating_system;
    private int $resolusi_kamera_mp;
    private float $ukuran_layar_inci;
    private string $foto_produk; // <-- Atribut privat tambahan untuk foto produk

    // Konstruktor kelas Smartphone
    public function __construct(
        int $id_brand = 0,
        string $nama_brand = "",
        string $negara_asal = "",
        int $tahun_rilis = 0,
        int $kapasitas_baterai_mah = 0,
        int $storage_gb = 0,
        string $operating_system = "",
        int $resolusi_kamera_mp = 0,
        float $ukuran_layar_inci = 0.0,
        string $foto_produk = "images/default.svg"
    ) {
        // Meneruskan parameter ke konstruktor Gadget via parent::__construct()
        parent::__construct(
            $id_brand,
            $nama_brand,
            $negara_asal,
            $tahun_rilis,
            $kapasitas_baterai_mah,
            $storage_gb
        );

        $this->operating_system = $operating_system;
        $this->resolusi_kamera_mp = $resolusi_kamera_mp;
        $this->ukuran_layar_inci = $ukuran_layar_inci;
        $this->foto_produk = $foto_produk;
    }

    // --- GETTER & SETTER ---
    public function getOperatingSystem(): string {
        return $this->operating_system;
    }

    public function setOperatingSystem(string $operating_system): void {
        $this->operating_system = $operating_system;
    }

    public function getOperating_system(): string {
        return $this->operating_system;
    }

    public function setOperating_system(string $operating_system): void {
        $this->operating_system = $operating_system;
    }

    public function getResolusiKameraMp(): int {
        return $this->resolusi_kamera_mp;
    }

    public function setResolusiKameraMp(int $resolusi_kamera_mp): void {
        $this->resolusi_kamera_mp = $resolusi_kamera_mp;
    }

    public function getResolusi_kamera_mp(): int {
        return $this->resolusi_kamera_mp;
    }

    public function setResolusi_kamera_mp(int $resolusi_kamera_mp): void {
        $this->resolusi_kamera_mp = $resolusi_kamera_mp;
    }

    public function getUkuranLayarInci(): float {
        return $this->ukuran_layar_inci;
    }

    public function setUkuranLayarInci(float $ukuran_layar_inci): void {
        $this->ukuran_layar_inci = $ukuran_layar_inci;
    }

    public function getUkuran_layar_inci(): float {
        return $this->ukuran_layar_inci;
    }

    public function setUkuran_layar_inci(float $ukuran_layar_inci): void {
        $this->ukuran_layar_inci = $ukuran_layar_inci;
    }

    // Getter dan Setter untuk atribut tambahan 'foto_produk'
    public function getFotoProduk(): string {
        return $this->foto_produk;
    }

    public function setFotoProduk(string $foto_produk): void {
        $this->foto_produk = $foto_produk;
    }

    public function getFoto_produk(): string {
        return $this->foto_produk;
    }

    public function setFoto_produk(string $foto_produk): void {
        $this->foto_produk = $foto_produk;
    }
}
