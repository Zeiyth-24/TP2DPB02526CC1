"""
================================================================================
TUGAS PRAKTIKUM 2 - DESAIN & PEMROGRAMAN BERORIENTASI OBJEK (DPBO)
Tema: Smartphone Supply Chain
Topik: Warisan Bertingkat (Multilevel Inheritance) - 3 Tingkatan Kelas
================================================================================
Hierarki Kelas:
1. Kelas Induk (Base Class)       : Brand
2. Kelas Turunan 1 (Child Level 1): Gadget (Mewarisi Brand)
3. Kelas Turunan 2 (Child Level 2): Smartphone (Mewarisi Gadget)
================================================================================
"""

# ==============================================================================
# 1. KELAS INDUK (BASE CLASS): Brand
# ==============================================================================
class Brand:
    """
    Kelas Brand merupakan kelas dasar (root/parent) dalam hierarki pewarisan.
    Mewakili entitas prinsipal/pemilik merek dalam Smartphone Supply Chain.
    
    Memiliki tepat 3 atribut:
    1. id_brand    (int)   : Nomor identifikasi unik untuk brand
    2. nama_brand  (str)   : Nama merek/brand dagang
    3. negara_asal (str)   : Negara asal kantor pusat brand
    """

    def __init__(self, id_brand: int, nama_brand: str, negara_asal: str):
        # Enkapsulasi data dengan atribut terproteksi (_atribut)
        self._id_brand = int(id_brand)
        self._nama_brand = str(nama_brand)
        self._negara_asal = str(negara_asal)

    # --- GETTER & SETTER (Metode Konvensional OOP) ---
    def get_id_brand(self) -> int:
        return self._id_brand

    def set_id_brand(self, id_brand: int):
        self._id_brand = int(id_brand)

    def get_nama_brand(self) -> str:
        return self._nama_brand

    def set_nama_brand(self, nama_brand: str):
        self._nama_brand = str(nama_brand)

    def get_negara_asal(self) -> str:
        return self._negara_asal

    def set_negara_asal(self, negara_asal: str):
        self._negara_asal = str(negara_asal)

    # --- GETTER & SETTER (Pythonic @property) ---
    @property
    def id_brand(self) -> int:
        return self._id_brand

    @id_brand.setter
    def id_brand(self, value: int):
        self._id_brand = int(value)

    @property
    def nama_brand(self) -> str:
        return self._nama_brand

    @nama_brand.setter
    def nama_brand(self, value: str):
        self._nama_brand = str(value)

    @property
    def negara_asal(self) -> str:
        return self._negara_asal

    @negara_asal.setter
    def negara_asal(self, value: str):
        self._negara_asal = str(value)

    def display_brand_info(self) -> str:
        """Mengembalikan representasi teks informasi tingkat Brand."""
        return f"[Brand ID: {self._id_brand}] {self._nama_brand} ({self._negara_asal})"


