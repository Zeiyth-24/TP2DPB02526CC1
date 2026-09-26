# Tugas Praktikum 2 - DPBO (Desain & Pemrograman Berorientasi Objek)

**Tema:** Smartphone Supply Chain  
**Topik:** Warisan Bertingkat (*Multilevel Inheritance*) - 3 Tingkatan Kelas  
**Implementasi:** C++ (Modular Header & Source) dan Python  

---

## 1. Konsep dan Arsitektur Kelas

Program ini mengimplementasikan konsep **Multilevel Inheritance (Warisan Bertingkat)** dengan tiga tingkatan hierarki kelas yang merepresentasikan rantai pasok (*supply chain*) produk *smartphone*:

```
        +-----------------------------------+
        |               Brand               |  <-- Kelas Induk (Base Class)
        |-----------------------------------|
        | # id_brand: int                   |
        | # nama_brand: std::string         |
        | # negara_asal: std::string        |
        +-----------------------------------+
                          ▲
                          |  (public inheritance / extends)
        +-----------------------------------+
        |              Gadget               |  <-- Kelas Turunan 1 (Child Level 1)
        |-----------------------------------|
        | # tahun_rilis: int                |
        | # kapasitas_baterai_mah: int      |
        | # storage_gb: int                 |
        +-----------------------------------+
                          ▲
                          |  (public inheritance / extends)
        +-----------------------------------+
        |            Smartphone             |  <-- Kelas Turunan 2 (Child Level 2)
        |-----------------------------------|
        | - operating_system: std::string   |
        | - resolusi_kamera_mp: int         |
        | - ukuran_layar_inci: float        |
        +-----------------------------------+
```

### Rincian Atribut Setiap Kelas (Tepat 3 Atribut per Kelas):
1. **Kelas `Brand` (Induk)**:
   - `id_brand` (`int`): Nomor identitas unik brand/merek.
   - `nama_brand` (`std::string`): Nama entitas brand.
   - `negara_asal` (`std::string`): Negara asal markas utama brand.

2. **Kelas `Gadget` (Child dari `Brand`)**:
   - `tahun_rilis` (`int`): Tahun peluncuran gadget ke publik.
   - `kapasitas_baterai_mah` (`int`): Kapasitas daya baterai dalam satuan mAh.
   - `storage_gb` (`int`): Kapasitas memori internal dalam satuan Gigabyte (GB).

3. **Kelas `Smartphone` (Child dari `Gadget`)**:
   - `operating_system` (`std::string`): Sistem operasi perangkat (contoh: *Android 14*, *iOS 17*).
   - `resolusi_kamera_mp` (`int`): Resolusi kamera utama dalam MegaPixel (MP).
   - `ukuran_layar_inci` (`float`): Ukuran diagonal bentang layar dalam satuan inci.

Setiap objek `Smartphone` mewarisi seluruh atribut kelas pendahulunya sehingga memiliki total **9 atribut**.

---

## 2. Struktur Berkas Solusi C++

Proyek C++ diorganisir secara modular dengan memisahkan file deklarasi (*header*) `.h` dan file implementasi (*source*) `.cpp`:

```
TP2/
├── Brand.h          <- Deklarasi kelas Brand (Level 1)
├── Brand.cpp        <- Implementasi kelas Brand
├── Gadget.h         <- Deklarasi kelas Gadget (Level 2)
├── Gadget.cpp       <- Implementasi kelas Gadget
├── Smartphone.h     <- Deklarasi kelas Smartphone (Level 3)
├── Smartphone.cpp   <- Implementasi kelas Smartphone
├── main.cpp         <- Program utama: std::vector, input loop, tabel dinamis setw
├── Makefile         <- Script otomasi build C++ (make / make run / make clean)
├── main.py          <- Implementasi versi Python
└── README.md        <- Dokumentasi proyek
```

---

## 3. Fitur Utama Solusi C++

