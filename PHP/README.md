# Tugas Praktikum 2 - DPBO (Implementasi PHP & HTML)

**Tema:** Smartphone Supply Chain  
**Topik:** Warisan Bertingkat (*Multilevel Inheritance*) - 3 Tingkatan Kelas  
**Bahasa:** PHP 8+ & HTML5 / CSS3  

---

## 1. Struktur Berkas PHP

```
PHP/
├── Brand.php        <- Kelas Induk (Base Class)
├── Gadget.php       <- Kelas Turunan 1 (extends Brand)
├── Smartphone.php   <- Kelas Turunan 2 (extends Gadget) + atribut privat foto_produk
├── main.php         <- Program Utama (Hardcoded 5 data awal + user data + Tabel HTML)
├── images/          <- Folder aset gambar / SVG produk
│   ├── iphone15.svg
│   ├── s24ultra.svg
│   ├── xiaomi14.svg
│   ├── pixel8.svg
│   ├── xperia1.svg
│   ├── rog8.svg
│   └── default.svg
└── README.md        <- Dokumentasi dan panduan eksekusi
```

---

## 2. Struktur Warisan (*Inheritance*) dan Atribut

```
        +-----------------------------------+
        |               Brand               |  <-- Kelas Induk (Base Class)
        |-----------------------------------|
        | # id_brand: int                   |
        | # nama_brand: string              |
        | # negara_asal: string             |
        +-----------------------------------+
                          ▲
                          |  (extends)
        +-----------------------------------+
        |              Gadget               |  <-- Kelas Turunan 1 (Child Level 1)
        |-----------------------------------|
        | # tahun_rilis: int                |
        | # kapasitas_baterai_mah: int      |
        | # storage_gb: int                 |
        +-----------------------------------+
                          ▲
                          |  (extends)
        +-----------------------------------+
        |            Smartphone             |  <-- Kelas Turunan 2 (Child Level 2)
        |-----------------------------------|
        | - operating_system: string        |
        | - resolusi_kamera_mp: int         |
        | - ukuran_layar_inci: float        |
        | - foto_produk: string (private)   |  <-- Atribut Tambahan
        +-----------------------------------+
```

### Rincian Atribut Setiap Kelas:
1. **`Brand` (Kelas Induk)**:
   - `id_brand` (`int`): Nomor identitas unik brand.
   - `nama_brand` (`string`): Nama merek dagang.
   - `negara_asal` (`string`): Negara asal markas utama brand.
2. **`Gadget extends Brand` (Tingkat 1)**:
   - `tahun_rilis` (`int`): Tahun produk diluncurkan.
   - `kapasitas_baterai_mah` (`int`): Kapasitas daya baterai dalam mAh.
   - `storage_gb` (`int`): Kapasitas penyimpanan internal dalam GB.
3. **`Smartphone extends Gadget` (Tingkat 2)**:
   - `operating_system` (`string`): Sistem operasi perangkat (cth: Android, iOS).
   - `resolusi_kamera_mp` (`int`): Resolusi kamera utama dalam MegaPixel.
   - `ukuran_layar_inci` (`float`): Diagonal ukuran layar dalam satuan inci.
   - **`foto_produk` (`string, private`)**: Jalur (*path*) berkas gambar/foto produk smartphone, dilengkapi metode pengambil (`getFotoProduk()`) dan penyetel (`setFotoProduk()`).

---

## 3. Fitur `main.php`

1. **5 Objek Awal (*Hardcoded*)**: Diinisialisasi langsung ke dalam array objek `Smartphone` (*Apple, Samsung, Xiaomi, Google, Sony*).
2. **Data Pengguna Baru (*Hardcoded*)**: Menambahkan objek baru (misal: *Asus ROG*) sesuai dengan ketentuan pedoman praktikum lab.
3. **Tabel HTML Dinamis**:
   - Menampilkan seluruh atribut dari kelas induk (`Brand`), perantara (`Gadget`), dan anak (`Smartphone`).
   - Menyertakan **kolom 'Foto'** yang merender tag `<img>` menggunakan jalur atribut `foto_produk`.
4. **Form Interaktif Tambah Data**: Menyediakan form web interaktif untuk menambahkan unit smartphone baru secara langsung saat diakses via browser.

---

## 4. Cara Menjalankan Program

### Menggunakan PHP Built-in Web Server (Direkomendasikan):

Buka terminal pada folder `PHP/`:

```bash
cd PHP
php -S localhost:8000
```

Buka peramban (browser) dan akses alamat:
```
http://localhost:8000/main.php
```

### Menggunakan PHP CLI (Mengekspor ke File HTML):

```bash
cd PHP
php main.php > output.html
open output.html
```
