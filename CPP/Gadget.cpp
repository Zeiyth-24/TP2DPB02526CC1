#include "Gadget.h"
#include <sstream>

// Konstruktor default
Gadget::Gadget()
    : Brand(), tahun_rilis(0), kapasitas_baterai_mah(0), storage_gb(0) {}

// Konstruktor berparameter dengan memanggil konstruktor Brand
Gadget::Gadget(int id_brand, const std::string& nama_brand, const std::string& negara_asal,
               int tahun_rilis, int kapasitas_baterai_mah, int storage_gb)
    : Brand(id_brand, nama_brand, negara_asal),
      tahun_rilis(tahun_rilis),
      kapasitas_baterai_mah(kapasitas_baterai_mah),
      storage_gb(storage_gb) {}

// Virtual Destructor
Gadget::~Gadget() {}

// --- GETTER & SETTER ---
int Gadget::getTahunRilis() const {
    return tahun_rilis;
}

void Gadget::setTahunRilis(int tahun_rilis) {
    this->tahun_rilis = tahun_rilis;
}

int Gadget::getKapasitasBateraiMah() const {
    return kapasitas_baterai_mah;
}

void Gadget::setKapasitasBateraiMah(int kapasitas_baterai_mah) {
    this->kapasitas_baterai_mah = kapasitas_baterai_mah;
}

int Gadget::getStorageGb() const {
    return storage_gb;
}

void Gadget::setStorageGb(int storage_gb) {
    this->storage_gb = storage_gb;
}

std::string Gadget::displayGadgetInfo() const {
    std::ostringstream oss;
    oss << displayBrandInfo()
        << " | Rilis: " << tahun_rilis
        << " | Baterai: " << kapasitas_baterai_mah << "mAh"
        << " | Storage: " << storage_gb << "GB";
    return oss.str();
}