1. **Konstruktor Berantai (*Constructor Chaining*)**:
   - `Smartphone` memanggil konstruktor `Gadget` pada *member initializer list*, yang selanjutnya memanggil konstruktor `Brand`.
2. **Penyimpanan Objek Dinamis**:
   - Menggunakan `std::vector<Smartphone>` untuk menyimpan koleksi objek smartphone.
3. **Data Awal Bervariasi (*Hardcoded Data*)**:
   - Dimulai dengan 5 objek `Smartphone` awal yang bervariasi (*Apple, Samsung, Xiaomi, Google, Sony*).
4. **Input Interaktif Melalui Terminal**:
   - Menggunakan `while` loop yang menerima input data baru dari pengguna terminal.
   - Pembersihan dan validasi input menggunakan `std::getline` dan `stoi`/`stof` untuk menghindari masalah *buffer newline* pada `std::cin`.
5. **Tabel Teks Berukuran Dinamis (*Dynamic Table Formatter*)**:
   - Menghitung lebar setiap kolom secara dinamis berdasarkan data terpanjang.
   - Menggunakan pemformatan `std::setw`, `std::left`, dan `std::right` dari pustaka `<iomanip>`.

---

## 4. Cara Kompilasi dan Menjalankan (C++)

### Opsi A: Menggunakan Makefile (Direkomendasikan)

```bash
# Kompilasi kode
make

# Menjalankan program
make run

# Membersihkan file objek biner
make clean
```

### Opsi B: Menggunakan g++ / clang++ secara langsung

```bash
g++ -std=c++17 -Wall -Wextra -O2 main.cpp Brand.cpp Gadget.cpp Smartphone.cpp -o program
./program
```

---

## 5. Contoh Tampilan Output Terminal

```text
==============================================================================================================================================
                                    TABEL DATA SUPPLY CHAIN SMARTPHONE (WARISAN BERTINGKAT 3 LEVEL - C++)
==============================================================================================================================================
+-----+----------+------------+----------------------------+-------------+----------+---------+-----------------------------+--------+-------+
| No. | ID Brand | Nama Brand |        Negara Asal         | Tahun Rilis | Baterai  | Storage |      Operating System       | Kamera | Layar |
+=====+==========+============+============================+=============+==========+=========+=============================+========+=======+
|  1  |   101    | Apple      | Amerika Serikat            |    2023     | 3274 mAh |  128 GB | iOS 17                      |  48 MP |  6.1" |
+-----+----------+------------+----------------------------+-------------+----------+---------+-----------------------------+--------+-------+
|  2  |   102    | Samsung    | Korea Selatan              |    2024     | 5000 mAh |  256 GB | Android 14 (One UI)         | 200 MP |  6.8" |
+-----+----------+------------+----------------------------+-------------+----------+---------+-----------------------------+--------+-------+
|  3  |   103    | Xiaomi     | Tiongkok                   |    2024     | 4610 mAh |  512 GB | HyperOS (Android 14)        |  50 MP |  6.4" |
+-----+----------+------------+----------------------------+-------------+----------+---------+-----------------------------+--------+-------+
|  4  |   104    | Google     | Amerika Serikat            |    2023     | 5050 mAh |  128 GB | Android 14                  |  50 MP |  6.7" |
+-----+----------+------------+----------------------------+-------------+----------+---------+-----------------------------+--------+-------+
|  5  |   105    | Sony       | Jepang                     |    2024     | 5000 mAh |  256 GB | Android 14                  |  48 MP |  6.5" |
+-----+----------+------------+----------------------------+-------------+----------+---------+-----------------------------+--------+-------+
|  6  |   106    | Asus ROG   | Taiwan (Republik Tiongkok) |    2024     | 6000 mAh | 1024 GB | Android 14 (ROG UI Edition) |  50 MP |  6.8" |
+-----+----------+------------+----------------------------+-------------+----------+---------+-----------------------------+--------+-------+
Total Smartphone Terdaftar: 6 unit
```
