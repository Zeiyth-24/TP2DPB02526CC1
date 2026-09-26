#ifndef GADGET_H
#define GADGET_H

#include "Brand.h"
#include <string>

/**
 * ============================================================================
 * KELAS TURUNAN 1 (CHILD LEVEL 1): Gadget
 * ============================================================================
 * Kelas Gadget mewarisi (extends) kelas Brand secara publik.
 * Mewakili perangkat elektronik umum hasil manufaktur dari suatu Brand.
 *
 * Menambahkan tepat 3 atribut baru:
 * 1. tahun_rilis           (int) : Tahun produk gadget diluncurkan
 * 2. kapasitas_baterai_mah (int) : Daya tampung baterai (mAh)
 * 3. storage_gb            (int) : Kapasitas penyimpanan internal (GB)
 * ============================================================================
 */
class Gadget : public Brand {
protected:
    int tahun_rilis;
    int kapasitas_baterai_mah;
    int storage_gb;

public:
    // Konstruktor default
    Gadget();

    // Konstruktor berparameter
    Gadget(int id_brand, const std::string& nama_brand, const std::string& negara_asal,
           int tahun_rilis, int kapasitas_baterai_mah, int storage_gb);

    // Virtual Destructor
    virtual ~Gadget();

    // --- GETTER & SETTER ---
    int getTahunRilis() const;
    void setTahunRilis(int tahun_rilis);

    int getKapasitasBateraiMah() const;
    void setKapasitasBateraiMah(int kapasitas_baterai_mah);

    int getStorageGb() const;
    void setStorageGb(int storage_gb);

    // Override metode representasi informasi Gadget
    virtual std::string displayGadgetInfo() const;
};

#endif // GADGET_H