# ==============================================================================
# 2. KELAS TURUNAN 1 (CHILD LEVEL 1): Gadget
# ==============================================================================
class Gadget(Brand):
    """
    Kelas Gadget mewarisi (extends) kelas Brand.
    Mewakili perangkat elektronik umum hasil manufaktur dari suatu Brand.
    
    Menambahkan tepat 3 atribut baru:
    1. tahun_rilis           (int) : Tahun produk gadget diluncurkan
    2. kapasitas_baterai_mah (int) : Kapasitas baterai dalam satuan mAh
    3. storage_gb            (int) : Kapasitas penyimpanan internal dalam satuan GB
    """

    def __init__(
        self,
        id_brand: int,
        nama_brand: str,
        negara_asal: str,
        tahun_rilis: int,
        kapasitas_baterai_mah: int,
        storage_gb: int,
    ):
        # Memanggil konstruktor kelas induk (Brand) via super()
        super().__init__(id_brand, nama_brand, negara_asal)
        
        # Inisialisasi atribut spesifik kelas Gadget
        self._tahun_rilis = int(tahun_rilis)
        self._kapasitas_baterai_mah = int(kapasitas_baterai_mah)
        self._storage_gb = int(storage_gb)

    # --- GETTER & SETTER (Metode Konvensional OOP) ---
    def get_tahun_rilis(self) -> int:
        return self._tahun_rilis

    def set_tahun_rilis(self, tahun_rilis: int):
        self._tahun_rilis = int(tahun_rilis)

    def get_kapasitas_baterai_mah(self) -> int:
        return self._kapasitas_baterai_mah

    def set_kapasitas_baterai_mah(self, kapasitas_baterai_mah: int):
        self._kapasitas_baterai_mah = int(kapasitas_baterai_mah)

    def get_storage_gb(self) -> int:
        return self._storage_gb

    def set_storage_gb(self, storage_gb: int):
        self._storage_gb = int(storage_gb)

    # --- GETTER & SETTER (Pythonic @property) ---
    @property
    def tahun_rilis(self) -> int:
        return self._tahun_rilis

    @tahun_rilis.setter
    def tahun_rilis(self, value: int):
        self._tahun_rilis = int(value)

    @property
    def kapasitas_baterai_mah(self) -> int:
        return self._kapasitas_baterai_mah

    @kapasitas_baterai_mah.setter
    def kapasitas_baterai_mah(self, value: int):
        self._kapasitas_baterai_mah = int(value)

    @property
    def storage_gb(self) -> int:
        return self._storage_gb

    @storage_gb.setter
    def storage_gb(self, value: int):
        self._storage_gb = int(value)

    def display_gadget_info(self) -> str:
        """Mengembalikan representasi teks informasi tingkat Gadget."""
        return (
            f"{self.display_brand_info()} | Rilis: {self._tahun_rilis} | "
            f"Baterai: {self._kapasitas_baterai_mah}mAh | Storage: {self._storage_gb}GB"
        )


# ==============================================================================
# 3. KELAS TURUNAN 2 (CHILD LEVEL 2): Smartphone
# ==============================================================================
class Smartphone(Gadget):
    """
    Kelas Smartphone mewarisi (extends) kelas Gadget (yang mewarisi Brand).
    Tingkat ke-3 dalam warisan bertingkat (Multilevel Inheritance).
    Mewakili unit smartphone komersial siap distribusi.
    
    Menambahkan tepat 3 atribut baru:
    1. operating_system   (str)   : Sistem operasi ponsel (cth: Android, iOS)
    2. resolusi_kamera_mp (int)   : Resolusi kamera utama dalam MegaPixel (MP)
    3. ukuran_layar_inci  (float) : Diagonal bentang layar dalam satuan inci
    """

    def __init__(
        self,
        id_brand: int,
        nama_brand: str,
        negara_asal: str,
        tahun_rilis: int,
        kapasitas_baterai_mah: int,
        storage_gb: int,
        operating_system: str,
        resolusi_kamera_mp: int,
        ukuran_layar_inci: float,
    ):
        # Meneruskan 6 parameter sebelumnya ke konstruktor Gadget via super()
        super().__init__(
            id_brand,
            nama_brand,
            negara_asal,
            tahun_rilis,
            kapasitas_baterai_mah,
            storage_gb,
        )
        
        # Inisialisasi atribut spesifik kelas Smartphone
        self._operating_system = str(operating_system)
        self._resolusi_kamera_mp = int(resolusi_kamera_mp)
        self._ukuran_layar_inci = float(ukuran_layar_inci)

    # --- GETTER & SETTER (Metode Konvensional OOP) ---
    def get_operating_system(self) -> str:
        return self._operating_system

    def set_operating_system(self, operating_system: str):
        self._operating_system = str(operating_system)

    def get_resolusi_kamera_mp(self) -> int:
        return self._resolusi_kamera_mp

    def set_resolusi_kamera_mp(self, resolusi_kamera_mp: int):
        self._resolusi_kamera_mp = int(resolusi_kamera_mp)

    def get_ukuran_layar_inci(self) -> float:
        return self._ukuran_layar_inci

    def set_ukuran_layar_inci(self, ukuran_layar_inci: float):
        self._ukuran_layar_inci = float(ukuran_layar_inci)

    # --- GETTER & SETTER (Pythonic @property) ---
    @property
    def operating_system(self) -> str:
        return self._operating_system

    @operating_system.setter
    def operating_system(self, value: str):
        self._operating_system = str(value)

    @property
    def resolusi_kamera_mp(self) -> int:
        return self._resolusi_kamera_mp

    @resolusi_kamera_mp.setter
    def resolusi_kamera_mp(self, value: int):
        self._resolusi_kamera_mp = int(value)

    @property
    def ukuran_layar_inci(self) -> float:
        return self._ukuran_layar_inci

    @ukuran_layar_inci.setter
    def ukuran_layar_inci(self, value: float):
        self._ukuran_layar_inci = float(value)

    def to_row_data(self) -> list:
        """
        Mengambil keseluruhan 9 nilai atribut dari ketiga tingkatan kelas
        dan mengembalikannya sebagai list string untuk diformat pada baris tabel.
        """
        return [
            str(self.id_brand),
            str(self.nama_brand),
            str(self.negara_asal),
            str(self.tahun_rilis),
            f"{self.kapasitas_baterai_mah} mAh",
            f"{self.storage_gb} GB",
            str(self.operating_system),
            f"{self.resolusi_kamera_mp} MP",
            f"{self.ukuran_layar_inci:.1f}\"",
        ]


