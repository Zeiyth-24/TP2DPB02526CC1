/**
 * ============================================================================
 * KELAS TURUNAN 1 (CHILD LEVEL 1): Gadget
 * ============================================================================
 * Kelas Gadget mewarisi (extends) kelas Brand.
 * Mewakili produk perangkat elektronik umum hasil manufaktur dari suatu Brand.
 *
 * Menambahkan tepat 3 atribut baru:
 * 1. tahun_rilis           (int) : Tahun produk gadget diluncurkan ke pasar
 * 2. kapasitas_baterai_mah (int) : Daya tampung baterai (mAh)
 * 3. storage_gb            (int) : Kapasitas penyimpanan internal (GB)
 * ============================================================================
 */
public class Gadget extends Brand {
    // Atribut tambahan pada kelas Gadget
    protected int tahun_rilis;
    protected int kapasitas_baterai_mah;
    protected int storage_gb;

    // Konstruktor Default
    public Gadget() {
        super();
        this.tahun_rilis = 0;
        this.kapasitas_baterai_mah = 0;
        this.storage_gb = 0;
    }

    // Konstruktor Berparameter dengan memanggil konstruktor Brand via super()
    public Gadget(int id_brand, String nama_brand, String negara_asal,
                  int tahun_rilis, int kapasitas_baterai_mah, int storage_gb) {
        super(id_brand, nama_brand, negara_asal);
        this.tahun_rilis = tahun_rilis;
        this.kapasitas_baterai_mah = kapasitas_baterai_mah;
        this.storage_gb = storage_gb;
    }

    // --- GETTER & SETTER ---
    public int getTahun_rilis() {
        return tahun_rilis;
    }

    public void setTahun_rilis(int tahun_rilis) {
        this.tahun_rilis = tahun_rilis;
    }

    public int getTahunRilis() {
        return tahun_rilis;
    }

    public void setTahunRilis(int tahun_rilis) {
        this.tahun_rilis = tahun_rilis;
    }

    public int getKapasitas_baterai_mah() {
        return kapasitas_baterai_mah;
    }

    public void setKapasitas_baterai_mah(int kapasitas_baterai_mah) {
        this.kapasitas_baterai_mah = kapasitas_baterai_mah;
    }

    public int getKapasitasBateraiMah() {
        return kapasitas_baterai_mah;
    }

    public void setKapasitasBateraiMah(int kapasitas_baterai_mah) {
        this.kapasitas_baterai_mah = kapasitas_baterai_mah;
    }

    public int getStorage_gb() {
        return storage_gb;
    }

    public void setStorage_gb(int storage_gb) {
        this.storage_gb = storage_gb;
    }

    public int getStorageGb() {
        return storage_gb;
    }

    public void setStorageGb(int storage_gb) {
        this.storage_gb = storage_gb;
    }

    // Metode representasi informasi Gadget
    public String displayGadgetInfo() {
        return displayBrandInfo()
                + " | Rilis: " + tahun_rilis
                + " | Baterai: " + kapasitas_baterai_mah + "mAh"
                + " | Storage: " + storage_gb + "GB";
    }
}
