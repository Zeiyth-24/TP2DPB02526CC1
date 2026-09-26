import java.util.Locale;

/**
 * ============================================================================
 * KELAS TURUNAN 2 (CHILD LEVEL 2): Smartphone
 * ============================================================================
 * Kelas Smartphone mewarisi (extends) kelas Gadget (yang mewarisi Brand).
 * Merupakan tingkatan ke-3 dalam hierarki Multilevel Inheritance.
 * Mewakili perangkat telepon pintar komersial yang siap didistribusikan.
 *
 * Menambahkan tepat 3 atribut baru:
 * 1. operating_system   (String) : Sistem operasi ponsel (cth: Android, iOS)
 * 2. resolusi_kamera_mp (int)    : Resolusi kamera utama dalam MegaPixel (MP)
 * 3. ukuran_layar_inci  (double) : Diagonal ukuran layar dalam satuan inci
 * ============================================================================
 */
public class Smartphone extends Gadget {
    // Atribut tambahan pada kelas Smartphone
    private String operating_system;
    private int resolusi_kamera_mp;
    private double ukuran_layar_inci;

    // Konstruktor Default
    public Smartphone() {
        super();
        this.operating_system = "";
        this.resolusi_kamera_mp = 0;
        this.ukuran_layar_inci = 0.0;
    }

    // Konstruktor Berparameter meneruskan 6 parameter sebelumnya ke Gadget via super()
    public Smartphone(int id_brand, String nama_brand, String negara_asal,
                      int tahun_rilis, int kapasitas_baterai_mah, int storage_gb,
                      String operating_system, int resolusi_kamera_mp, double ukuran_layar_inci) {
        super(id_brand, nama_brand, negara_asal, tahun_rilis, kapasitas_baterai_mah, storage_gb);
        this.operating_system = operating_system;
        this.resolusi_kamera_mp = resolusi_kamera_mp;
        this.ukuran_layar_inci = ukuran_layar_inci;
    }

    // --- GETTER & SETTER ---
    public String getOperating_system() {
        return operating_system;
    }

    public void setOperating_system(String operating_system) {
        this.operating_system = operating_system;
    }

    public String getOperatingSystem() {
        return operating_system;
    }

    public void setOperatingSystem(String operating_system) {
        this.operating_system = operating_system;
    }

    public int getResolusi_kamera_mp() {
        return resolusi_kamera_mp;
    }

    public void setResolusi_kamera_mp(int resolusi_kamera_mp) {
        this.resolusi_kamera_mp = resolusi_kamera_mp;
    }

    public int getResolusiKameraMp() {
        return resolusi_kamera_mp;
    }

    public void setResolusiKameraMp(int resolusi_kamera_mp) {
        this.resolusi_kamera_mp = resolusi_kamera_mp;
    }

    public double getUkuran_layar_inci() {
        return ukuran_layar_inci;
    }

    public void setUkuran_layar_inci(double ukuran_layar_inci) {
        this.ukuran_layar_inci = ukuran_layar_inci;
    }

    public double getUkuranLayarInci() {
        return ukuran_layar_inci;
    }

    public void setUkuranLayarInci(double ukuran_layar_inci) {
        this.ukuran_layar_inci = ukuran_layar_inci;
    }

    /**
     * Mengambil keseluruhan 9 nilai atribut dari ketiga tingkatan kelas
     * sebagai array string untuk diformat ke dalam tabel.
     */
    public String[] toRowData() {
        return new String[] {
            String.valueOf(id_brand),
            nama_brand,
            negara_asal,
            String.valueOf(tahun_rilis),
            kapasitas_baterai_mah + " mAh",
            storage_gb + " GB",
            operating_system,
            resolusi_kamera_mp + " MP",
            String.format(Locale.US, "%.1f\"", ukuran_layar_inci)
        };
    }
}