# ==============================================================================
# FUNGSI UTILITAS: PENCETAK TABEL TEKS BERUKURAN DINAMIS
# ==============================================================================
def cetak_tabel_dinamis(daftar_smartphone: list):
    """
    Mencetak seluruh koleksi objek Smartphone dalam bentuk tabel teks ASCII rapi.
    Lebar setiap kolom dihitung secara dinamis dari nilai terpanjang antara header
    dan seluruh isi data pada kolom terkait.
    """
    if not daftar_smartphone:
        print("\n[PERINGATAN] Tidak ada data smartphone untuk ditampilkan.")
        return

    # Definisi judul kolom (Header)
    headers = [
        "No.",
        "ID Brand",
        "Nama Brand",
        "Negara Asal",
        "Tahun Rilis",
        "Baterai",
        "Storage",
        "Operating System",
        "Kamera",
        "Layar",
    ]

    # Kumpulkan setiap baris data
    rows = []
    for idx, sp in enumerate(daftar_smartphone, start=1):
        row = [str(idx)] + sp.to_row_data()
        rows.append(row)

    # Hitung lebar maksimal per kolom secara dinamis
    col_widths = []
    for col_idx in range(len(headers)):
        header_len = len(headers[col_idx])
        max_data_len = max(len(row[col_idx]) for row in rows)
        col_widths.append(max(header_len, max_data_len))

    # Fungsi pembantu untuk membuat garis horizontal tabel (+----+----+)
    def buat_garis_pemisah(char_border="+", char_fill="-"):
        bagian = [char_fill * (w + 2) for w in col_widths]
        return f"{char_border}{char_border.join(bagian)}{char_border}"

    # Fungsi pembantu untuk memformat isi teks satu baris (| ... | ... |)
    def format_baris(kolom_kolom, rata_tengah_header=False):
        sel_sel = []
        for idx, teks in enumerate(kolom_kolom):
            w = col_widths[idx]
            if rata_tengah_header:
                sel_sel.append(f" {teks.center(w)} ")
            else:
                # Kolom indeks, ID, dan Tahun diratakan tengah
                if idx in (0, 1, 4):
                    sel_sel.append(f" {teks.center(w)} ")
                # Kolom spesifikasi angka dengan satuan diratakan kanan
                elif idx in (5, 6, 8, 9):
                    sel_sel.append(f" {teks.rjust(w)} ")
                # Kolom nama teks diratakan kiri
                else:
                    sel_sel.append(f" {teks.ljust(w)} ")
        return f"|{'|'.join(sel_sel)}|"

    garis_pembatas = buat_garis_pemisah("+", "-")
    garis_header = buat_garis_pemisah("+", "=")

    # Cetak banner dan tabel ke terminal
    print("\n" + "=" * len(garis_pembatas))
    print(" TABEL DATA SUPPLY CHAIN SMARTPHONE (WARISAN BERTINGKAT 3 LEVEL)".center(len(garis_pembatas)))
    print("=" * len(garis_pembatas))
    print(garis_pembatas)
    print(format_baris(headers, rata_tengah_header=True))
    print(garis_header)

    for row in rows:
        print(format_baris(row))
        print(garis_pembatas)

    print(f"Total Smartphone Terdaftar: {len(daftar_smartphone)} unit\n")


