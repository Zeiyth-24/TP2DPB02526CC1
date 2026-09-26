#ifndef BRAND_H
#define BRAND_H

#include <string>

/**
 * ============================================================================
 * KELAS INDUK (BASE CLASS): Brand
 * ============================================================================
 * Mewakili entitas prinsipal/pemilik merek dalam rantai pasok (Supply Chain).
 * Merupakan kelas dasar (Root/Parent) pada hierarki Multilevel Inheritance.
 *
 * Memiliki tepat 3 atribut tertentu:
 * 1. id_brand    (int)         : Nomor identifikasi unik brand
 * 2. nama_brand  (std::string) : Nama merek dagang
 * 3. negara_asal (std::string) : Negara asal kantor pusat brand
 * ============================================================================
 */
class Brand {
protected:
    // Enkapsulasi: Atribut dilindungi (protected) agar dapat diakses
    // oleh kelas turunan (Gadget & Smartphone) jika diperlukan
    int id_brand;
    std::string nama_brand;
    std::string negara_asal;

public:
    // Konstruktor default
    Brand();

    // Konstruktor berparameter
    Brand(int id_brand, const std::string& nama_brand, const std::string& negara_asal);

    // Virtual Destructor untuk memastikan pembersihan memori polimorfik yang aman
    virtual ~Brand();

    // --- GETTER & SETTER ---
    int getIdBrand() const;
    void setIdBrand(int id_brand);

    std::string getNamaBrand() const;
    void setNamaBrand(const std::string& nama_brand);

    std::string getNegaraAsal() const;
    void setNegaraAsal(const std::string& negara_asal);

    // Metode representasi informasi Brand
    virtual std::string displayBrandInfo() const;
};

#endif // BRAND_H
