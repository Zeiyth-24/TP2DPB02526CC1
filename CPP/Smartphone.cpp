#include "Smartphone.h"
#include <iomanip>
#include <sstream>

// Konstruktor default
Smartphone::Smartphone()
    : Gadget(), operating_system(""), resolusi_kamera_mp(0), ukuran_layar_inci(0.0f) {}

// Konstruktor berparameter meneruskan parameter ke konstruktor Gadget via initializer list
Smartphone::Smartphone(int id_brand, const std::string& nama_brand, const std::string& negara_asal,
                       int tahun_rilis, int kapasitas_baterai_mah, int storage_gb,
                       const std::string& operating_system, int resolusi_kamera_mp, float ukuran_layar_inci)
    : Gadget(id_brand, nama_brand, negara_asal, tahun_rilis, kapasitas_baterai_mah, storage_gb),
      operating_system(operating_system),
      resolusi_kamera_mp(resolusi_kamera_mp),
      ukuran_layar_inci(ukuran_layar_inci) {}

// Virtual Destructor
Smartphone::~Smartphone() {}

// --- GETTER & SETTER ---
std::string Smartphone::getOperatingSystem() const {
    return operating_system;
}

void Smartphone::setOperatingSystem(const std::string& operating_system) {
    this->operating_system = operating_system;
}

int Smartphone::getResolusiKameraMp() const {
    return resolusi_kamera_mp;
}

void Smartphone::setResolusiKameraMp(int resolusi_kamera_mp) {
    this->resolusi_kamera_mp = resolusi_kamera_mp;
}

float Smartphone::getUkuranLayarInci() const {
    return ukuran_layar_inci;
}

void Smartphone::setUkuranLayarInci(float ukuran_layar_inci) {
    this->ukuran_layar_inci = ukuran_layar_inci;
}

std::vector<std::string> Smartphone::toRowData() const {
    // Format ukuran layar dengan 1 angka di belakang koma
    std::ostringstream ossLayar;
    ossLayar << std::fixed << std::setprecision(1) << ukuran_layar_inci << "\"";

    return {
        std::to_string(id_brand),
        nama_brand,
        negara_asal,
        std::to_string(tahun_rilis),
        std::to_string(kapasitas_baterai_mah) + " mAh",
        std::to_string(storage_gb) + " GB",
        operating_system,
        std::to_string(resolusi_kamera_mp) + " MP",
        ossLayar.str()
    };
}
