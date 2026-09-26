# Tugas Praktikum 2 - DPBO (Implementasi Java)

**Tema:** Smartphone Supply Chain  
**Topik:** Warisan Bertingkat (*Multilevel Inheritance*) - 3 Tingkatan Kelas  
**Bahasa:** Java (OpenJDK 17+)  

---

## 1. Struktur Berkas Java

```
Java/
├── Brand.java       <- Kelas Induk (Base Class)
├── Gadget.java      <- Kelas Turunan 1 (extends Brand)
├── Smartphone.java  <- Kelas Turunan 2 (extends Gadget)
├── Main.java        <- Program Utama (ArrayList<Smartphone>, Scanner, Dynamic Table)
└── README.md        <- Panduan kompilasi dan eksekusi
```

---

## 2. Hierarki Kelas dan Atribut

1. **`Brand` (Kelas Induk)**:
   - `id_brand` (`int`)
   - `nama_brand` (`String`)
   - `negara_asal` (`String`)
2. **`Gadget extends Brand` (Tingkat 1)**:
   - `tahun_rilis` (`int`)
   - `kapasitas_baterai_mah` (`int`)
   - `storage_gb` (`int`)
3. **`Smartphone extends Gadget` (Tingkat 2)**:
   - `operating_system` (`String`)
   - `resolusi_kamera_mp` (`int`)
   - `ukuran_layar_inci` (`double`)

---

## 3. Cara Kompilasi dan Eksekusi

Buka terminal pada folder `Java/`:

```bash
# Kompilasi seluruh file Java
javac Brand.java Gadget.java Smartphone.java Main.java

# Jalankan program utama
java Main
```
