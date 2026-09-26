#ifndef SMARTPHONE_H
#define SMARTPHONE_H

#include "Gadget.h"
#include <string>
#include <vector>

/**
 * ============================================================================
 * KELAS TURUNAN 2 (CHILD LEVEL 2): Smartphone
 * ============================================================================
 * Kelas Smartphone mewarisi (extends) kelas Gadget (yang mewarisi Brand).
 * Merupakan tingkatan ke-3 dalam hierarki Multilevel Inheritance.
 * Mewakili perangkat telepon pintar komersial yang siap didistribusikan.
 *
 * Menambahkan tepat 3 atribut baru:
 * 1. operating_system   (std::string) : Sistem operasi ponsel (cth: iOS, Android)
 * 2. resolusi_kamera_mp (int)         : Resolusi kamera utama dalam MegaPixel (MP)
 * 3. ukuran_layar_inci  (float)       : Diagonal ukuran layar dalam satuan inci
 * ============================================================================
 */
class Smartphone : public Gadget {
private:
    std::string operating_system;
    int resolusi_kamera_mp;
    float ukuran_layar_inci;

public:
    // Konstruktor default
    Smartphone();

    // Konstruktor berparameter meneruskan data ke Gadget -> Brand
    Smartphone(int id_brand, const std::string& nama_brand, const std::string& negara_asal,
               int tahun_rilis, int kapasitas_baterai_mah, int storage_gb,
               const std::string& operating_system, int resolusi_kamera_mp, float ukuran_layar_inci);

    // Virtual Destructor
    virtual ~Smartphone();

    // --- GETTER & SETTER ---
    std::string getOperatingSystem() const;
    void setOperatingSystem(const std::string& operating_system);

    int getResolusiKameraMp() const;
    void setResolusiKameraMp(int resolusi_kamera_mp);

    float getUkuranLayarInci() const;
    void setUkuranLayarInci(float ukuran_layar_inci);

    // Mengambil seluruh 9 atribut dari ketiga level sebagai baris data string
    std::vector<std::string> toRowData() const;
};

#endif // SMARTPHONE_H
