<?php
require_once __DIR__ . '/Brand.php';

/**
 * ============================================================================
 * 2. KELAS TURUNAN 1 (CHILD LEVEL 1): Gadget
 * ============================================================================
 * Kelas Gadget mewarisi (extends) kelas Brand.
 * Mewakili perangkat fisik umum hasil manufaktur dari suatu Brand.
 * 
 * Menambahkan tepat 3 atribut baru:
 * - tahun_rilis           (int) : Tahun produk gadget diluncurkan
 * - kapasitas_baterai_mah (int) : Daya tampung baterai (mAh)
 * - storage_gb            (int) : Kapasitas penyimpanan internal (GB)
 * ============================================================================
 */
class Gadget extends Brand {
    // Atribut tambahan pada kelas Gadget
    protected int $tahun_rilis;
    protected int $kapasitas_baterai_mah;
    protected int $storage_gb;

    // Konstruktor kelas Gadget memanggil konstruktor induk via parent::__construct()
    public function __construct(
        int $id_brand = 0,
        string $nama_brand = "",
        string $negara_asal = "",
        int $tahun_rilis = 0,
        int $kapasitas_baterai_mah = 0,
        int $storage_gb = 0
    ) {
        parent::__construct($id_brand, $nama_brand, $negara_asal);
        $this->tahun_rilis = $tahun_rilis;
        $this->kapasitas_baterai_mah = $kapasitas_baterai_mah;
        $this->storage_gb = $storage_gb;
    }

    // --- GETTER & SETTER ---
    public function getTahunRilis(): int {
        return $this->tahun_rilis;
    }

    public function setTahunRilis(int $tahun_rilis): void {
        $this->tahun_rilis = $tahun_rilis;
    }

    public function getTahun_rilis(): int {
        return $this->tahun_rilis;
    }

    public function setTahun_rilis(int $tahun_rilis): void {
        $this->tahun_rilis = $tahun_rilis;
    }

    public function getKapasitasBateraiMah(): int {
        return $this->kapasitas_baterai_mah;
    }

    public function setKapasitasBateraiMah(int $kapasitas_baterai_mah): void {
        $this->kapasitas_baterai_mah = $kapasitas_baterai_mah;
    }

    public function getKapasitas_baterai_mah(): int {
        return $this->kapasitas_baterai_mah;
    }

    public function setKapasitas_baterai_mah(int $kapasitas_baterai_mah): void {
        $this->kapasitas_baterai_mah = $kapasitas_baterai_mah;
    }

    public function getStorageGb(): int {
        return $this->storage_gb;
    }

    public function setStorageGb(int $storage_gb): void {
        $this->storage_gb = $storage_gb;
    }

    public function getStorage_gb(): int {
        return $this->storage_gb;
    }

    public function setStorage_gb(int $storage_gb): void {
        $this->storage_gb = $storage_gb;
    }

    // Representasi string informasi tingkat Gadget
    public function displayGadgetInfo(): string {
        return $this->displayBrandInfo()
            . " | Rilis: {$this->tahun_rilis}"
            . " | Baterai: {$this->kapasitas_baterai_mah}mAh"
            . " | Storage: {$this->storage_gb}GB";
    }
}
