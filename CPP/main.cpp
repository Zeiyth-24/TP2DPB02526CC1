#include <algorithm>
#include <cctype>
#include <iomanip>
#include <iostream>
#include <string>
#include <vector>

#include "Smartphone.h"

/**
 * ============================================================================
 * FUNGSI PEMBANTU VALIDASI INPUT PENGGUNA
 * ============================================================================
 * Menggunakan std::getline dan parsing aman (stoi/stof) untuk mencegah
 * masalah buffer sisa newline (\n) pada std::cin.
 * ============================================================================
 */

// Meminta input string yang tidak boleh kosong
std::string inputString(const std::string &prompt) {
  std::string hasil;
  while (true) {
    std::cout << prompt;
    if (!std::getline(std::cin, hasil)) {
      std::cin.clear();
      continue;
    }
    // Hapus whitespace di awal dan akhir
    size_t first = hasil.find_first_not_of(" \t\r\n");
    if (first == std::string::npos) {
      std::cout << "   [Error] Isian tidak boleh kosong. Silakan coba lagi.\n";
      continue;
    }
    size_t last = hasil.find_last_not_of(" \t\r\n");
    return hasil.substr(first, (last - first + 1));
  }
}

// Meminta input integer dengan batas nilai minimum
int inputInteger(const std::string &prompt, int batasBawah = 1) {
  while (true) {
    std::string baris = inputString(prompt);
    try {
      size_t pos;
      int nilai = std::stoi(baris, &pos);
      if (pos != baris.length()) {
        throw std::invalid_argument("Terdapat karakter bukan angka");
      }
      if (nilai < batasBawah) {
        std::cout << "   [Error] Nilai harus minimal " << batasBawah
                  << ". Silakan coba lagi.\n";
        continue;
      }
      return nilai;
    } catch (...) {
      std::cout << "   [Error] Masukan harus berupa bilangan bulat valid. "
                   "Silakan coba lagi.\n";
    }
  }
}

// Meminta input float dengan batas nilai minimum
float inputFloat(const std::string &prompt, float batasBawah = 0.1f) {
  while (true) {
    std::string baris = inputString(prompt);
    // Ubah koma menjadi titik jika pengguna mengetik format Indonesia (contoh:
    // 6,7)
    std::replace(baris.begin(), baris.end(), ',', '.');
    try {
      size_t pos;
      float nilai = std::stof(baris, &pos);
      if (pos != baris.length()) {
        throw std::invalid_argument("Terdapat karakter bukan angka");
      }
      if (nilai < batasBawah) {
        std::cout << "   [Error] Nilai harus minimal " << batasBawah
                  << ". Silakan coba lagi.\n";
        continue;
      }
      return nilai;
    } catch (...) {
      std::cout << "   [Error] Masukan harus berupa angka desimal valid "
                   "(contoh: 6.7). Silakan coba lagi.\n";
    }
  }
}

/**
 * ============================================================================
 * FUNGSI PENCETAK TABEL TEKS DINAMIS MENGGUNAKAN std::setw
 * ============================================================================
 * Menghitung lebar kolom secara dinamis dan memformat batas tabel secara rapi
 * memanfaatkan manipulator std::setw, std::left, dan std::right dari <iomanip>.
 * ============================================================================
 */
