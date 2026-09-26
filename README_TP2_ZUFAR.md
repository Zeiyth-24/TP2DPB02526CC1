# Tugas Praktikum 2 - Desain dan Pemrograman Berorientasi Objek 2026

## Janji
Saya Zufar Ahmad Maulidy dengan NIM 2400285 mengerjakan Tugas Praktikum 2 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

Program ini dibuat dengan konsep Multilevel Inheritance (pewarisan berantai 3 tingkat) dengan tema realistis "Smartphone Supply Chain" yang merepresentasikan rantai klasifikasi produk dari entitas merek hingga perangkat smartphone spesifik:

1. Kelas Brand: Atribut dasar/umum seperti id brand, nama brand, dan negara asal.
2. Kelas Gadget: Atribut spesifik perangkat seperti tahun rilis, kapasitas baterai, dan kapasitas penyimpanan (mewarisi dari Brand).
3. Kelas Smartphone: Atribut unik ponsel pintar seperti sistem operasi, resolusi kamera, dan ukuran layar (mewarisi dari Gadget).

[Brand] (Kakek / Base Class)
   ▲
   │  (Inherits)
[Gadget] (Bapak / Intermediate Class)
   ▲
   │  (Inherits)
[Smartphone] (Anak / Derived Child Class)

classDiagram
    class Brand {
        -int id_brand
        -string nama_brand
        -string negara_asal
        +Brand()
        +Brand(int id, string nama, string negara)
        +getIdBrand() int
        +setIdBrand(int id) void
        +getNamaBrand() string
        +setNamaBrand(string nama) void
        +getNegaraAsal() string
        +setNegaraAsal(string negara) void
    }

    class Gadget {
        -int tahun_rilis
        -int kapasitas_baterai_mah
        -int storage_gb
        +Gadget()
        +Gadget(int id, string nama, string negara, int tahun, int bat, int storage)
        +getTahunRilis() int
        +setTahunRilis(int tahun) void
        +getKapasitasBateraiMah() int
        +setKapasitasBateraiMah(int bat) void
        +getStorageGb() int
        +setStorageGb(int storage) void
    }

    class Smartphone {
        -string operating_system
        -int resolusi_kamera_mp
        -float ukuran_layar_inci
        -string foto_produk
        +Smartphone()
        +Smartphone(..., string os, int kamera, float layar, string foto)
        +getOperatingSystem() string
        +setOperatingSystem(string os) void
        +getResolusiKameraMp() int
        +setResolusiKameraMp(int kamera) void
        +getUkuranLayarInci() float
        +setUkuranLayarInci(float layar) void
        +getFotoProduk() string
        +setFotoProduk(string foto) void
    }

    Brand <|-- Gadget
    Gadget <|-- Smartphone


2. Penjelasan Atribut dan Method
A. Class Brand (Base Class)
Merepresentasikan entitas pemilik merek dagang atau pabrikan perangkat:

Atribut:

    id_brand (int/string): Kode unik identifikasi merek.
    nama_brand (string): Nama resmi merek dagang (contoh: Apple, Samsung, Xiaomi).
    negara_asal (string): Negara markas/asal produsen.

    Method:
    Constructor: Inisialisasi awal atribut Brand.
    Getter & Setter untuk ketiga atribut (id_brand, nama_brand, negara_asal).

B. Class Gadget (Child dari Brand)
Merepresentasikan spesifikasi umum perangkat keras yang mewarisi seluruh data dari Brand:

Atribut:
    tahun_rilis (int): Tahun perangkat resmi dirilis ke pasar.
    kapasitas_baterai_mah (int): Daya tahan baterai dalam miliampere-hour (mAh).
    storage_gb (int): Kapasitas memori internal dalam Gigabyte (GB).

    Method:
    Constructor: Memanggil konstruktor induk Brand via super()/initialization list, lalu mengisi atribut spesifik Gadget.
    Getter & Setter untuk ketiga atribut hardware (tahun_rilis, kapasitas_baterai_mah, storage_gb).

C. Class Smartphone (Child dari Gadget)
Merepresentasikan produk ponsel pintar spesifik, mewarisi seluruh data hierarki dari Gadget dan Brand:

Atribut:
    operating_system (string): Sistem operasi perangkat (contoh: iOS, Android, HyperOS).
    resolusi_kamera_mp (int): Ketajaman sensor kamera utama dalam Megapixel (MP).
    ukuran_layar_inci (float): Diagonal layar dalam satuan inci.
    foto_produk (string) (Khusus Implementasi PHP): Lokasi file gambar produk untuk ditampilkan pada halaman web.

    Method:
    Constructor: Memanggil konstruktor parent Gadget dan menginisialisasi atribut khusus Smartphone.
    Getter & Setter untuk atribut smartphone (operating_system, resolusi_kamera_mp, ukuran_layar_inci, foto_produk).

3. Penjelasan Alur Program
    inisialisasi data default (objek awal):

    saat program pertama kali dijalankan, sistem otomatis membuat 5 objek awal dari class Smartphone ke dalam list/vector/array dengan data yang bervariasi.

    penerimaan input pengguna (fitur add):
    program akan meminta pengguna memasukkan data baru melalui terminal (interaktif pada C++, Java, dan Python) untuk menambahkan data objek ke-6 ke dalam list.
    pada PHP, input data ditambahkan secara terstruktur ke dalam array objek.

    penyajian data dalam tabel dinamis:
    seluruh data (5 objek awal + data baru) akan ditampilkan secara bersamaan ke dalam satu tabel lengkap.

    pada C++, Java, dan Python menggunakan algoritma dengan menentukan lebar kolom dinamis (menghitung panjang string terpanjang pada tiap kolom) sehingga garis pembatas tabel rapi dan tidak bergeser.

    pada PHP menggunakan struktur tabel HTML responsif yang menampilkan teks data beserta render visual file gambar produk