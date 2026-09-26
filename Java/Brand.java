/**
 * ============================================================================
 * KELAS INDUK (BASE CLASS): Brand
 * ============================================================================
 * Mewakili entitas prinsipal/pemilik merek dalam rantai pasok (Smartphone Supply Chain).
 * Merupakan kelas dasar (Root/Parent Class) pada hierarki Multilevel Inheritance.
 *
 * Memiliki tepat 3 atribut tertentu:
 * 1. id_brand    (int)    : Nomor identifikasi unik brand
 * 2. nama_brand  (String) : Nama merek dagang
 * 3. negara_asal (String) : Negara asal kantor pusat brand
 * ============================================================================
 */
public class Brand {
    // Enkapsulasi: Atribut dilindungi (protected) agar dapat diakses
    // oleh kelas turunan (Gadget & Smartphone) secara langsung jika diperlukan
    protected int id_brand;
    protected String nama_brand;
    protected String negara_asal;

    // Konstruktor Default
    public Brand() {
        this.id_brand = 0;
        this.nama_brand = "";
        this.negara_asal = "";
    }

    // Konstruktor Berparameter
    public Brand(int id_brand, String nama_brand, String negara_asal) {
        this.id_brand = id_brand;
        this.nama_brand = nama_brand;
        this.negara_asal = negara_asal;
    }

    // --- GETTER & SETTER ---
    public int getId_brand() {
        return id_brand;
    }

    public void setId_brand(int id_brand) {
        this.id_brand = id_brand;
    }

    public int getIdBrand() {
        return id_brand;
    }

    public void setIdBrand(int id_brand) {
        this.id_brand = id_brand;
    }

    public String getNama_brand() {
        return nama_brand;
    }

    public void setNama_brand(String nama_brand) {
        this.nama_brand = nama_brand;
    }

    public String getNamaBrand() {
        return nama_brand;
    }

    public void setNamaBrand(String nama_brand) {
        this.nama_brand = nama_brand;
    }

    public String getNegara_asal() {
        return negara_asal;
    }

    public void setNegara_asal(String negara_asal) {
        this.negara_asal = negara_asal;
    }

    public String getNegaraAsal() {
        return negara_asal;
    }

    public void setNegaraAsal(String negara_asal) {
        this.negara_asal = negara_asal;
    }

    // Metode representasi informasi Brand
    public String displayBrandInfo() {
        return "[Brand ID: " + id_brand + "] " + nama_brand + " (" + negara_asal + ")";
    }
}
