#include "Brand.h"
#include <sstream>

// Konstruktor default
Brand::Brand() : id_brand(0), nama_brand(""), negara_asal("") {}

// Konstruktor berparameter menggunakan member initializer list
Brand::Brand(int id_brand, const std::string& nama_brand, const std::string& negara_asal)
    : id_brand(id_brand), nama_brand(nama_brand), negara_asal(negara_asal) {}

// Virtual Destructor
Brand::~Brand() {}

// --- GETTER & SETTER ---
int Brand::getIdBrand() const {
    return id_brand;
}

void Brand::setIdBrand(int id_brand) {
    this->id_brand = id_brand;
}

std::string Brand::getNamaBrand() const {
    return nama_brand;
}

void Brand::setNamaBrand(const std::string& nama_brand) {
    this->nama_brand = nama_brand;
}

std::string Brand::getNegaraAsal() const {
    return negara_asal;
}

void Brand::setNegaraAsal(const std::string& negara_asal) {
    this->negara_asal = negara_asal;
}

std::string Brand::displayBrandInfo() const {
    std::ostringstream oss;
    oss << "[Brand ID: " << id_brand << "] " << nama_brand << " (" << negara_asal << ")";
    return oss.str();
}