# ==============================================================================
# FUNGSI PEMBANTU VALIDASI INPUT PENGGUNA
# ==============================================================================
def input_integer(prompt_pesan: str, batas_bawah: int = None) -> int:
    """Meminta input integer dari terminal disertai validasi penanganan kesalahan."""
    while True:
        try:
            nilai = int(input(prompt_pesan).strip())
            if batas_bawah is not None and nilai < batas_bawah:
                print(f"   [Error] Nilai harus minimal {batas_bawah}. Silakan coba lagi.")
                continue
            return nilai
        except ValueError:
            print("   [Error] Masukan harus berupa bilangan bulat (angka). Silakan coba lagi.")


def input_float(prompt_pesan: str, batas_bawah: float = None) -> float:
    """Meminta input angka desimal (float) dari terminal disertai validasi."""
    while True:
        try:
            nilai = float(input(prompt_pesan).strip().replace(",", "."))
            if batas_bawah is not None and nilai <= batas_bawah:
                print(f"   [Error] Nilai harus lebih besar dari {batas_bawah}. Silakan coba lagi.")
                continue
            return nilai
        except ValueError:
            print("   [Error] Masukan harus berupa angka desimal (contoh: 6.7). Silakan coba lagi.")


def input_string(prompt_pesan: str) -> str:
    """Meminta input string tidak kosong dari terminal."""
    while True:
        nilai = input(prompt_pesan).strip()
        if nilai:
            return nilai
        print("   [Error] Bagian ini tidak boleh dikosongkan. Silakan isi kembali.")