void cetakTabelDinamis(const std::vector<Smartphone> &daftar_smartphone) {
  if (daftar_smartphone.empty()) {
    std::cout
        << "\n[PERINGATAN] Tidak ada data smartphone yang dapat ditampilkan.\n";
    return;
  }

  // Definisi nama-nama header kolom
  std::vector<std::string> headers = {
      "No.",     "ID Brand", "Nama Brand",       "Negara Asal", "Tahun Rilis",
      "Baterai", "Storage",  "Operating System", "Kamera",      "Layar"};

  // Mengumpulkan seluruh baris data dalam bentuk matriks string
  std::vector<std::vector<std::string>> rows;
  for (size_t i = 0; i < daftar_smartphone.size(); ++i) {
    std::vector<std::string> rowData;
    rowData.push_back(std::to_string(i + 1)); // Nomor urut

    // Mengambil 9 atribut Smartphone
    std::vector<std::string> specs = daftar_smartphone[i].toRowData();
    rowData.insert(rowData.end(), specs.begin(), specs.end());

    rows.push_back(rowData);
  }

  // Menghitung lebar maksimum untuk masing-masing kolom secara dinamis
  std::vector<int> col_widths(headers.size(), 0);
  for (size_t col = 0; col < headers.size(); ++col) {
    int max_len = static_cast<int>(headers[col].length());
    for (const auto &row : rows) {
      max_len = std::max(max_len, static_cast<int>(row[col].length()));
    }
    col_widths[col] = max_len;
  }

  // Membuat garis pemisah horizontal (+-------+-------+)
  auto buatGarisPemisah = [&](char border, char fill) -> std::string {
    std::string hasil = "";
    hasil += border;
    for (int w : col_widths) {
      hasil += std::string(w + 2, fill);
      hasil += border;
    }
    return hasil;
  };

  std::string garisPemisah = buatGarisPemisah('+', '-');
  std::string garisHeader = buatGarisPemisah('+', '=');

  // Menghitung total lebar tabel untuk banner judul tengah
  int totalLebarTabel = static_cast<int>(garisPemisah.length());
  std::string judul =
      "TABEL DATA SUPPLY CHAIN SMARTPHONE (WARISAN BERTINGKAT 3 LEVEL - C++)";
  int padJudulKiri =
      std::max(0, (totalLebarTabel - static_cast<int>(judul.length())) / 2);

  // Mencetak Banner Judul
  std::cout << "\n" << std::string(totalLebarTabel, '=') << "\n";
  std::cout << std::string(padJudulKiri, ' ') << judul << "\n";
  std::cout << std::string(totalLebarTabel, '=') << "\n";

  // Mencetak Header Tabel dengan perataan tengah menggunakan std::setw
  std::cout << garisPemisah << "\n";
  std::cout << "|";
  for (size_t col = 0; col < headers.size(); ++col) {
    int w = col_widths[col];
    int sisaPadding = w - static_cast<int>(headers[col].length());
    int padLeft = sisaPadding / 2;
    int padRight = sisaPadding - padLeft;

    std::cout << " " << std::string(padLeft, ' ') << headers[col]
              << std::string(padRight, ' ') << " |";
  }
  std::cout << "\n";
  std::cout << garisHeader << "\n";

  // Mencetak Setiap Baris Data Smartphone
  for (const auto &row : rows) {
    std::cout << "|";
    for (size_t col = 0; col < row.size(); ++col) {
      int w = col_widths[col];
      std::cout << " ";

      // Format alignment menggunakan std::setw, std::left, dan std::right
      if (col == 0 || col == 1 || col == 4) {
        // Kolom No, ID Brand, Tahun Rilis -> Center Alignment
        int sisaPadding = w - static_cast<int>(row[col].length());
        int padLeft = sisaPadding / 2;
        int padRight = sisaPadding - padLeft;
        std::cout << std::string(padLeft, ' ') << row[col]
                  << std::string(padRight, ' ');
      } else if (col == 5 || col == 6 || col == 8 || col == 9) {
        // Kolom Baterai, Storage, Kamera, Layar -> Right Alignment dengan
        // std::setw
        std::cout << std::right << std::setw(w) << row[col];
      } else {
        // Kolom Teks (Nama Brand, Negara, OS) -> Left Alignment dengan
        // std::setw
        std::cout << std::left << std::setw(w) << row[col];
      }

      std::cout << " |";
    }
    std::cout << "\n";
    std::cout << garisPemisah << "\n";
  }

  std::cout << "Total Smartphone Terdaftar: " << daftar_smartphone.size()
            << " unit\n\n";
}

/**
 * ============================================================================
 * PROGRAM UTAMA (MAIN PROGRAM)
 * ============================================================================
 */