# ==============================================================================
# PROGRAM UTAMA (MAIN PROGRAM)
# ==============================================================================
def main():
    print("=================================================================")
    print(" PROGRAM SMARTPHONE SUPPLY CHAIN MANAGEMENT - MULTI-BAGIAN INHERITANCE OOP")
    print("=================================================================")
    print("Menginisialisasi 5 data awal objek Smartphone (Hardcoded)...")

    # Inisialisasi awal list/vektor dengan 5 objek Smartphone yang bervariasi
    # Parameter diteruskan lengkap mencakup 9 atribut:
    # Bagian 1 (Brand)     : id_brand, nama_brand, negara_asal
    # Bagian 2 (Gadget)    : tahun_rilis, kapasitas_baterai_mah, storage_gb
    # Bagian 3 (Smartphone): operating_system, resolusi_kamera_mp, ukuran_layar_inci
    daftar_smartphone = [
        Smartphone(
            id_brand=101,
            nama_brand="Apple",
            negara_asal="Amerika Serikat",
            tahun_rilis=2023,
            kapasitas_baterai_mah=3274,
            storage_gb=128,
            operating_system="iOS 17",
            resolusi_kamera_mp=48,
            ukuran_layar_inci=6.1,
        ),
        Smartphone(
            id_brand=102,
            nama_brand="Samsung",
            negara_asal="Korea Selatan",
            tahun_rilis=2024,
            kapasitas_baterai_mah=5000,
            storage_gb=256,
            operating_system="Android 14 (One UI)",
            resolusi_kamera_mp=200,
            ukuran_layar_inci=6.8,
        ),
        Smartphone(
            id_brand=103,
            nama_brand="Xiaomi",
            negara_asal="Tiongkok",
            tahun_rilis=2024,
            kapasitas_baterai_mah=4610,
            storage_gb=512,
            operating_system="HyperOS (Android 14)",
            resolusi_kamera_mp=50,
            ukuran_layar_inci=6.36,
        ),
        Smartphone(
            id_brand=104,
            nama_brand="Google",
            negara_asal="Amerika Serikat",
            tahun_rilis=2023,
            kapasitas_baterai_mah=5050,
            storage_gb=128,
            operating_system="Android 14",
            resolusi_kamera_mp=50,
            ukuran_layar_inci=6.7,
        ),
        Smartphone(
            id_brand=105,
            nama_brand="Sony",
            negara_asal="Jepang",
            tahun_rilis=2024,
            kapasitas_baterai_mah=5000,
            storage_gb=256,
            operating_system="Android 14",
            resolusi_kamera_mp=48,
            ukuran_layar_inci=6.5,
        ),
    ]

    print(f"Sukses memuat {len(daftar_smartphone)} data Smartphone awal.")

    # --------------------------------------------------------------------------
    # LOOP INPUT PENGGUNA UNTUK MENAMBAHKAN OBJEK SMARTPHONE BARU
    # --------------------------------------------------------------------------
    print("\n-----------------------------------------------------------------")
    print(" INPUT DATA BARU OLEH PENGGUNA")
    print("-----------------------------------------------------------------")

    while True:
        pilihan = input("\nApakah Anda ingin menambahkan data Smartphone baru? (y/n): ").strip().lower()

        if pilihan in ("y", "ya", "yes"):
            print(f"\n--- Input Data Smartphone ke-{len(daftar_smartphone) + 1} ---")
            
            # Input atribut tingkat 1 (Brand)
            print("[Informasi Brand]")
            id_brand = input_integer("  Masukkan ID Brand (integer)           : ", batas_bawah=1)
            nama_brand = input_string("  Masukkan Nama Brand (string)          : ")
            negara_asal = input_string("  Masukkan Negara Asal (string)         : ")

            # Input atribut tingkat 2 (Gadget)
            print("[Spesifikasi Fisik Gadget]")
            tahun_rilis = input_integer("  Masukkan Tahun Rilis (integer)        : ", batas_bawah=1990)
            kapasitas_baterai = input_integer("  Kapasitas Baterai (mAh, integer)      : ", batas_bawah=100)
            storage_gb = input_integer("  Kapasitas Penyimpanan (GB, integer)   : ", batas_bawah=1)

            # Input atribut tingkat 3 (Smartphone)
            print("[Fitur Spesifik Smartphone]")
            os_name = input_string("  Sistem Operasi / OS (string)          : ")
            kamera_mp = input_integer("  Resolusi Kamera Utama (MP, integer)   : ", batas_bawah=1)
            layar_inci = input_float("  Ukuran Layar (inci, contoh: 6.7)      : ", batas_bawah=1.0)

            # Instansiasi objek Smartphone baru (memanfaatkan hierarki 3 level)
            objek_baru = Smartphone(
                id_brand=id_brand,
                nama_brand=nama_brand,
                negara_asal=negara_asal,
                tahun_rilis=tahun_rilis,
                kapasitas_baterai_mah=kapasitas_baterai,
                storage_gb=storage_gb,
                operating_system=os_name,
                resolusi_kamera_mp=kamera_mp,
                ukuran_layar_inci=layar_inci,
            )

            # Menambahkan ke daftar utama
            daftar_smartphone.append(objek_baru)
            print(f"\n[SUKSES] Data Smartphone '{nama_brand}' berhasil ditambahkan!")

        elif pilihan in ("n", "no", "tidak"):
            print("\nInput data selesai. Menyiapkan tampilan tabel gabungan...")
            break
        else:
            print("[Peringatan] Masukan tidak dikenali. Ketik 'y' untuk Ya atau 'n' untuk Tidak.")

    # --------------------------------------------------------------------------
    # MENAMPILKAN SEMUA DATA (HARDCODE + INPUT USER) DALAM TABEL DINAMIS
    # --------------------------------------------------------------------------
    cetak_tabel_dinamis(daftar_smartphone)


if __name__ == "__main__":
    main()