int main() {
  std::cout
      << "=================================================================\n";
  std::cout
      << " PROGRAM SMARTPHONE SUPPLY CHAIN MANAGEMENT - C++ MULTI-BAGIAN OOP\n";
  std::cout
      << "=================================================================\n";
  std::cout << "Menginisialisasi 5 data awal objek Smartphone (Hardcoded)...\n";

  // 1. Inisialisasi std::vector berisi 5 objek Smartphone yang di-hardcode
  // Urutan parameter:
  // Level 1 (Brand)     : id_brand, nama_brand, negara_asal
  // Level 2 (Gadget)    : tahun_rilis, kapasitas_baterai_mah, storage_gb
  // Level 3 (Smartphone): operating_system, resolusi_kamera_mp,
  // ukuran_layar_inci
  std::vector<Smartphone> daftar_smartphone = {
      Smartphone(101, "Apple", "Amerika Serikat", 2023, 3274, 128, "iOS 17", 48,
                 6.1f),
      Smartphone(102, "Samsung", "Korea Selatan", 2024, 5000, 256,
                 "Android 14 (One UI)", 200, 6.8f),
      Smartphone(103, "Xiaomi", "Tiongkok", 2024, 4610, 512,
                 "HyperOS (Android 14)", 50, 6.36f),
      Smartphone(104, "Google", "Amerika Serikat", 2023, 5050, 128,
                 "Android 14", 50, 6.7f),
      Smartphone(105, "Sony", "Jepang", 2024, 5000, 256, "Android 14", 48,
                 6.5f)};

  std::cout << "Sukses memuat " << daftar_smartphone.size()
            << " data Smartphone awal.\n";

  // 2. Loop interaktif untuk mengambil input pengguna dari terminal
  std::cout << "\n-------------------------------------------------------------"
               "----\n";
  std::cout << " INPUT DATA BARU OLEH PENGGUNA\n";
  std::cout
      << "-----------------------------------------------------------------\n";

  while (true) {
    std::string pilihan = inputString(
        "\nApakah Anda ingin menambahkan data Smartphone baru? (y/n): ");
    // Konversi ke huruf kecil
    std::transform(pilihan.begin(), pilihan.end(), pilihan.begin(), ::tolower);

    if (pilihan == "y" || pilihan == "ya" || pilihan == "yes") {
      std::cout << "\n--- Input Data Smartphone ke-"
                << (daftar_smartphone.size() + 1) << " ---\n";

      // Bagian 1: Atribut Brand
      std::cout << "[Informasi Brand]\n";
      int id_brand =
          inputInteger("  Masukkan ID Brand (integer)           : ", 1);
      std::string nama_brand =
          inputString("  Masukkan Nama Brand (string)          : ");
      std::string negara_asal =
          inputString("  Masukkan Negara Asal (string)         : ");

      // Bagian 2: Atribut Fisik Gadget
      std::cout << "[Spesifikasi Fisik Gadget]\n";
      int tahun_rilis =
          inputInteger("  Masukkan Tahun Rilis (integer)        : ", 1990);
      int kapasitas_baterai =
          inputInteger("  Kapasitas Baterai (mAh, integer)      : ", 100);
      int storage_gb =
          inputInteger("  Kapasitas Penyimpanan (GB, integer)   : ", 1);

      // Bagian 3: Atribut Fitur Smartphone
      std::cout << "[Fitur Spesifik Smartphone]\n";
      std::string os_name =
          inputString("  Sistem Operasi / OS (string)          : ");
      int kamera_mp =
          inputInteger("  Resolusi Kamera Utama (MP, integer)   : ", 1);
      float layar_inci =
          inputFloat("  Ukuran Layar (inci, contoh: 6.7)      : ", 1.0f);

      // Instansiasi objek baru kelas Smartphone (Multilevel Inheritance)
      Smartphone hpBaru(id_brand, nama_brand, negara_asal, tahun_rilis,
                        kapasitas_baterai, storage_gb, os_name, kamera_mp,
                        layar_inci);

      // Menambahkan objek baru ke std::vector
      daftar_smartphone.push_back(hpBaru);

      std::cout << "\n[SUKSES] Data Smartphone '" << nama_brand
                << "' berhasil ditambahkan!\n";

    } else if (pilihan == "n" || pilihan == "no" || pilihan == "tidak") {
      std::cout
          << "\nInput data selesai. Menyiapkan tampilan tabel gabungan...\n";
      break;
    } else {
      std::cout << "[Peringatan] Masukan tidak dikenali. Ketik 'y' untuk Ya "
                   "atau 'n' untuk Tidak.\n";
    }
  }

  // 3. Menampilkan semua data (hardcode + input user) dalam tabel teks dinamis
  cetakTabelDinamis(daftar_smartphone);

  return 0;
}
